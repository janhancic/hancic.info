+++
title = "How to serve JS&CSS files properly (part 1)"
date = "2012-09-20T14:35:16Z"
author = "Jan Hančič"
+++

In the world of front end optimization you will want to start with how you serve CSS and JavaScript files. Same rules can be applied to both types of files:

* minify
* combine
* compress
* cache
* serve from cookie-less domain

In this first part I'll explain the first two items from the list:

**Minify .js and .css files**

Minifying your CSS&JS files will reduce their size which means that clients will be able to download them faster. You have plenty of options on how to achieve minification. For JavaScript you could use [Closure tools](https://developers.google.com/closure/compiler/) from Google, this tool is probably the best there is as it not only removes unnecessary whitespace, comments and such, but also replaces variable/function names with shorter strings and that can yield significant improvements in file size. There are many other tools: [JSCompress](http://jscompress.com/), [YUI Compressor](http://developer.yahoo.com/yui/compressor/) and [JSMIN](http://www.crockford.com/javascript/jsmin.html).
As for CSS you could also use YUI Compressor which works with CSS files too (not just JS) or try an online tool such as [CSS Compressor](http://www.csscompressor.com/). Personally I'm using SASS for all of my CSS needs which means I can have whichever output from SASS that I want. I'm using the " [-compressed](http://sass-lang.com/docs/yardoc/file.SASS_REFERENCE.html#id17)" switch when building my SASS files to use in production.

**Combine different .js and .css files**

Most likely you have split your CSS & JS code across several files and you need all of them on one page. A great technique here is to combine those files together into one file so you only need one request to fetch all your CSS or JavaScript (remember, requests are expensive and one of the biggest reasons for web page slowdowns). I usually split my JavaScript files into two files: the first one (general.js for instance) includes jQuery and other JS code (plugins, my own code) that is required on all sub pages, the second one can be different on each sub page and only contains code that is needed on that sub page. This (together with proper caching) means that after the first click the user will only have to download the JavaScript code necessary for that sub page, and not the whole jQuery and everything else all over again.
I do the same with CSS: one general file that contains styles for the header, footer, etc and for each sub page it's own CSS file (if necessary).
This may introduce some overhead into your development as you'll have to figure out how to include the correct JS/CSS file on each sub page, but the end result is truly worth it.

[Click here](/how-to-serve-javascript-and-css-files-properly-2) for part two.
