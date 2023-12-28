+++
title = "SDSzombi - a weekend hack"
date = "2012-12-30T13:17:10Z"
author = "Jan Hančič"
+++

![sdszombi.com](/post_images/sdszombi.jpg)Last weekend I came up with an idea for a mini web page: [SDSzombi.com](http://www.sdszombi.com "SDS zombi"). The idea came to me after the friday protests in our capital city. I won't explain the issues in Slovenia at the moment, but suffice to know that our government (or rather the leading party) has labeled all protesters as zombies. They've done that on Twitter, where they also regularly block anyone who expresses disagreement with them. So the idea was born: create a page where users can check if the ruling political party has blocked them. There's just a counter of the number of blocked users and a simple list of blocked users. That's it.

I decided to build the thing on-top of Ruby on Rails and asked [Kaja Repič](http://si.linkedin.com/in/kajarepic/) to create the design. It took longer then expected to build it, but then again I'm just learning Rails (and Ruby), and I have to look-up every small thing. But it was fun and I hope I understand Rails a little bit better now.

Rails really is a lovely thing to work with, and I can't believe how easily you can accomplish a lot of things (usually by just adding a gem). I think I'll have a blast in the future while working on new mini projects (already have two lined up) and learning this fantastic framework along the way.

One other thing that amazed me was this:
![SDS zombi analytics report](/post_images/Screen-Shot-2012-12-30-at-1.54.22-PM.png)

With just a couple of tweets from my [twitter account](https://twitter.com/janhancic) and a post on facebook, the site attracted **928 unique visitors**. And the best part is that the **click-trough** (for the check button) was **over 10%**! That's not bad.

The page is mostly dead now, but it was never meant as something that would be active for a long time. I'm really happy with the results.

ps: source code is freely available on [GitHub](https://github.com/janhancic/sdszombi.com).
