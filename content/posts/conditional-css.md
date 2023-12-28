+++
title = "Conditional CSS"
date = "2009-09-22T23:14:32Z"
author = "Jan Hančič"
+++

CSS is a lovely thing, but it can get out of your hands very quickly (especially if you are programmer first and HTML code-monkey second). I often find myself having some element that appears on various sub-pages of a page, comments for example. HTML is stored in a template file and included where needed and styles, that make the comments pretty, are usually in the main CSS file. No problem with this approach if comments are exactly the same on whichever sub-page they resist. But what happens when they have to be 200px wide on the user's profile page and 300px somewhere else? You make another CSS file where you override the width and include it on the page.
The problem with this is that you often end up with several CSS files containing a few lines, which increases the number of requests and page load time. But the biggest problem with this is maintainability. All of a sudden you have styles for the same thing in several different files and guess how long that takes to get out of sync.

So I was thinking how one would go about solving this, and I came up with this: what if you ware able to define a certain style only if some condition would be true. CSS if statements! I'm not proposing a juggernaut here, just something along this lines (haven't really thought about the syntax):

#CommentsContainer {
width: 100px;
background-color: silver;
}
\[URL=/some/path/(.\*)/(\[0-9\]+)\]
#CommentsContainer {
width: 200px;
}
\[/URL\]
\[URL=/some/other/path/(\[0-9\]+)\]
#CommentsContainer {
width: 300px;
}
\[/URL\]

So depending on the URL some of the styles would be defined and some would be not (you could have URL!= for instance and some basic Boolean operators such as AND and OR). You would define the URL with regular expressions (as you have probably guessed).
With this approach you could have all the styles for some page element (comments are just an example I'm struggling with at the moment) defined in one place, which greatly improves maintainability, and you would reduce page load time, which matters the most at the end of the day.

![Conditional CSS](/post_images/conditional-css.png)_I just thought of this and haven't asked google if somebody has already written about this, so don't hold it against me if I say that this is my idea._
