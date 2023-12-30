+++
title = "hnHiringFilter - filter jobs on Hacker News"
date = "2013-02-01T20:33:44Z"
author = "Jan Hančič"
+++

![hnHiringFilter](/post_images/55775.png)I'm currently looking for a full time web-dev  job in London. And a few days ago I remembered the monthly " [Ask HN: Who is hiring?](https://www.google.com/search?q=Ask+HN%3A+Who+is+hiring%3F)" threads on [Hacker News](http://news.ycombinator.com). I also remembered what a pain it is to browse that thread. Especially if you're not from the Bay area, for where most of the jobs are.

So I fired up my [favourite editor](http://www.sublimetext.com/) and started making a simple bookmarklet that would remove all the jobs that are not from the city (or cities) I'm interested in.

I had tons of problems traversing HN's DOM so after a while I decided to just use jQuery and be done with it. But that also gave me some weird problems in Chrome (even though the exact same selector, that I use, works perfectly fine in my [HN Unread Comments](https://github.com/janhancic/hn-unread-comments) extension). Running the code (after a page refresh) would produce some cryptic error (that google never heard of), but running the same code immediately after would work without a problem. So I reverted back to native `document.querySelectorAll` and made it work.

Anyhow, you can find the bookmarklet on GitHub in the [janhancic/hnHiringFilter](https://github.com/janhancic/hnHiringFilter) repository. Or you can head to [this page](http://janhancic.github.com/hnHiringFilter/) to "install" it directly.

Once you got it in your bookmarks toolbar you can test it on [this month's thread](http://news.ycombinator.com/item?id=5150834).
