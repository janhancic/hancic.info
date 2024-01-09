+++
title = "Handling layout breaking text"
date = "2009-01-30T18:56:23Z"
author = "Jan Hančič"
+++

Displaying user entered content on a web page can be a pain in the ass. The biggest problem I was always having was long words (usually something like this: "hahahahahahahahah" spanning 100 characters etc) and how to prevent them breaking the layout of the web page. I tried various techniques but none worked as I would like.

So today when I was working on a new web page I decided to find a solution once and for all. So after some googling I found that there is a tag called " [wbr](http://www.quirksmode.org/oddsandends/wbr.html)" (I don't really know how I didn't come across it sooner). I did a little bit of testing and indeed this was the answer to all of my wrapping problems. This is basically an invisible tag that tells the browser that it can split a word on the position of the “wbr” tag if necessary.

So all I needed was a way to insert this tag into the text. So I wrote this PHP function that splits the text by spaces, loops trough all the words, and if it finds a word that is longer than 10 characters it inserts the "wbr" tag after every 5th character of that word. Now this may look like a redundant way of doing it, you might think that I am not aware of the [Chunk\_Split](http://si.php.net/chunk_split) function that does exactly what I do in the inner loop, but unfortunately Chunk\_Split does not support UTF-8 strings so I had to roll my own solution. Why the 10 character limit? I don’t know, but after some testing I discovered that the results are most optimal with this limit.

You will notice that I don't pass the $encoding setting into any of the [Mb\_\*](http://si2.php.net/manual/en/ref.mbstring.php) functions. This is because I have set the encoding via [Mb\_Internal\_Encoding](mb_internal_encoding) at the beginning of my script.
One final note: thw "wbr" tag is not supported in Opera so you have to use some CSS. Details can be found [here](http://gojomo.blogspot.com/2005/03/cross-browser-invisible-word-break-in.html), I used the code in the last comment.

```php
function MakeDisplayFriendly ( $Text )
{
	$splited = Explode ( ' ', $Text );
	foreach ( $splited as $key => $value )
	{
		$valueLength = Mb_StrLen ( $value );
		if ( $valueLength > 10 )
		{
			$newValue = '';

			for ( $i = 5; $i < $valueLength; $i = $i + 5 )
			{
				$newValue .= Mb_SubStr ( $value, $i - 5, 5 ) . '';

				if ( $i + 5 >= $valueLength )
				{
					$newValue .= Mb_SubStr ( $value, $i );
					break; // save some time by breaking from the loop, as we already know the next condition check will fail
				}
			}

			$splited[$key] = $newValue;
		}
	}

	return Implode ( ' ', $splited );
}

```

update: Note that this only works with plain text. It will most likely brake HTML tags in the text, as the function will insert the "wbr" tag in the middle of them. I'll try to come up with a solution when I find some time. Read [this post](/?p=60) if you have HTML tags in your content and you wish to use this code.
