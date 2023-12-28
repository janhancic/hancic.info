+++
title = "Facebook like rounded images"
date = "2009-05-31T09:30:38Z"
author = "Jan Hančič"
+++

We are currently renewing [Igre123](http://www.igre123.com "Največja Slovenska spletna igralnica") with a wider design to accommodate the new standard web resolution. Somewhere along the way, we decided that it would be nifty if user's avatars would be rounded like on Facebook:

![](/post_images/rounded-image.png)

I thought the task would be difficult at first, but after I tossed some CSS around, I found out that this is not the case.
In a nutshell: you have a regular rectangular image and then you make another (overlay) image that you put on-top of the first image. The overlay image is mostly transparent and only has white corners that make the curved border (those hide the corners of the first image).
I've made [this demo](/demos/rounded-images/ "Facebook like rounded images demo") page where you can see how one can accomplish this (I used ugly images just for the sake of demonstration). You'll notice that there are two examples. The first one uses one overlay image which has corners both on top and on the bottom. Use this if you know the dimensions of the image being rounded (as the overlay must match it's dimensions).
The second example uses two overlay images, one for the top and one for the bottom. I use this one, as our user's avatars have a variable height (but fixed width). The only problem here was IE6, that's why there is a height property on the container span. Without that IE6 puts the bottom overlay at the bottom of the page and not at the bottom of the image.
