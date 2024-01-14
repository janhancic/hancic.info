+++
title = "Hello there!"
date = "2023-12-31T14:30:00Z"
author = "Jan Hančič"
+++

Right, it seems this is my fifth first blog post, sort of. The [fourth one](/hello-world) was on
this domain, but was done on the previous incarnation of the website (it used to run on WordPress).
I've also not written anything in a terribly long time and after my website completely died earlier
this year (a story for another day) I decided it's time to renovate and to, maybe, start writing
here a bit more frequently. And just in time for new year!

## Technology

My requirement was something dead simple and something that generates a honest-to-god normal
website. You know, HTML you can read when you view source, that sort of website. I also didn't want
to run anything fancy or something that takes up any more resources than it needs to (why waste CPU
cycles and pump co2 into the air when you don't have to?). So a static website generator fit the
bill perfectly. After remembering it being mentioned several times on [Hacker
News](https://news.ycombinator.com), I "decided" to go with [Hugo](https://gohugo.io/). After
setting it up I'm very happy, was a pretty smooth ride. Not entirely sure about the theme itself,
however. I like the simplicity and the dark theme is preferable for me, but it's slightly too ...
dark. I also want to see if I can find one that has 0 JavaScript. I'm serving text, it should be
fast (and also I don't particularly want to deal with JavaScript in my free time).

For hosting I picked (after not very much research) [CloudFlare
pages](https://www.cloudflare.com/en-gb/developer-platform/pages/). Mainly because it's free, is
fast and has a dead-easy integration with [my GitHub repo](https://github.com/janhancic/hancic.info)
so my workflow is:

```shell
$EDITOR content/posts/new-post.md
git add .
git commit -am 'new post'
git push origin
```

And voilà, a new post is automatically built & published. I also wanted to put all the
infrastructure code into [TerraForm](https://www.terraform.io/) (note to self, use
[OpenTofu](https://opentofu.org/)?) and didn't want to deal with AWS or GCP as I've got plenty of
that at work.

Are these choices the best? Probably not, thought I would ask you what definition of best we're
discussing here. Anyway, they do the job and they do it well from what I can tell. And the beauty is
that they're deliberately simple so I can change them easily in the future, should I need to.

## Content

The idea with the content is to write about a more varied set of topics. I don't have any particular
goal in mind, but I have had an itch to write about my opinions for a long time now, years. They're
not necessarily anything ground breaking but I think it'll help me process the world I live in and
just get things out of my system. If it finds someone and it touches them in some way then all the
better.
