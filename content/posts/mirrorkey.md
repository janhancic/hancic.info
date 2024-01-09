+++
title = "MirrorKey"
date = "2014-08-16T17:30:57Z"
author = "Jan Hančič"
+++

![key_1](/post_images/key_1.jpg)Inspired by React's [keyMirror](https://github.com/facebook/react/blob/master/src/utils/keyMirror.js) function I decided to roll [my own](https://github.com/janhancic/mirrorkey), with one extra feature. It was really more of an excuse to start contributing to my [GitHub](https://github.com/janhancic) account again, as I realise that the thing I made isn't really note worthy. But then again, around 120 people have [downloaded](https://www.npmjs.org/package/mirrorkey) it in the last month, so maybe it's not that useless.

So what is it? It's a really simple utility function that saves you some keystrokes when defining constants in a object literal. It also helps with maintainability.

A quick example. You write this:

```js
var myConstants = mirrorKey({
    MY_FOO: null,
    MY_BAR: null
}, 'lower-dashed');
```

And the resulting object will then look like this:

```js
{
    MY_FOO: 'my-foo',
    MY_BAR: 'my-bar'
}
```

The feature I added over React's one is the second argument, so you have control over how the value is generated. I call them transforms, and you can use the following one: none (default), camel-case, lower-case, dashed & lower-dashed.

It works in the browser (probably even in IE6, if you are unfortunate enough that that's something you have to think about) and in node.js. It's also fully tested so you can be confident in using it.

If you wish to use it, read the [installation instructions](https://github.com/janhancic/mirrorkey#installation).
