+++
title = "How to serve JS&CSS files properly (part 2)"
date = "2012-10-24T18:16:07Z"
author = "Jan Hančič"
+++

In the [first part](/how-to-serve-javascript-and-css-files-properly-1) of this post I talked about how you can minify and combine your CSS and JavaScript files. Now, let's have a look at the rest of the items:

* compress
* cache
* serve from cookie-less domain

**Compress .js and .css files**

Again, smaller is better and with flicking the right switches in your web server you can save a lot of bandwidth and download time for your users. Since there are many web servers I won't go into details on how to do that, but it's fairly straight-forward on most of them. Also don't forget to compress your HTML and any other resources you might have. This is one of those quick&simple "tricks" you can make and get a lot of benefit.

**Cache .js and .css files**

The only thing better than a quick request is no request, and this is where caching comes into play. With appropriate [HTTP cache headers](http://www.mnot.net/cache_docs/), you can instruct the browser to save the file locally and to not bother to fetch it again for the specified duration of time. This means that the user will download your main CSS file (for instance) on the first visit to your page, and then read it (almost) instantly from his computer on each next request. The best you can do is to set your cache headers so that the file will never expire. But this does introduce some problems: cache invalidation. Sooner or later you will change the CSS or JS file and you would want your users to always user the latest version you have on the server. I solve this problem by adding a version parameter to the file name: css/general\_vX.css and every time I make a change in the CSS (and I deploy the changes into production) I increment the X. This way the user will always have the latest file. Off course, I do the same for JavaScript files and any other static resources (logos, sprite sheets, ...).

**Serve from cookie-less domain**

This means that you serve your static resources from a different domain than your web page. This could be a totally different domain or a sub domain (which is a bit trickier to set up properly). I've written about this [here](/google-analytics-and-cookies). I've focused on Analytics' cookies, but the principal is the same for all cookies, even for your session cookie (do you really need to know if a user is logged in in your CSS file?). So in short: serving static resources from a cookie-less domain insures that cookies don't get attached to requests for that resources, which leads to smaller request sizes.

So, here we are at the end of this short guide on best practises. I do apologize for not providing any concrete configuration or coding examples, the thing is that all this stuff is very specific to each environment and I can't possibly cover all of them. You will also notice that I didn't mention anything about how to actually include CSS&JS files in your web page. That's a whole other topic that I'll maybe get to in some future post.
