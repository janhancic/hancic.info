+++
title = "Badge animator for Chrome extensions"
date = "2009-12-05T17:15:01Z"
author = "Jan Hančič"
+++

I've been playing with extensions in [Chrome](http://www.google.com/chrome) lately. It's amazing how simple it is to make an extension, if you know JavaScript, HTML and CSS you are all set to go. Read [this tutorial](http://code.google.com/chrome/extensions/getstarted.html) from Google to see for yourself. I'm now coding something that will, hopefully, someday become a "new private message notifier" for [Mojvideo.com](http://www.mojvideo.com "Slovenska video skupnost"), nothing fancy but a great start for someone who has never developed an extension for anything (well OK I have written some jQuery plugins). And plus this extension might please a user or two when it's released (once Google includes extensions in the main build of Chrome off course).

While coding I thought it would be cool if I could scroll some text in the, what Chrome calls, [badge](http://code.google.com/chrome/extensions/browserAction.html#badge). Kinda like those signs on train stations:

![](/post_images/indoor-led-scrolling-signs.jpg)

Well I've made [Chrome Badge Animator](https://github.com/janhancic/chrome-badge-animator) which you can use like this:

```
var animator = new BadgeTextAnimator( {
	text: 'this is some sample text', // text to be scrolled (or animated)
	interval: 200, // the "speed" of the scrolling
	repeat: false, // repeat the animation or not
	size: 6 // size of the badge
} );
animator.animate();
```

And this is how it looks in the browser:
![](/post_images/animator.png)

The code is freely available on GitHub, under the MIT license, [here](https://github.com/janhancic/chrome-badge-animator), so feel free to use it or fork it.
