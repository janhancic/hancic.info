+++
title = "Fetch YouTube video data with PHP"
date = "2009-01-18T19:48:50Z"
author = "Jan Hančič"
+++

I've written a simple PHP5 class for fetching information about YouTube's videos (nothing fancy). You can fetch title, description, key words, author, thumbnail URL, flv URL and you can save the flv file (like [keepvid.com](http://www.keepvid.com)). You can grab the source code [here](/post_images/youtubefetcherclassphp.txt "YouTubeFetcher class"). You can use it freely, just remember that I can't guarantee anything.

You use the class like so:

```php
$yt = new YouTubeFetcher ();
$yt->Fetch ( 'youtube url' ); // you can pass the URL to the constructor, and save a line
```

Then you have various getter methods you can use:

```php
$yt->GetTitle ();
$yt->GetFlvUrl ();
// ...
```

And finally you can access the flv video file:

```php
$flvVideo = $yt->GetVideoAsString (); // this will fetch the flv video into the $flvVideo variable
$yt->SaveVideo ( '/path/to/your/video.flv' ); // and this will save the flv video file to the local file system
```
