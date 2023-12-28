<?php

//$yt = new YouTubeFetcher ( 'http://www.youtube.com/watch?v=ddBrgMHrg7E&feature=rec-HM-rev-rn' );
$yt = new YouTubeFetcher ();
$yt->Fetch ( 'http://www.youtube.com/watch?v=ddBrgMHrg7E&feature=rec-HM-rev-rn' );

echo $yt->GetTitle ();
$yt->SaveVideo ( 'test.flv' );

class YouTubeFetcher
{
	protected $title;
	protected $keyWords;
	protected $description;
	protected $authorLink;
	protected $author;
	protected $flvUrl;
	protected $thumbUrl;
	protected $isFetched;

	public function __construct ( $YouTubeLink = '' )
	{
		$this->isFetched = false;

		if ( $YouTubeLink != '' )
			$this->Fetch ( $YouTubeLink );
	}

	public function GetTitle ()
	{
		$this->checkFetched ();

		return $this->title;
	}

	public function GetKeyWords ()
	{
		$this->checkFetched ();

		return $this->keyWords;
	}

	public function GetDescription ()
	{
		$this->checkFetched ();

		return $this->description;
	}

	public function GetAuthor ()
	{
		$this->checkFetched ();

		return $this->author;
	}

	public function GetAuthorLink ()
	{
		$this->checkFetched ();

		return $this->authorLink;
	}

	public function GetFlvUrl ()
	{
		$this->checkFetched ();

		return $this->flvUrl;
	}

	public function GetThumbUrl ()
	{
		$this->checkFetched ();

		return $this->thumbUrl;
	}

	public function Fetch ( $YouTubeLink )
	{
		$this->isFetched = false;

		$data = @File_Get_Contents ( $YouTubeLink );

		if ( $data == '' )
			throw new Exception ( 'can\'t fetch data' );

		$matches = Array ();
		Preg_Match ( '/<meta name="title" content="(.*?)">/is', $data, $matches );
		$this->title = @$matches[1];

		Preg_Match ( '/<meta name="description" content="(.*?)">/is', $data, $matches );
		$this->description = @$matches[1];

		Preg_Match ( '/<meta name="keywords" content="(.*?)">/is', $data, $matches );
		$this->keyWords = @$matches[1];

		Preg_Match ( '/var watchUsername = \'(.*?)\';/is', $data, $matches );
		$this->author = @$matches[1];
		$this->authorLink = 'http://www.youtube.com/user/' . $this->author;

		Preg_Match ( '/"video_id": "(.*?)"/is', $data, $matches );
		$ytId = @$matches[1];

		Preg_Match ( '/"t": "(.*?)"/is', $data, $matches );
		$ytT = @$matches[1];

		$this->flvUrl = 'http://youtube.com/get_video?video_id=' . $ytId . '&t=' . $ytT;

		$this->thumbUrl = 'http://i1.ytimg.com/vi/' . $ytId . '/default.jpg';

		if ( $this->title != '' && $this->description != '' && $this->keyWords != '' && $this->author != '' && $this->flvUrl != '' && $this->thumbUrl != '' )
			$this->isFetched = true;
		else
			throw new Exception ( 'can\'t fetch data' );
	}

	public function SaveVideo ( $FileName )
	{
		$this->checkFetched ();

		File_Put_Contents ( $FileName, $this->GetVideoAsString () );
	}

	public function GetVideoAsString ()
	{
		$this->checkFetched ();

		return File_Get_Contents ( $this->flvUrl );
	}

	protected function checkFetched ()
	{
		if ( $this->isFetched == false )
			throw new Exception ( 'youtube video not fetched' );
	}
}

?>