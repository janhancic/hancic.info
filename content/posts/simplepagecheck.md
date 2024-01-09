+++
title = "SimplePageCheck"
date = "2010-12-25T16:24:06Z"
author = "Jan Hančič"
+++

I forgot to write about this. I've made a simple PHP5 class that you can use to check web pages if they contain various string(s) (you can also use regular expressions).

I'll just copy/paste the description from the project's github page:

> I often build a "debug" sub-page on my projects that list various things about the state of the web page (memcache keys, memory usage, ...). And it got boring to check the page every now and then by hand to see if everything is OK. So I've built this class that does the work for me (I just put it into a cron job). One of my usage examples is: I output some contents of a memcache key on my debug script, if one string is not present something is wrong, and this is where this class comes in.

You can grab the code [here](https://github.com/janhancic/simplepagecheck "SimplePageCheck").

And a simple example so you can better imagine what this class does:

```php
Include ( 'SimplePageCheck.php' );

// initialize a new SimplePageCheck object
$spc = new SimplePageCheck ();

// tell SimplePageCheck to send errors to your@email.com and to send one email with all errors
$spc->ReportToEmail ( 'your@email.com', false );

// tell SimplePageCheck to output errors to the standard output
$spc->ReportToOutput ( true );

// add some checks
$spc->AddCheck ( 'http://www.example.com', null, 'page by typing' );
$spc->AddCheck ( 'http://www.example.org', null, 'Section 3test.' ); // this will fail
// this too will fail
$spc->AddCheck ( 'http://www.example.org', 'http://www.example.org', '/You (.*) ttt/is', true );

// run all the added checks
$spc->RunChecks ();
```
