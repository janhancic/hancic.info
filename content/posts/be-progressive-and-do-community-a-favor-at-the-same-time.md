+++
title = "Be progressive and do community a favor at the same time"
date = "2009-07-24T19:07:32Z"
author = "Jan Hančič"
+++

Currently there are [around 5%](http://www.w3schools.com/browsers/browsers_stats.asp) of internet users that have JavaScript disabled or their browser doesn't support it. I'm all for progressive enhancement and degrading gracefully,whether you do it or not, depends on you.
I, for one, look forward to the day when this percentage will be zero, and we can all forget about this. Until then I will do my best to keep my web pages friendly to users without JavaScript (I am a [prefectionist](/post_images/prefe.jpg "prefectionist") after all :). If nothing else, search engine's crawlers are users you simply can't ignore, and JavaScript doesn't exist for them.

Sometimes there is a feature that just can't be done without JavaScript or is to complicated and time consuming that it wouldn't make sense spending the time to accommodate for that 5% of users. I've developed a new strategy for [our](http://www.popcom.si "Popcom - spletni mediji") newest project: if there is a link that triggers some JavaScript code I construct it like so:

<a href="http://www.our-domain.com/enable-javascript.html" id="FancyStuffLink">do some fancy stuff</a>

This is a perfectly valid link that anyone can click. The trick here is that I attach a "onClick" event with JavaScript and remove (or rather replace) the "href" attribute. The end result is that users with JavaScript won't see the "enable-javascript.html" URL if they hover over the link, and if they click on it the desired functionality executes.
Whereas users with JavaScript disabled are (upon clicking on the link) taken to a page describing the benefits of enabling JavaScript and some simple instructions on how to do it (tailored to the browser they are using, off course).

Unfortunately our project is not yet finished so I can't show you a live example, but I've made [this demo page](/post_images/nojs-demo.html "No JS demo") where you can see this. Just view the source to see the code.

ps: you'll see my first jQuery plugin on this demo page, so any comments regarding that are highly welcomed. Off course, you can use the code if you happen to find it useful.
