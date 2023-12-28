+++
title = "Mojalbum.com launch"
date = "2009-10-28T18:18:21Z"
author = "Jan Hančič"
+++

I have updated my [showcase page](/showcase/), notice the first item in the list: [Mojalbum.com](http://www.mojalbum.com "Mojalbum.com"). This web page is not new (it was "born" more than 5 years ago), but [our company](http://www.popcom.si) has bought it earlier this year. And now we have re-realesed it after we have built it from scratch. All that is left is the data (over 4.3 million images), everything else (including the database) is brand new. This is one of the on-going projects so expect to see some related posts in the future.

Some things I learned during the development:

- Don't use PHP to import 4 million images (read them from the original DB, store them in the new DB, read the original file and resize it to 4 different sizes and store them in a new location), it is just to slow. The import was running for 1 week.
- There are tons and tons of useless one-line jQuery "plugins" out there.
- Don't care if your JavaScript file is 5 lines long, combine, minify & cache all your JavaScript files so that the browser only needs to make one request to get all the code it needs. Do the same for CSS (haven't done this for CSS yet).
- Do research for cool new technologies you could use before you start coding. I missed a wonderful opportunity to use [Sass](http://sass-lang.com/ "Syntactically Awesome Stylesheets") because I found it after most of the CSS was already written.
- Cache cache and cache!

![mojalbum (1)](/post_images/mojalbum-1.gif)
