+++
title = "simple jQuery optimization tips"
date = "2009-12-04T14:40:27Z"
author = "Jan Hančič"
+++

JavaScript is getting more and more important in the development of web pages and web applications. Unfortunately JavaScript is rather slow on some of the browsers (I'm looking at you IE), so we must strive to make our code as efficient as possible so that our users get a quick and responsive user interface.
I use [jQuery](http://www.jquery.com) on all of my projects so I'll share some tips on how to improve the performance here.

This first tip is hopefully painfully obvious to most of you. If you are referencing a jQuery element more than once store it in a variable so you don't select it over and over again (DOM traversing is slooooooow):

```
$( '.SomeDivs' ).each ( function () {
	var $this = $( this );
	// do something with the current element
	// repeatedly
} );
```

The second tip is not so obvious. jQuery comes equipped with a powerful selector engine, which allows you to find some element(s) on various ways. And there can be a great difference between doing $( '.SomeClass' ) and $( 'p.SomeClass' ).
I won't go into details here as somebody else has [already done this](http://www.componenthouse.com/article-19 "jQuery: Performance analysis of selectors"). I'll just post this quick summary here:

```
// find element by ID
$( '#d-2642' ).html (); // is (obviously) much faster than
$( '[id="d-2642"]' ).html(); // or
$( 'small[id="d-2642"]' ).html();

// find element by class
$( 'p.p-4781' ).html(); // is faster than
$( 'p[class="p-4781"]' ).html(); // or
$( 'p' ).filter ( '.p-4781' ).html(); // or (this method is the fastest in Firefox)
$('.p-4781').html()

// find element by attribute
$( 'p[row="c-3221"]' ).html(); // is faster than
$( 'p' ).filter ( '[row="c-3221"]' ).html(); // or
$( 'p[@row]' ).filter ( '[row="c-3221"]' ).html(); // or
$( '[row="c-3221"]' ).html();
```
