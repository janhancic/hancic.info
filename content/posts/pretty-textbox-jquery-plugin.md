+++
title = "Pretty textbox jQuery plugin"
date = "2009-09-26T11:00:05Z"
author = "Jan Hančič"
+++

Some time ago I made a pretty search box for [our](http://www.popcom.si "Popcom d.o.o. - spletni mediji") latest project (not yet released) and I thought I'd make it into a [jQuery](http://jquery.com/) [plugin](http://plugins.jquery.com/) and share it with you. The goal was to have a text input with some default text (search this, or search that) and a pretty magnifying glass image in the right. And when you click (or give focus to) into the input the default text and the image would disappear. This is just an effect we ware going for, you could make something completely different using only CSS and this plugin for the default text disappearing/appearing. The nifty part is that if the user doesn't enter any text and leaves the input box the default text pops-up again. Best describe this with a image:

![pretty text box](/post_images/pretty-text-box.png)

Plugin code and demo can be found [here](/post_images/pretty-text-input.html "Pretty textbox jQuery plugin"). I also played with CSS3 border-radious and box-shadow to make the inputs even more prettier.

_update: just realized that the middle label on the image should be "with focus" not "with input"_
