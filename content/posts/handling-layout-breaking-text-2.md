+++
title = "Handling layout breaking text #2"
date = "2009-01-31T18:13:36Z"
author = "Jan Hančič"
+++

This is a follow-up post to the [previous one](/?p=45). I have made some modifications so that you can have HTML tags in your text and my code will still work. I've packed the whole thing in a PHP5 class which you can get [here](/post_images/wbrinserter.txt). I wanted to put a demo up, but apparently I don't have PHP5 support here, and Mb\_\* functions seem to be a mystery to GoDaddy also, so no demo...

So how did I solve the problem with HTML tags? Well before I process the content I replace all HTML tags (including < and >) with some (hopefully) unique characters ($%&) followed by a number, and I save the HTML tag to array (the number is the index of the tag being replaced). Then after the "wbr" insertion I replace the unique characters with the tags I stored.

A quick demonstration on how to use the class (use freely, no guaranties):

```php
$o = new WbrInserter ();
echo $o->InsertHtmlWbr ( 'text with HTML tags' ); // use this method if you have HTML tags in your content
echo $o->InsertPlainWbr ( 'text without HTML tags' ); // use this method if your content doesn’t include HTML tags
```
