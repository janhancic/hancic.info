+++
title = "Another One Bites the Dust"
date = "2009-05-08T17:15:28Z"
author = "Jan Hančič"
+++

I like talking about [usability](/lazy-days/), so today I'll talk about another easy way to improve your web page. There are many web pages which use [AJAX](http://en.wikipedia.org/wiki/Ajax_(programming)) to post the contents of a form back to the server. The problem is that most of them don't act as regular forms, where you can hit enter on your keyboard and submit the form.
The problem is that most developers use a type="button" instead of the type="submit" button in their AJAX forms, so you have to click on the button to submit the form. The problem with using a type="submit" button in AJAX forms is that the browser will submit the form the regular way.

And this, off course, can be easily fixed. You already have a JavaScript function that your type="button" button calls when clicked. All you have to do is change the type="button" to type="submit", return false from the function that does the AJAX request and then you define a "onsubmit" event for your form.

Example:

```

your form elements

```

And that's it. Off course you should attach the "onsubmit" event [via JavaScript](http://www.google.com/search?q=binding+events+javascript) not in-line like in the example.
