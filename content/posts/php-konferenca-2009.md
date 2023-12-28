+++
title = "php konferenca 2009"
date = "2009-06-06T18:15:23Z"
author = "Jan Hančič"
+++

This year’s [Slovenian PHP conference](http://phpkonferenca.si/ "<?php konferenca") just finished. This was the second installment of the only PHP event here in Slovenia. It's a shame I wasn't there last year so I can't compare. Overall I was really impressed with everything, all but two talks ware magnificent. Guys from [videolectures.net](http://videolectures.net/) have recorded the whole thing so you will be able to see the conference if you weren’t able to make it.

[![PHP konferenca 2009](/post_images/php.png)](http://phpkonferenca.si)

Below are my opinions on the lectures:

**Delavnica: OpenID, OAuth in Najdi.si Prijava (Workshop: OpenID, OAuth and najdi.si login):**
This workshop showed me that [OpenID](http://openid.net/) isn't that hard to implement (few API calls and you are done). The user experience bugs me (Facebook Connect wins here) and I don't se mass adoption anytime soon, especially because, apparently, many OpenID enabled web pages are making a white list of OpenID providers that they accept logins from. [Najdi.si](http://www.najdi.si) made their own OpenID provider but they are not really helping with educating users what OpenID with their own custom name.

**Delavnica: Varnost in PHP (Workshop: Security in PHP):**
Really great workshop, [Gašper Kozak](http://kozak.si/widethoughts/) walked us trough all the major security issues we, developers, should take care of. Most of the stuff he sowed was known to me and I've got them covered in my code, but there were still some things I just stared with my mouth opened. I will address those issues first thing on Monday. Gašper was also kind enough to point some security flaws in my code (he still has to give me details).

**Predavanje: PHP brez brskalnika (Lecture: PHP without the browser):**
This lecture was about PHP CLI and it showed me some new tricks to use. It also showed me how to do multi-threading properly (something I'm struggling with for quite some time now). Great lecture!

**Delavnica: Izdelava Facebook aplikacij in uporaba Facebook Connecta (Workshop: creating Facebook apps with Facebook Connect):** Here we learned how to build Facebook applications and I learned that this really isn't all that difficult. You build the application just like you are used to, the difference is only that you ask the Facebook API, instead of db for example, for users data. Great!

**Predavanje: 10 koščkov kode, ki so mi olajšali življenje (Lecture: 10 code snippets that made my life easier):**
Unfortunately I overslept (this lecture was the first of the second day) so I missed half of this lecture. But judging from what I saw it was pretty much useless. [Marko Štamcar](http://www.stamcar.com/) was showing us some code that would be acceptable for a rookie programmer or would have it's place 10 years ago.

**Predavanje: Keširanje dinamičnih vsebin (Lecture: caching of dynamic content):**
One of my favorite lectures, Miha Hribar of [3fs](http://www.3fs.si/) (who was the main sponsor btw) talked about [memcache](http://www.danga.com/memcached/). It was really interesting as we plan on implementing it in the near future and I learned quite allot about how to do this. Very handy!

**Predavanje: PHP+Flash=RIA (Lecture: PHP+FLASH=RIA):** [Anže Žnidaršič](http://anze.info/) (organizer of the conference) was this lectures speaker. Although I'm not planning on using this anytime soon the talk was interesting as it showed us that there are alternatives to writing PHP applications the "regular" way. Basically the development is very much like ASP.NET if you use flash.

**Predavanje: Real-time web (Comet) (Lecture: real time web with Comet):**
We are planning on doing a something that will require us to use Comet so this lecture was really helpful. I learned all the missing pieces so I can now dive in and implement the feature (can't say what it is just yet). There are allot of problems with using Comet (which is just a bunch of technologies wrapped in a common name, just like AJAX) on the client side, but fortunately there are libraries that deal with those problems. The best part is that it works in all mainstream browsers including IE6!

**Predavanje: Spletne aplikacije na namizju (Lecture: web applications on the desktop):**
Anže already scratched the surface in his lecture but [Swizec](http://swizec.com/blog/) gave us a in-depth look at Adobe AIR and how to use it. It looks like a nice platform. I only wish he would compare it to Silverlight to give more perspective on the technology.

**Predavanje: CodeIgniter PHP Framework (Lecture: CodeIgniter PHP framework):**
I hate to say this, but this was the worst lecture of the conference. Tomaž Muraus talked about [CodeIgniter](http://codeigniter.com/) but instead of showing us how to do a real web page in it, he basically walked us trough the manual which I can do by myself.

Like I said I'm very pleased with the conference and I'm looking forward to the next one. Maybe I'll even man up and prepare a lecture/workshop of my own.
I've also meat a lot of my fellow [php-si.com](http://www.php-si.com) users and it's always nice to put a face to a nickname. Really great getting to know you all!
