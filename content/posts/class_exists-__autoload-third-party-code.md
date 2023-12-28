+++
title = "Class_Exists, __autoload &amp; third-party code"
date = "2009-04-26T18:35:16Z"
author = "Jan Hančič"
+++

I had some problems with my new [PHP](http://en.wikipedia.org/wiki/PHP) framework. I was trying (for the first time in this framework) to use a [third-party library](http://en.wikipedia.org/wiki/Third-party_software_component) in my code ( [SimplePie](http://simplepie.org/)). And that turned out to be a problem.
See, my framework uses [\_\_autoload](http://www.php.net/autoload) to dynamically load classes that aren't yet included. And SimplePie (like many other libraries) uses the [Class\_Exists](http://www.php.net/class_exists) function to check if some component is present or not (which is great).

Now the problem is, that Class\_Exists, for reasons I can't comprehend, calls the \_\_autoload function you define. Yes there is a second parameter that disables this behaviour, but are you expecting me to dig trough ten's of thousands lines of SimplePie (or any other) code to change the second parameter to false? Madness. And that's not even the point. The function Class\_Exists (as name suggests) checks if a given class is loaded and can be used. Why on earth would you go on and try to load the class if it isn't?

Now you might say: "you should check if the file you are trying to include in your \_\_autoload function actually exists". "But why?", I ask? Why should I? If something vital as a file with a class your code is trying to use doesn't exists, then something is wrong and the application should crash, there is no point in sugar-coting the error.

I hope they fix this in the future so we don't have to use ugly hack's in our code to make our code compatibale with third-party code
