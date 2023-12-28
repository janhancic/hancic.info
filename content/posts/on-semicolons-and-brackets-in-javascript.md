+++
title = "On semicolons & brackets in JS"
date = "2013-10-25T13:37:43Z"
author = "Jan Hančič"
+++

![Semicolon](/post_images/semicolon.jpg)JavaScript allows you to omit semicolons at the end of certain statements as they will be inserted for you automatically. One can also put opening curly brackets on a new line. These two things are optional. Until they aren't. And then it hurts.

JavaScript has a thing called [automatic semicolon insertion (ASI)](http://en.wikipedia.org/wiki/JavaScript_syntax#Whitespace_and_semicolons), which basically means that you don't have to put semicolons into your source code, as the JS engine will do it for you.

But unfortunately there are edge cases where that won't happen and your code will break. Hard.

So people who are against typing semicolons usually just say: _"well you just have to remember the edge cases where you have to put them, and all is well"_. But is that really a good thing? I can see a lot of disadvantages by not putting semicolons into your code:

* you end up with the worst of both worlds; for the most part no semicolons, but then every once in a while, a semicolon
* you have to keep the edge cases in your head all the time while coding, and that takes precious brain resources away from you
* what happens when you concatenate files and you don't have control over what's on top & bottom of your code? Uh, right, you start & end your file with a semicolon just to make sure you haven't started off from an edge case, or setup a new one for the code under you

Same goes for putting curly brackets on a new line.

Now, isn't it easier to just put semicolons everywhere (and always put the opening curly bracket on the same line) and forget about it? The only thing you have to do is put a semicolon at the start of a file if you are working in a "hostile" environment. But seeing how you're already using them everywhere else it won't look as out of place.

I don't understand this obsession with fighting the tools you use. If JavaScript's syntax is really bothering you that much you can always use a transpiler and write it in a different syntax ( [CoffeeScript](http://coffeescript.org/) being the most popular).
