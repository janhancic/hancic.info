+++
title = "Run SQL queries in the background with PHP"
date = "2012-09-12T12:59:19Z"
author = "Jan Hančič"
+++

As any developer working with SQL will tell you, sometimes some queries are just slow and there isn't much you can do about it. MySQL's InnoDB can be painfully slow at inserts for instance.
I was recently dealing with this exact problem and after some thinking I've came up with a really nice solution that offloads slow inserts to the background. The end result is that the user making a request does not have to wait for that query to finish.

Unfortunately this isn't always an option. You can't just move every query into the background, but if you go trough your code you might be surprised how many queries are executed but not actually needed to complete the request. In my case I was inserting a new row into our "game\_views" table, which holds information about which games a user has played. This is, off course, totally irrelevant in the scope of that one request and can be safely removed from the execution process of the request.

So hove do you run queries in the background with PHP? Well ... you can't directly, but there's this great piece of technology called [Gearman](http://gearman.org/). It allows you to have some PHP sript waiting untill you tell it to do some work or task. And the best part is that the work is done outside of the request (in the background). Gearman's [home page](http://gearman.org/) explains everything, so hop there for a more complete description.

I've solved my performance problems by setting up a worker script that accepts any MySQL query and executes it. And then I just send a complete query to it from a request. I won't provide code here as it's dependan't on your environment and if you are allready using gearman you shouldn't have too much problems setting it all up. I just hope I've given you an idea on how too "fix" your slow queries.

[![Gearman](/post_images/gearman80_title.gif)](http://gearman.org)
