+++
title = "ExterminateGlobals.JS"
date = "2013-09-09T21:59:41Z"
author = "Jan Hančič"
+++

![ExterminateGlobals.JS](/post_images/exterminateglobals_js.png)Unwanted globals can sneak into your JS codebase quite quickly, all you need to do is forget that pesky `var`. That can off course introduce all sorts of trouble to your code base. If you're lucky you'll just be a bit embarrassed when your co-worker finds the global. But if you're unlucky, that global can cause all sorts of bugs through your code base.

That's why I've created this JavaScript utility that will tell you if you have any unwanted globals (as opposed to the globals you create intentionally, such as third party libraries). Once you use it will generate a nice report inside your browser's console which will hopefully help your code base be unwanted globals free.

[![](https://raw.github.com/janhancic/ExterminateGlobals.JS/master/misc/readme_screenshot.png)](https://github.com/janhancic/ExterminateGlobals.JS "ExterminateGlobals.JS")

You can find&fork the code [here on GitHub](https://github.com/janhancic/ExterminateGlobals.JS "ExterminateGlobals.JS"). Everything you need to know is included in the readme file, and since it's MIT licensed feel free to do with the code as you please.
