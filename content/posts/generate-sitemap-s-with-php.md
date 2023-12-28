+++
title = "Generate sitemap(s) with PHP"
date = "2009-05-09T14:45:53Z"
author = "Jan Hančič"
+++

Sitemaps are XML files that help web crawlers (google, yahoo, ...) get to know your web page better. The sitemap file contains information about when a web page or sub page was last modified, how often it is updated, etc.
It also includes a "priority" information which tells the crawler how important is one page in comparison with other web pages on the same domain. I won't go into any details here as you can read all about sitemaps [here](http://www.sitemaps.org/ "Sitemap protocol").

Since I don't want to edit the sitemap files by hand I've written a simple PHP5 class that generates the sitemap(s) on my behalf. On videoarhiv.com, for example, I generate the sitemaps when a crawler that fetches new videos is run.
Now since most of the web pages I work on have many sub pages, my class splits the entries into multiple sitemap files (there is a limit of 50000 entries per sitemap file, and it can't exceed the 10MB file size) and then generates a sitemap index file that contains the URLs to site maps.
This class was constructed with my demands in mind, so you may have to tweak it to suit your needs. For instance, I only store 40000 (which is hard coded) entries per sitemaps as to respect the 10MB file size limit.
You may have to change this, depending on the type of URLs you have (if you have very short URLs, you can increase this number for instance).

Source code of the class can be found [here](/post_images/sitemapclass.phps).

And here is a short example of how to use it:

```
Include ( '/path/to/SiteMap.class.php' );
// change to SiteMap::WRITE_GZIP to compress the sitemaps
$sm = new SiteMap ( '/path/to/sitemaps/', 'http://www.yourdomain.com/sitemaps/', SiteMap::WRITE_PLAIN );

$data= Array ();
$data[] = new SiteMapItem ( 'http://www.yourdomain.com/', Date ( 'c' ), SiteMap::CHANGE_HOURLY, '0.9' );
$data[] = new SiteMapItem ( 'http://www.yourdomain.com/about', Date ( 'c' ), SiteMap::CHANGE_MONTHLY, '1.0' );
// add all your sub pages like above

// this will generate your sitemap(s) and store them on the location you specified in the SiteMap constructor
$sm->Generate ( $data);
```
