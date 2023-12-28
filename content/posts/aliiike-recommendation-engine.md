+++
title = "Aliiike recommendation engine"
date = "2009-06-16T19:21:14Z"
author = "Jan Hančič"
+++

We updated [igre123.com](http://www.igre123.com "največja slovenska spletna igralnica") today and one of the main new features is the recommended games you see on the right of the game you are playing:

![recommended games](/post_images/recommended-games.png)

You may not see this if you go see for yourself. Either you are viewing a game that hasn’t got enough data collected to show the recommendations or you are one of the "lucky" 20% of users who don't see the recommendations (we are comparing how well this new feature influences bounce rate, time on page, ...).

We are using the [Aliiike recommender system](http://aliiike.com/ "Aliiike - web recommender system") which is a breeze to use and gives fantastic results. We simply couldn't offer better recommendations based on search because games rarely have title or description that would overlap (we have yet to test this on mojvideo.com where this isn't such a big problem). And if you look at the above picture, showing a bejeweled like game, you can see that recommended games are really related (most of the games are of the same type or are puzzle games).

When you install Aliiike you are simply putting a simple JavaScript tracking code (kinda like google's analytics) into your product page (product being anything you want, aliiike doesn’t care what it is tracking) which logs how your users move from one product to another (it does that by logging the URL of the product). And then you wait a week or two for the data to collect (you get better and faster results on high traffic web pages as there is more clicks to analyze).

After Aliiike has enough data you can start showing recommendations. There are various ways how you can do that, but all is explained on [this page](http://aliiike.com/about/installation/ "aliiike installation"), so I won't go into any details.

We grab a fresh file with analyzed data every day and store the recommendations into the database, but you could opt for a simpler approach with AJAX for instance.
