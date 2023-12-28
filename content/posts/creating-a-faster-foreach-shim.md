+++
title = "Creating a faster forEach shim"
date = "2014-02-15T15:30:21Z"
author = "Jan Hančič"
+++

![shim](/post_images/wedges_227112.jpg)Unfortunately we still need to support IE8 at [our company](http://www.caplin.com "Caplin Systems ltd"), as that is what customers demand. Frustrating but necessary. So we have to spend a great deal of time fixing performance issues in this old browser. Recently a lot of us had serious performance problems with looping over arrays with the ES5 [Array#forEach](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/forEach), so we had to change the code to "regular" for loops. And in one case even create an asynchronous forEach because IE8 just can't handle the amount of data we are throwing at it.

All that got me thinking on how we could possibly still use \`Array#forEach\` and not take the performance hit. After analyzing the [ES5 shim](https://github.com/es-shims/es5-shim) I couldn't see any obvious ways to make it faster. The way I saw it, the main problem was the repeated function invocations. Which got me thinking how to get rid of them.

After a couple of days it finally hit me (at 2AM no less) that the only way, really, was to dynamically rewrite the item processor (callback function to forEach) so it's no longer a function. After half an hour, a proof of concept was born and it worked. After some more time polishing it, this is the result: [janhancic/fasterForEach.shim](https://github.com/janhancic/fasterForEach.shim).

The principle is really simple. All this does is analyses the array being looped over and the item processor function, and it rewrites all that into a regular for loop, which then gets executed with either \`eval\` or \`new Function()\` (I created both versions to see which one performs better).

So if you have code like this:

```
items.forEach(function(item, idx) {
    var foo = item * idx;
});

```

it will get converted into a string (that looks something like the one below) and then evaluated:

```
// __i__, __len__ & __array__ are "injected" once this is evaluated
var item, idx;
for ( ; < __i__ < __len__; ++__i__) {
    if (!(__i__ in __array__)) { continue; }
    item = __array__[__i__];
    idx = __i__;

    var foo = item * idx;
}

```

All this means is, that you only get two function invocations (one for the forEach, and one for the eval/new Function). Off course there is a performance hit with dynamically evaluating JavaScript code, but my [testing showed](http://jsperf.com/faster-foreach-shim) that it is still faster (albeit not as much as I'd wanted).

I doubt this will ever get used in production, but it was a fun little hack and I did achieve my goal :)

_Update:_ Turns out I overlooked something important and I have yet to figure out if there is a way to fix this. The problem with both solutions is that the code inside of the item processor no longer has access to it's outer closure(s), as it is executed in a entirely new context. I will try to find some time to investigate and see if there is a way to amend this.
