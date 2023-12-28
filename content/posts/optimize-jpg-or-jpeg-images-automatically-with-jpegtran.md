+++
title = "Optimize JPG/JPEG images automatically with JpegTran"
date = "2012-09-14T11:55:55Z"
author = "Jan Hančič"
+++

Optimizing front end performance of your web page is both a hard and really rewarding job. Hard because there are so many things you have to take care of. And rewarding because you will gain a lot more out of it than optimizing your back end (most of the time spent rendering a web page is spent in the browser). And speed [does matter](http://webhostinggeeks.com/infographics/why-site-speed-matters/) when it comes to web pages.

One aspect of optimizing are images or rather the size of them. Less is better as the browser has to transfer less data over the wire. Jpeg (or jpg) images are very common and can fortunately be easily optimized on the fly without any manual labour. If you accept user submitted images you are probably already resizing them and are generating thumbnails. All you have to do now is pass the generated images trough a tool called [JpegTran](http://linux.about.com/library/cmd/blcmdl1_jpegtran.htm). This handy utility will remove any unnecessary meta information (such as GPS data) and it will losslesly (no change in quality) optimize  the image to reduce it's size (if you really want to know, it will optimise the [Huffman coding layer](http://en.wikipedia.org/wiki/Huffman_coding) in the image to increase compression levels).

The usage is really simple you just invoke the jpegtran program in your console, passing it two options and the image file you want to optimise. You must also redirect the output to a file (with >) since jpegtran will, by default, output to standard output stream:

jpegtran -copy none -optimize input\_image.jpg > output\_image.jpg

And that's it, you now have an optimized image.

Usually you would like to just override the un-optimized image with the optimized one. We can do that with one line:

jpegtran -copy none -optimize input\_image.jpg > output\_image.jpg && mv output\_image.jpg input\_image.jpg

You can easily execute this command from your programming language of choice (Exec() in PHP's case).

I managed to shave off about 13.5KiB from one of our pages that has 24 thumbnails on it. Considering the large amounts of traffic we get, that translates into a better user experience for our users and saved bandwidth bills for us.
