+++
title = "Load JavaScript and CSS with one request"
date = "2013-01-23T17:39:36Z"
author = "Jan Hančič"
+++

![pagespeed](/post_images/pagespeed-300x300.jpg)When it comes to web pages I'm a bit of a speed freak. I'm constantly on the lookout for new techniques to make my pages faster. So it's a great pleasure that I can now say that I came up with a new _\*_ technique to speed up page rendering.

The idea came to me while I was analysing one of my pages and trying to figure out how to reduce the number of requests. I asked myself: "would it be possible to, somehow, combine CSS and JavaScript into one file?". And the answer, it turns out, is **yes**!

I started hacking and soon had two proof of concepts (and quickly after that a name: [platypus.js](http://janhancic.github.com/platypus.js/)). The first one used AJAX to load & inject a CSS file into the page while extracting & injecting JavaScript that was inside a CSS comment. It worked, but there was a noticeable [FOUC](http://en.wikipedia.org/wiki/Flash_of_unstyled_content) even on a page with just a few elements and very little CSS. This might be avoided by not using jQuery and using raw JavaScript to create the AJAX request (it's on my TO-DO list).

The second concept proved to be **more promising**. I started researching if it is possible to access raw CSS files (that are loaded normally by the browser) and extract JS that way (thus avoiding AJAX), but sadly this isn't possible. So I figured I might sneak JS code as a value of a CSS attribute. That proved possible and I used the `content` attribute which can accept arbitrary data. So once the CSS get's loaded I read the value of `content` and inject JS code into the page. The next step was base64 encoding the JS code to avoid problems with quotes.

So the concept works but I still have a lot of work to do. Right now I've only tested this with Chrome. Once I test other browsers and make some benchmarks I'll create a generic solution that anybody could use.

Until then, you can check the demos [here](http://janhancic.github.com/platypus.js/), or view&fork the source code on GitHub [here](https://github.com/janhancic/platypus.js).

_\\* I looked on the internet and haven't found anything like this, but it is possible that my google-fu sucks and somebody else totally did this already_
