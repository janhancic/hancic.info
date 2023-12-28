+++
title = "How to be cool in Google search"
date = "2012-11-23T16:30:17Z"
author = "Jan Hančič"
+++

You may have noticed, in recent months, that some search results on Google have extra stuff displayed next to the regular title and small text that we are used to. Some even have images displayed! So, what's this all about?

![Google SERP](/post_images/google.png)

There are actually two different things going on. One thing are schemas (more on them later) and what you see on the image above is a Google-only trick, that allows you to link your Google+ profile with the content you publish on the internet (your blog most likely).

There really isn't much to it when you go about telling google what image&name to display along the search results for your blog posts. You just have to include a special link to your Google+ profile somewhere on your page and you're all set:

```
<a href="https://plus.google.com/GOOGLE_PLUS_PROFILE_ID?rel=author">Google+</a>
```

The important bit is the **?rel=author** part. When google will crawl your page it will pick this link up and, if you're lucky, display your image next to the result for that page. This also works if you have a page where there are different authors/writers (just don't have multiple links like that on the same page).

Ok how about stuff like this:

![stars in SERP](/post_images/Screen-Shot-2012-11-15-at-1.39.20-PM.png)

This is achieved by utilizing special HTML tags (and their attributes) as defined on [schema.org](http://schema.org/). You can tell search engines what content you are showing on some page, which helps them to better understand it. You can define [different types of things](http://schema.org/docs/schemas.html) and then search engines may or may not use that information when displaying results. To display star ratings you would need markup like this:

```
<div itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
  <h1 itemprop="itemreviewed">Some title</h1>
  <div itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">average: <span itemprop="average">4.5</span></span>, <span itemprop="votes">42</span> votes.</div>
</div>

```

Representatives from various search engines say that enriching your markup like this will not affect SEO, but I suspect that that's not entirely true. If a search engine can now, with the help of the tags, better understand what your content is, then surely they know when it would be best to display said content.
And at the least if your pages now have little bits (images, stars, ...) of extra info on SERP that will affect the click trough I suspect.
