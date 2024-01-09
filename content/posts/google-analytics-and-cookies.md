+++
title = "Google analytics and cookies"
date = "2012-09-14T17:00:06Z"
author = "Jan Hančič"
+++

If you are using Google Analytics you've probably noticed that it sets a bunch of cookies on your computer. They have to set those cookies to be able to track users activity on your page. But unfortunately this has a rather annoying side affect of always sending those cookies as part of the request when user navigates your web page. That means that if you host all your assets (images, css&js files, ...) on the same domain (or sub domain) as your page, that every request for every one of those assets will contain that, to you, useless information:

[![Request headers](/post_images/Screen-Shot-2012-09-14-at-6.03.17-PM.png)](/post_images/Screen-Shot-2012-09-14-at-6.03.17-PM.png)

It's useless because you don't need those cookies on the server (if you do, you can safely skip this post).

But why is that so bad? Well Google's own page speed tools will [tell you](https://developers.google.com/speed/docs/best-practices/request#MinimizeRequestSize): "Keeping cookies and request headers as small as possible ensures that a HTTP request can fit into a single packet.". Which means that the request can be done faster (if it fits into one packet). Removing those cookies would also reduce bandwidth usage for you and your users. There are only two things you (you as in the programmer) can control when it comes to request size: the length of the URL being requested and cookie size.

You'll probably skip the URL part, since it's probably not a good idea to change every URL on your page.

But you can do something about those fat cookies. You can't eliminate them (we'll have to wait on Google to start using localStorage for that), but you can control to which requests they are attached. There are two possible solutions: one is to get a completely different domain (like facebook has fbcdn.com) and serve ALL your static content (images, CSS, JS, flash, ...) from that domain. The content can still be on the same server, just point your new domain to the same server and change the URLs and voila: Only the request to www.your-page.com (i.e. html) will contain those cookies.

The other way is to setup a sub domain and again serve all your static content from that domain. This requieres another step. You have to instruct analytics to only set cookies for "www.your-page.com". Analytics will then set cookies so that they are only accessible from the domain you specify and not it's sub domains. The result is then the same as with the first approach. This is how you instruct analytics to only set cookies for one domain:

```js
var _gaq=_gaq||[];
_gaq.push(['_setDomainName','www.your-page.com']); // the important part
// make sure that _setDomainName is the first GA
// call in your code, otherwise cookies might also
// get set for subdomains too
_gaq.push(['_setAccount','UA-YOUR-ID']);
_gaq.push(['_trackPageview']);
(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(ga);})();
```

It's really just the standard GA code with added call to "\_setDomainName". Also set YOUR cookies so that they are not accessible from the sub domain from which you serve static content (5th parameter in the [setcookie()](http://www.php.net/setcookie) function in PHP).

Now, I've only addressed Google analytics here. But there are many other services that pollute your requests with cookies and unfortunately not all of them will play as nice as google. So if you have more of these services on your web page I would suggest you go with the first approach (totally different domain) to avoid any cookies being sent along with the requests.
