<?php Include ( 'header.php' ) ?>

<div class="row-fluid">
	<div class="span7">
		<div class="page-header">
			<h1>Thoughts by Jan Hančič <small>just keep tryin' ta get a little better</small></h1>
		</div>

		<h2><a href="/post.php">Google analytics and cookies</a> <small>6 October, 2012</small></h2>
		<div>
			<p>If you are using Google Analytics you’ve <a href="#">probably</a> noticed that it sets a bunch of cookies on your computer. They have to set those cookies to be able to track users activity on your page. But unfortunately this has a rather annoying side affect of always sending those cookies as part of the request when user navigates your web page. That means that if you host all your assets (images, css&js files, …) on the same domain (or sub domain) as your page, that every request for every one of those assets will contain that, to you, useless information:</p>
			<p><a href="#"><img src="http://hancic.info/wp-content/uploads/2012/09/Screen-Shot-2012-09-14-at-6.03.17-PM.png" /></a></p>
			<p>It’s useless because you don’t need those cookies on the server (if you do, you can safely skip this post). But why is that so bad? Well Google’s own page speed tools will tell you: “Keeping cookies and request headers as small as possible ensures that a HTTP request can fit into a single packet.”. Which means that the request can be done faster (if it fits into one packet). Removing those cookies would also reduce bandwidth usage for you and your users. There are only two things you (you as in the programmer) can control when it comes to request size: the length of the URL being requested and cookie size.</p>
			<p><a href="#">read more <i class="icon-arrow-right"></i></a></p>
		</div>

		<h2><a href="#">Optimize JPG/JPEG images automatically with JpegTran</a></h2>
		<div>
			<p>Optimizing front end performance of your web page is both a hard and really rewarding job. Hard because there are so many things you have to take care of. And rewarding because you will gain a lot more out of it than optimizing your back end (most of the time spent rendering a web page is spent in the browser). And speed does matter when it comes to web pages. One aspect of optimizing are images or rather the size of them. Less is better as the browser has to transfer less data over the wire. Jpeg (or jpg) images are very common and can fortunately be easily optimized on the fly without any manual labour. If you accept user submitted images you are probably already resizing them and are generating thumbnails. All you have to do now is pass the generated images trough a tool called JpegTran. This handy utility will remove any unnecessary meta information (such as GPS data) and it will losslesly (no change in quality) optimize  the image to reduce it’s size (if you really want to know, it will optimise the Huffman coding layer in the image to increase compression levels).</p>
			<p><a href="#">read more <i class="icon-arrow-right"></i></a></p>
		</div>

		<h2><a href="#">Optimize JPG/JPEG images automatically with JpegTran</a></h2>
		<div>
			<p>Optimizing front end performance of your web page is both a hard and really rewarding job. Hard because there are so many things you have to take care of. And rewarding because you will gain a lot more out of it than optimizing your back end (most of the time spent rendering a web page is spent in the browser). And speed does matter when it comes to web pages. One aspect of optimizing are images or rather the size of them. Less is better as the browser has to transfer less data over the wire. Jpeg (or jpg) images are very common and can fortunately be easily optimized on the fly without any manual labour. If you accept user submitted images you are probably already resizing them and are generating thumbnails. All you have to do now is pass the generated images trough a tool called JpegTran. This handy utility will remove any unnecessary meta information (such as GPS data) and it will losslesly (no change in quality) optimize  the image to reduce it’s size (if you really want to know, it will optimise the Huffman coding layer in the image to increase compression levels).</p>
			<p><a href="#">read more <i class="icon-arrow-right"></i></a></p>
		</div>

		<ul class="pager">
			<li class="previous">
				<a href="#">&larr; Older</a>
			</li>
			<li class="next disabled">
				<a href="#">Newer &rarr;</a>
			</li>
		</ul>
	</div>
	<?php Include ( 'sidebar.php' ) ?>
</div>

<?php Include ( 'footer.php' ) ?>