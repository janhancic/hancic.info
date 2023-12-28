+++
title = "Client side validation on mobile"
date = "2013-01-14T09:11:30Z"
author = "Jan Hančič"
+++

![validation](/post_images/1358175373_input_validation.png)We all know that client side form validation leads to a better user experience, but why are so many pages out there without it?

JavaScript validation can save your users a lot of time and frustration by informing them that they did something wrong as early as possible. And this is especially important on mobile. Everything takes at least twice as long (and I'm being generous here) on mobile than on desktop. Be it request time, render time or, most importantly, input type.

Take for example a simple register form with three fields: username, email and password. On desktop it takes me exactly  15 seconds to fill it out (and I'm learning dvorak, so my typing is slow). Same form on mobile (android, standard browser, dvorak keyboard): 35 seconds. Now imagine submitting this form on mobile only for the server to respond with an error (perhaps the username is already taken). You have to change what's wrong, and most likely enter the password all over again (imagine there would have been a password confirmation field as standard). This could be a problem if you password, like mine, is over 20 characters long and contains numbers and special characters. Frustration all around then.

And all this frustrations can be easily avoided by adding some client side validation. If the form I mentioned above (btw: it's [Trello](https://trello.com/)'s signup form) had it, it could have showed me instantly that the username is taken and I wouldn't have to wait for a page reload and then enter my complex password all over again.
