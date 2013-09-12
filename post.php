<?php Include ( 'header.php' ) ?>

<div class="row-fluid">
	<article class="span7">
		<h1>Google analytics and cookies <small>6 October, 2012</small></h1>
		<div>
			<p>If you are using Google Analytics you’ve <a href="#">probably</a> noticed that it sets a bunch of cookies on your computer. They have to set those cookies to be able to track users activity on your page. But unfortunately this has a rather annoying side affect of always sending those cookies as part of the request when user navigates your web page. That means that if you host all your assets (images, css&js files, …) on the same domain (or sub domain) as your page, that every request for every one of those assets will contain that, to you, useless information:</p>
			<p><a href="#"><img src="http://hancic.info/wp-content/uploads/2012/09/Screen-Shot-2012-09-14-at-6.03.17-PM.png" /></a></p>
			<p>It’s useless because you don’t need those cookies on the server (if you do, you can safely skip this post). But why is that so bad? Well Google’s own page speed tools will tell you: “Keeping cookies and request headers as small as possible ensures that a HTTP request can fit into a single packet.”. Which means that the request can be done faster (if it fits into one packet). Removing those cookies would also reduce bandwidth usage for you and your users. There are only two things you (you as in the programmer) can control when it comes to request size: the length of the URL being requested and cookie size.</p>
			<p>But why is that so bad? Well Google’s own page speed tools will tell you: “Keeping cookies and request headers as small as possible ensures that a HTTP request can fit into a single packet.”.</p>
		</div>
		<div id="AfterPost">
			<?php /*<i class="icon-ok-sign"></i> <strong>Need a freelance developer? <a href="#">Email me</a></strong>*/ ?>
			<div>
				<a href="https://twitter.com/janhancic" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @janhancic</a> <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
		
		<p class="muted">If you wish to discuss this post please use <a href="https://twitter.com/intent/tweet?text=@janhancic" target="_blank">twitter</a> or <a href="http://hancic.info/about">contact me</a>.</p>
		
		<h4>Comments</h4>
		<div class="container-fluid" id="Comments">
			<div class="row-fluid">
				<div class="span1">
					<img alt="" src="http://www.gravatar.com/avatar/11069ea4526454fab5398554dce6571f?s=48&amp;d=identicon&amp;r=X" class="avatar avatar-48 photo" height="48" width="48">
				</div>
				<div class="span11 CommentContent">
					<a href="http://swizec.com">Swizec</a> <small>October 6, 2012 at 12:49 pm</small>
					<p>You’re just a newbie :P</p>
					<p>The Trash thing seemed strange at first, but when you think about it. How else would you solve the problem? Transfer 16GB of deleted data to my laptop when I delete it from the USB? That doesn’t make sense … and takes a while too.</p>
					<p>A feature that would be useful is treating .Trashes as empty space, but then you break user expectations for preserving data in Trash until it’s really deleted.</p>
					<p>As for the speediness after wakeup. Never had that issue, but I’d wager it’s got something to do with security.</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span1">
					<img alt="" src="http://www.gravatar.com/avatar/0eb4ccba69be2c3abb93d0df80f46449?s=48&amp;d=identicon&amp;r=X" class="avatar avatar-48 photo" height="48" width="48">
				</div>
				<div class="span11 CommentContent">
					<a href="http://hancic.info">Jan Hančič</a> <small>October 6, 2012 at 12:52 pm</small>
					<p>Well on Windows you don’t have trash for stuff on USB keys. And I quite like that.<br>
					At the very leas, OSX should give you a hint on what to do when it complains that there isn’t enough space on the key. Now a new user is just like “WTF? there’s nothing on it, how can it be full?!”.</p>
				</div>
			</div>
		</div>
	</article>
	<?php Include ( 'sidebar.php' ) ?>
</div>

<?php Include ( 'footer.php' ) ?>
