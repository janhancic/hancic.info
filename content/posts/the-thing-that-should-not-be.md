+++
title = "The thing that should not be"
date = "2009-01-07T16:35:50Z"
author = "Jan Hančič"
+++

"Generate static HTML content pages", should never, ever, ever be an answer to any question. Ever. Unless you replace "generate" with "cache" and there's a "database" somewhere in there too. This is probably painfully obvious to most of you, but, annoyingly, it isn't to all software developers out there.

I'm working on converting one of our big web sites, which uses the "bake HTML pages" "technique", to a database driven web site (using PHP). Now, I don’t know who was originally responsible for the way this web site was build. But, unless it was my boss who is not a programmer (in which case kudos to him, for making the site all by himself), I would like to burn his hands, so he (or she) will not be able to use the keyboard ever again.

What all this means that there almost 1000 pages with content that I now have to trough one by one and store the data to a database. I would, off course, write a script that would do that for me and save me from hours of work. The problem is, that almost every page is just a little bit different and there are no standard image (or flash or anything for that matter) paths that would allow me to write an effective parser to grab the content. So imagine the fun I'm having this days. "Happy days" is not on my playlist right now, "Poor twisted me", oddly, keeps popping up...
