<?php

class WbrInserter
{
	var $counter;
	var $tags;

	function WbrInserter ()
	{
		$this->reset ();
	}

	function reset ()
	{
		$this->counter = 0;
		$this->tags = Array ();
	}

	function preWbrCallback ( $Matches )
	{
		$this->tags[] = $Matches[1];

		return ' $%&' . $this->counter++ . ' ';
	}

	function postWbrCallback ( $Matches )
	{
		return '<' . $this->tags[$Matches[1]] . '>';
	}

	function insertWbr ( $Text )
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
					$newValue .= Mb_SubStr ( $value, $i - 5, 5 ) . '<wbr>';

					if ( $i + 5 >= $valueLength )
					{
						$newValue .= Mb_SubStr ( $value, $i );
						break; // save some time by breaking from the loop, as we already know the next condition check will fail
					}
				}

				$splited[$key] = $newValue;
			}
		}

		return Nl2Br ( Implode ( ' ', $splited ) );
	}

	function InsertPlainWbr ( $PlainText )
	{
		return $this->insertWbr ( $PlainText );
	}

	function InsertHtmlWbr ( $HtmlText )
	{
		$this->reset ();

		$cleanText = Preg_Replace_Callback ( '/<(.*?)>/is', Array ( $this, 'preWbrCallback' ), $HtmlText );

		$cleanText = $this->insertWbr ( $cleanText );

		return Preg_Replace_Callback ( '/ \$%&([0-9]+) /is', Array ( $this, 'postWbrCallback' ), $cleanText );
	}
}

Mb_Internal_Encoding ( 'UTF-8' );

$r = new WbrInserter ();

$text = 'hdioashiodhsaiodhsaiohdoisahdosadihasdoahsdisahdoisahdoasidasodsaihdsaodsaidhsaoihdsaiohdioahisaod<a href="http://www.example.com">dpoajdjsapidjsapi sdijsaipodjsaidjsaijdsaojdoasjdoasjdoiajsdiojsaodjsaiodjsaiodjiosajdioasjdi sjidsaiodjasoi</a>dposadposa odsajpod sajpiod aspiojdsapiojdisapojdpiosajdpiosajdposajpodasjpod sadjsapjd sapdjsapd sajdpsa djsa dsajpdiosajdpojsapodjsapodjposajd sajdsapojdsapodjsapod sajpdaposjdsaopdj apsiodj sajdposa dpsaojdposajdpsao daspodjsaopdjsa dapsjodjposajfpejwć  wre9jf eporjkgfojgrej gežogvž reoagjžrašwgkš';

?>

<div style="border: 1px solid black; width: 300px;"><?php echo $text ?></div>
<br /><br />
<div style="border: 1px solid black; width: 300px;"><?php echo $r->InsertHtmlWbr ( $text ); ?></div>