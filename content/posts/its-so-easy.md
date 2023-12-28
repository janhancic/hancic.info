+++
title = "It&#039;s so easy"
date = "2009-04-29T21:44:10Z"
author = "Jan Hančič"
+++

Time has proven that the best ideas are dead simple. Think [YouTube](http://www.youtube.com), [Flickr](http://www.flickr.com), [Hotmail](http://www.hotmail.com), [Twitter](http://www.twitter.com), etc.
And once again somebody beat me to the punch and made a something that was under my nose the whole time, I just didn't see it.

Anyways, the other day my father asked if there was any way for him to edit the web page of his [singing choir](http://www.lira-kamnik.si/ "Prvo slovensko pevsko društvo - LIRA"). They have a simple HTML only page with some sub pages. So a full blown [CMS](http://en.wikipedia.org/wiki/Content_management_system) would be an overkill, as my father would have to learn how to use that and he doesn't need all the features. Well luck had it that I was browsing [the daily WTF](http://thedailywtf.com/) and they ware running an ad for something called [CushyCMS](http://www.cushycms.com/). The name hit home with me (I mean it just so likable) and I clicked on the link.

It is a CMS ... just that it isn't. The video on the front page will give you a better picture of the whole thing so just go and watch it. But in a nutshell it's a piece of software that you don't have to install, you just register, enter your web page's FTP information, add pages to the CMS and you can edit the content. It's just magic.

The interface is idiot-proof so anyone can use it. The editor (you can define multiple editors and grant them access to selected pages only) only sees a simple [rich text editor](http://en.wikipedia.org/wiki/WYSIWYG), where he can format the text, insert images, etc.
And the best part is, like I said, no installation required on your server. All you have to do is add class="cushycms" to the element you wish to make editable and CushyCMS will generate a input field (RTE, regular input, image upload, etc) on your behalf. It even stores history of the changes you made, so you can rollback to any previous version if you wish. And, of course, you can still edit the pages by hand directly on the server.

[![CushyCMS](/post_images/cushy-300x221.png)](/post_images/cushy.png)

The only draw back I found so far is the lack of any dynamic content generation. For instance; if you have a page with news, you have to edit the whole page, and add a new news item and edit it by hand so that it matches the design of other news. And you can't make new pages (you have to create them by hand on the server and then add them to CushyCMS).

It's, like I said, a very simple idea that I wish would think of. Oh and it's free, unless you wish to brand it, in that case there's a small monthly [subscription fee](http://www.cushycms.com/static/pro).
