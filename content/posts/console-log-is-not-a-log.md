+++
title = "console.log() is not a log"
date = "2013-11-13T21:15:34Z"
author = "Jan Hančič"
+++

![](https://dl.dropboxusercontent.com/u/373700/hancic.info/console.log/ss1.png)Today I've stared in my screen in disbelief when I've found out that \`console.log()\`, in Chrome (haven't tested other browsers), doesn't work the way I thought it works. I'd rather not think back on how many hours I've wasted by missing a bug because of this. So what's the big deal? Well, it turns out that when you log an object  to the console, it might not actually log what you think it should log.

When you call \`console.log()\` and you pass it an object the browser will, in some weird (arbitrary even) reasons, show you contents of what the state of that object is right now, and not what the contents ware at the time of the call to the log method. This basically means that the log isn't really a log but something else entirely. At first I thought that maybe the reason was that the \`console.log()\`, behind the scenes, works asynchronously and thous only holds the reference to the object and then prints it out when it gets the chance. But, that doesn't seem to be the case. Well it does hold a reference, but ... I think it will be easier if I just showed some examples:

![](https://dl.dropboxusercontent.com/u/373700/hancic.info/console.log/ss1.png)

So far so good. We've created a simple object, logged it, changed it and logged it again. Works as it should. Now let's create a "bigger" object, so that the browser will "activate" the "shrinking" mode on the output.

![](https://dl.dropboxusercontent.com/u/373700/hancic.info/console.log/ss2.png)

We created a new "bob", logged it out (but we didn't expand it!), then we changed it and logged it again. As we can see when we initially logged it out, the value of \`a\` was '1' and that is indeed what the \`console.log()\` showed. Then we assigned a new value to it and expanded the previously logged line. We can now see that \`a\` has the value of 'new value', but that isn't reflected in the collapsed line. And this is the wrong thing to do. I know that if you hover over that 'i' icon it says as much, but then don't call this a log. A log is a recording of events when they happen, as they happen.

I can appreciate performance reasons being the reason for this behaviour, but I don't mind taking the performance hit while debugging, it's only natural. The way it is now makes debugging extremely difficult (especially if you are not aware of this behaviour). Unfortunately it doesn't seem like this will get fixed any time soon, if ever, as I've seen a couple of reported bugs on the matter that are over 2 years old ...

The next time I have some time to experiment I'll see if I can "patch" \`console.file()\` to make a deep copy of it's arguments and log those. In theory it should work.
