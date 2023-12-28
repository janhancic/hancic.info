+++
title = "Google Chrome extension bug"
date = "2010-10-03T18:09:33Z"
author = "Jan Hančič"
+++

I'm working on a [new extension for chrome](http://github.com/janhancic/fb-photo-comments "FB photo comments"), which will add, now missing, functionality to [Facebook](http://www.facebook.com).
The extension uses a "content script" which is only run on URLs that match a certain pattern and it also loads a CSS file which has some styles for the elements I inject into the page.
But I had a problem that the CSS simply did not load and no amount of googling helped me resolve the issue, it seems as if no one had ever had a problem like this. Only after trying everything I could imagine have I found the cause of the problem. Well it was actually dumb luck.
I had my "matches" pattern set like "http://www.facebook.com/album.php?\*" and after removing the question mark the CSS magically loaded.

I suspect that this is a bug in Chrome as there is no mention of question mark having any special meaning in relation to CSS files (or anything else for that matter) in [documentation](http://code.google.com/chrome/extensions/match_patterns.html).
I have filled a [bug report](http://code.google.com/p/chromium/issues/detail?id=57423) that is currently marked as "unconfirmed", but I suspect that nobody has looked at it yet. I wrote this so that if somebody has the same problem, he won't waste his time on [google](http://www.google.com) and [stackoverflow](http://stackoverflow.com/questions/3825292/chrome-extensions-css-is-not-loaded), as there is no solution out there (besides this one now:)

![bug](/post_images/bug.png)
