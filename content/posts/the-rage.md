+++
title = "The rage"
date = "2009-05-13T23:11:11Z"
author = "Jan Hančič"
+++

[Another](/another-one-bites-the-dust/) common usability mistake most make, is the step after a user signs into a web page. Most web pages will redirect a user to the front page or his profile page, which is fine if he is signing in from the front page. But most commonly a user will sign in when he is forced to do so, when he tries to leave a comment for instance:

![login](/post_images/login.png)The text translates as "Sign in, if you want to comment, rate or add the game to your favorites". Upon clicking the link, a user would then be presented with sign in page. So far so good. The problem arises (on most web pages) when a user successfully signs in. Instead of redirecting him back to the page where he was, when he clicked on the sign in link, he is instead taken to the front page. Now the user must navigate his way back to where he was, loosing his interest in leaving the comment along the way ...
I'm stating the obvious now, but the correct way is to redirect the user back to the page, where he can do whatever he was unable while not signed in.

And implementing this is really easy, that is why it's even more strange that there are so many web pages without this "feature". All you have to do is append the current URL to the sign in page (signin.php?ReturnTo=current\_url for instance) and then do a simple HTTP redirect after the sign in.

_The image above is taken from our web page [igre123.com](http://www.igre123.com "igre123 - brezplačne flash igre"), where we don't annoy our users :)_
