+++
title = "grunt-stitch-js"
date = "2013-09-21T16:13:01Z"
author = "Jan Hančič"
+++

![stitching](/post_images/stitching.jpg)I've been working on a small JS library lately and as things started getting bigger and bigger it was time to split the code across multiple files. Having small pieces of functionality in separate files is great for reusability and testability. But then I had a problem of how to create the output file that would contain all the code, wrapped in a IIFE.

So naturally, in the heat of the moment, I created my own grunt task that would do the job for me. Lo and behold, my first ever NPM module [grunt-stitch-js](https://github.com/janhancic/grunt-stitch-js "grunt-stitch-js") was born.

I'd like to say here, that at the time of writing I did not know about [grunt-contrib-concat](https://github.com/gruntjs/grunt-contrib-concat), which does everything my plugin does and then some. Such is the way of an enthusiastic developer I guess.

Anyhow, I still think that my grunt-stitch-js might come in handy on smaller projects and if nothing else I learned something new.

So what's it all about then? grunt-stitch-js does something very simple, suppose you have a project that contains two classes, some auxiliary functions and then some glue code to tie everything together. You would also like to wrap everything in a closure or a IIFE. But you don't want your project to be one .js file. So here is how grunt-stitch-js could help you:

You would create a template file:

```
var MyLib = (function() {
/*# class1.js #*/
/*# class2.js #*/
/*# auxiliary.js #*/

// your glue code
return something;
}());

```

And then, after configuring the template and output files in your `Gruntfile.js`, running `grunt stitch-js`would produce a file like this:

```
var MyLib = (function() {
contents of class1.js
contents of class2.js
contents of auxiliary.js

// your glue code
return something;
}());

```

And you can then treat this file as your builded library.

One advantage grunt-stitch-js has over grunt-contrib-concat, in my opinion, is that you don't have to create two extra files just to wrap files in a IIFE. Plus you can put arbitrary code or comments into the template file and those will become part of your build.

You can find&fork the plugin code on GitHub [here](https://github.com/janhancic/grunt-stitch-js), where you will also find instalation instructions.
