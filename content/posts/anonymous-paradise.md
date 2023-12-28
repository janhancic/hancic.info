+++
title = "Anonymous paradise"
date = "2009-06-11T15:57:39Z"
author = "Jan Hančič"
+++

Google's gmail is great; I can't imagine working with email without it. Unfortunately, as with everything, there are some issues with it.

Did you know that the following email addresses all "translate" to the same account: not.a.real.email@gmail.com,notarealemail@gmail.com, not.arealemail@gmail.com, n.o.t.a.r.e.a.l.e.m.a.i.il@gmailcom, ... ?

This is great, because who could remember where the dots are when somebody tells you his email? But this also means that a user can register on your site using one email multiple times (how many times depends on the length of his email), because he can just randomly rearrange the dots and voila a valid unused email.

So this is really anonymous paradise as he can register countless times (if you ban him for instance) without going trough the hassle of setting up a new email account. I don't know if other mainstream email providers also have this "feature".

So the obvious solution would be to remove all the dots when a user registers/signs in using a gmail email, but that could cause some problems later on. What if Google suddenly drops this "feature"? You would wind up with a whole bunch of problems.

I think that a better solution is to store the dot less email into some table when you ban a user. And then at registration you check the email, the user is wishing to register with, against this table (stripping dots off course). This way annoying anonymous users get to use his email only once.
