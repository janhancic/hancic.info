+++
title = "Setting PHP variables from JavaScript"
date = "2009-10-08T08:10:02Z"
author = "Jan Hančič"
+++

There's a great deal of forum threads floating around internet where someone is asking "how to set a PHP variable from JavaScript/client". In most cases the author just doesn't know how the technology (html, JavaScript, PHP, http, ...) he is using works. I'm assuming he somehow thinks that if he will (somehow) set/change a PHP variable from JavaScript that it will change the execution flow of PHP for that request (not that he knows what a request is). The only case where this would make sense is in a [Comet](http://en.wikipedia.org/wiki/Comet_(programming)) application where a PHP scripts pushes data in a infinite loop to the client. But I think it's safe to assume that someone who is asking this type of questions isn't developing Comet applications.
There are, off course, valid cases where you might wan't to change something on the server from the client. What's important is to realize that that won't have any effect on the state of the page that the user is currently viewing (until the next request that is). In most cases this would mean setting/changing some session variable or something similar that permanently changes something on the server.
One example of this, that I can think of right now, is if you have some controls on a page that control the font size. You'd want to remember what size the user want's to use, so that he doesn't have to set it after every click on your page.
I'm going to list some ways how one might accomplish this. I will not give you any example code, because there is no built-in mechanism for this, it depends on what you wan't. Also there are two scenarios; you might want to make the change right away or your change can wait until the next request.

**AJAX method**
This is the most obvious solution. You just make a [XHR](http://en.wikipedia.org/wiki/XMLHttpRequest) request to your PHP script, pass it some arguments and the script will do whatever you want it to do. This can be used if you need to make the change right away.

**Image/IFrame method**
If you, for some odd reason, can't or don't want to use AJAX, you can create (using JavaScript) a IMG or IFRAME tag, set it's "src" attribute to your PHP script and voila. Also used if you need to make the change right away.

**Cookie method**
If you don't need to make the change on the server at the moment user does something, you can instead set a cookie (again with JavaScript) and then look for that cookie on every request using PHP and if it is present do something.

**URL variable method**
This is similar to the "cookie method". But instead of setting a cookie you append (with JavaScript) some variable to every URL on the current page (excluding external links). Then check for that GET variable on every request with PHP and act accordingly. This one is a little more complex and it has one drawback; if a user doesn't click on any link after you change them you won't save his changes on the server.

**FORM method/link method**
I suppose this one is obvious, if something needs to be changed on the server make a FORM that submits to a script, or make a link that point's to a script that will change whatever it will change. Off course this method causes a full page refresh. It is, however, the only method that does not require JavaScript.

![](/post_images/stupid.jpg)
