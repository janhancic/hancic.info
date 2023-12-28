+++
title = "Lazy Days"
date = "2009-05-07T16:21:25Z"
author = "Jan Hančič"
+++

Most developers just go "the usa what now?" when you mention [usability](http://en.wikipedia.org/wiki/Web_usability). And it shows if you browse the internet a little. And it's really sad that this is the case, as there are so many quick and easy ways to improve the usability of your web page.

I'll talk about labels today. They are a very useful but often neglected tags. Take [this](http://www.blogorola.com/si/index.php) web site for example (there are many other):

![blogorola](/post_images/blogorola.png)

Notice the check boxes in the red box (I added that), you define what you want to search for with the search bar above. Great. Only that it isn't.
If you want to select the "V imeniku" option you have to click the radio button and clicking on the text "V imeniku" has no effect. That's annoying because you have to pixel-hunt that small radio box.

So how do you improve this? Enter label tag. You put the text that is associated with a certain option inside a label tag, and you set the "for" attribute of the label to the ID of the radio box (or any other form element) you wish to trigger.
Now the user can either click the radio button or the text and the result is the same.

A short example:

<input type="checkbox" id="cbContent" name="cbSearchType" value="content" /> <label for="cbContent">Po vsebini</label>

I would like to state here that all the web pages I'm responsible for are using labels, but they are not. Mostly they are my old projects I don't have control over anymore. But there are still some active projects that don't have labels on every form. But I "convert" them as soon as I work on that page on some new feature. Please, do the same!

And, if you haven't already, read trough [this web page](http://www.useit.com/) (useit.com: Jakob Nielsen on Usability and Web Design).
