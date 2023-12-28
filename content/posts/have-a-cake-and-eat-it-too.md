+++
title = "Have a cake and eat it too"
date = "2009-04-28T19:01:06Z"
author = "Jan Hančič"
+++

Using [jQuery](http://jquery.com/) (or [prototype](http://www.prototypejs.org/) or [whatever](http://www.google.com/search?q=javascript+framework)) is a standard tool in my tool belt nowadays. It's so useful I can't think how I'd do without. You can make some pretty nifty user interfaces with it. And not just pretty ones, but useful ones to.
Take [our](http://www.popcom.si "Popcom d.o.o.") latest [project](http://www.spored.tv "TV spored") for example, on the front page (and sub pages also) there is a list of TV stations and it's current program (2 or 3 items per station). And some of those programs have extra description:

[![spored.tv](/post_images/spored1.png)](/post_images/spored1.png)

Now the old fashion way would be to click on a program which would then take you to another page where you could read the description. The jQuery way is to show the description immediately and with some style! So after clicking on the first program, for example, the description would slide down beneath it, thous saving user the time of a new request and the time it would take him to get back to the schedule:

[![spored.tv](/post_images/spored2.png)](/post_images/spored2.png)

Off course this is useless for web crawlers (google, yahoo, ...) so you still have to provide the old fashioned way (if you wan't for your content to be found). It's really simple to achieve this. You construct the link (which opens the description) like a regular HTTP link which points to a page where you can read the same description (in my case: [http://www.spored.tv/program/unicevalca-mitov/1009118](http://www.spored.tv/program/unicevalca-mitov/1009118)). Web crawler (or any user who has JavaScript disabled) will now see this link and will be able to read the content.
Now you use jQuery to dynamically add a onClick event handler, to every link, which slides the description and returns false, so that the browser doesn't follow the link. Feel free to view the source code of [spored.tv](http://www.spored.tv "TV spored") to see how I've done this.
