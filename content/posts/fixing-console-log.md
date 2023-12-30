+++
title = "Fixing console.log()"
date = "2014-02-09T13:30:05Z"
author = "Jan Hančič"
+++

![](https://dl.dropboxusercontent.com/u/373700/hancic.info/console.log/ss1.png)I've written about the [problems of console.log()](/console-log-is-not-a-log). I've also said that I'm going to do something about it once I have some spare time. Well, I had some spare time, so I fixed it.

The result is this little repository: [console.real](https://github.com/janhancic/console.real). There really isn't much to it. You either call `console.real.log()` instead of `console.log()`, or you call `console.real.install()` and then just use the normal `console` methods. In both cases the log (and other methods such as ìnfo`) will start behaving as a real log. Meaning that when you log something you will see it as is at the time of logging.

Internally the new methods clone each passed argument and log the copy, instead of the original value. And that's all there is to it.
