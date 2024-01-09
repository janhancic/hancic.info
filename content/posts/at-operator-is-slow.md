+++
title = "@ operator is slow"
date = "2009-06-21T09:44:13Z"
author = "Jan Hančič"
+++

The @ "operator" in PHP is used to silence any warnings or errors that would otherwise be shown (in the browser or the log). It's really useful, because sometimes you know you can safely ignore a warning or error, when checking if a GET variable is set for instance. Until today I though that, if used properly and with caution, the @ operator can be freely used. Then I read [this article](http://derickrethans.nl/five_reasons_why_the_shutop_operator_@_should_be_avoided.php). I really had no idea that PHP is doing so much work behind the scenes to make @ work.
When PHP comes to a statement, that contains the @ operator, it changes error reporting to none and then back, which translates to a trip to the php.ini file.
So after I stopped scratching my head and thinking "why the bloody hell would one do that like so?", I opened [my PHP editor](http://www.sublimetext.com/) and wrote this simple test to see just how much of a difference this makes. It's the most common scenario where you check if a GET variable has any content.
First the version with @:

```php
for ( $i = 0; $i < 1000000; $i++ ) {
	if ( @$_GET['var'] != '' )
		echo 'foo';
}
```

And the version without @:

```php
for ( $i = 0; $i < 1000000; $i++ ) {
	if ( IsSet ( $_GET['var'] ) && $_GET['var'] != '' )
		echo 'foo';
}
```

I timed the execution of both snippets and here are the results:
@ versionIsSet version11.524964094160.19698691368121.486271858220.20447993278531.522676944730.20682096481341.512635946270.20731902122551.491501092910.19963908195561.488291025160.17498397827171.543690919880.20603895187481.522541999820.20497107505891.506417036060.190815925598101.513431072240.203064918518sum:15.112421989451.995120763778avg:1.5112421989450.1995120763778

The IsSet version is about 7.5 times faster, really amazing. I don't use @ as often as I used to, but I will now try to reduce it to zero. You should do the same.
