+++
title = "Hey Opera ... I hate you!"
date = "2009-11-12T19:41:01Z"
author = "Jan Hančič"
+++

Based on recent experience, Opera is a really crappy browser to develop for. It's developer tools are almost totally useless and it has this wired bugs that you can't find any info on how to fix them. At least with IE every bug and quirk is covered in great detail on many pages over the internet. Once you start doing something fancy and try to make it work in Opera you are pretty much on your own.

I've had this problem that I now managed to solve. If you have a bunch of floated DIVs that need to be sorted using the (excelent) [jQuery UI Sortable](http://jqueryui.com/demos/sortable/), then make sure that the "position" CSS property of the floated DIV is not "relative". The "effect" that you get with "position: relative" was quite "funny"; once you dragged a DIV to a new position it just disappeared into mid air, or it just hid behind the other DIVs at some random position. I mean, how the fuck do you even debug something as stupid as this? And now I have found a new bug while using jQuery UI [Draggable](http://jqueryui.com/demos/draggable)/ [Droppable](http://jqueryui.com/demos/droppable) in Opera. The "effect" is similar; DIVs are now accelerating from the place you drop them to some place that is not on my monitor ...
