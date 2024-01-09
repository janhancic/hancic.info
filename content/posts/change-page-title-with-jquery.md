+++
title = "Change page title with jQuery"
date = "2009-10-14T15:15:16Z"
author = "Jan Hančič"
+++

I just had a need to change the title of the page with JavaScript, and since I use jQuery I imediatelly wrote this:

```js
$( 'title' ).html ( 'new title' );
```

and it didn't work. Ok, how about this:

```js
$( 'title' ).val ( 'new title' );
```

nope. So after some googling I found out that jQuery just can't do that. You have to use plain old JavaScript:

```js
document.title = 'new title';
```

I posted this because I think it's interesting how one gets to rely on a tool he uses, without even thinking to use the technology on which the tool is build, even if that is clearly the better way to go. Or maybe you just get scared of working with the DOM directly if you use jQuery (or something alike) for some time. Don't get me wrong, DOM is horrid to work with without some abstraction, but sometimes it works beautifully. But jQuery is working really hard to hide the DOM away from you thus subtly seeding fear into your mind.

_it's no coincidence I always think of Doom when I deal with DOM_![dom](/post_images/dom.jpg)
