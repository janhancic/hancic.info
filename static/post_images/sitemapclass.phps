<?php

class SiteMap
{
	const WRITE_PLAIN = 1;
	const WRITE_GZIP = 2;

	const CHANGE_ALWAYS = 'always';
	const CHANGE_HOURLY = 'hourly';
	const CHANGE_DAILY = 'daily';
	const CHANGE_WEEKLY = 'weekly';
	const CHANGE_MONTHLY = 'monthly';
	const CHANGE_YEARLY = 'yearly';
	const CHANGE_NEVER = 'never';

	protected $path;
	protected $location;
	protected $writeMode;

	public function __construct ( $Path, $Location, $WriteMode )
	{
		$this->path = $Path;
		$this->location = $Location;
		$this->writeMode = $WriteMode;
	}

	public function Generate ( $Data )
	{
		$numOfItems = Count ( $Data );
		$numOfSiteMaps = $numOfItems / 40000; // we can only store 50000 URLs in one sitemap, but we must also respect the 10MB per sitemap rule, so we only store 40000 URLs in one sitemap
		$numOfSiteMaps = Ceil ( $numOfSiteMaps );

		$siteMaps = '';
		for ( $i = 1; $i <= $numOfSiteMaps; $i++ )
		{
			$siteMaps .= '
				<sitemap>
					<loc>' . $this->location . 'sitemap' . $i . $this->getFileExtension () . '</loc>
					<lastmod>' . Date ( 'c' ) . '</lastmod>
				</sitemap>
			';
		}

		// write the sitemap index file
		$fh = $this->open ( 'sitemaps' );
		$siteMaps = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . $siteMaps . '</sitemapindex>';
		$this->write ( $fh, $siteMaps );
		$this->close ( $fh );

		$fh = $this->open ( 'sitemap1' );
		$content = $this->getHeader ();

		// write sitemaps
		$siteMapNum = 1;
		$numOfWritten = 0;
		for ( $i = 0; $i < $numOfItems; $i++ )
		{
			if ( ( $i + 1 ) % 40000 == 0 )
			{
				$content .= '</urlset>';
				$this->write ( $fh, $content );
				$this->close ( $fh );
				$numOfWritten++;

				$siteMapNum++;
				$fh = $this->open ( 'sitemap' . $siteMapNum );
				$content = $this->getHeader ();
			}

			$content .= '<url><loc>' . $Data[$i]->GetLocation () . '</loc><lastmod>' . $Data[$i]->GetLastMod () . '</lastmod><changefreq>' . $Data[$i]->GetChangeFreq () . '</changefreq><priority>' . $Data[$i]->GetPriority () . '</priority></url>';
		}

		if ( $numOfWritten != $numOfSiteMaps )
		{
			$content .= '</urlset>';
			$this->write ( $fh, $content );
		}

		$this->close ( $fh );
	}

	protected function getHeader ()
	{
		return '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	}

	protected function open ( $FileName )
	{
		$FileName = $this->path . $FileName . $this->getFileExtension ();

		if ( $this->writeMode == self::WRITE_PLAIN )
			return FOpen ( $FileName, 'w' );
		else
			return GzOpen ( $FileName, 'w' );
	}

	protected function close ( $FileHandle )
	{
		if ( $this->writeMode == self::WRITE_PLAIN )
			FClose ( $FileHandle );
		else
			GzClose ( $FileHandle );
	}

	protected function write ( $FileHandle, $Content )
	{
		if ( $this->writeMode == self::WRITE_PLAIN )
			FWrite ( $FileHandle, $Content );
		else
			GzWrite ( $FileHandle, $Content );
	}

	protected function getFileExtension ()
	{
		if ( $this->writeMode == self::WRITE_PLAIN )
			return '.xml';
		else
			return '.xml.gz';
	}
}

class SiteMapItem
{
	protected $location;
	protected $lastMod;
	protected $changeFreq;
	protected $priority;

	public function __construct ( $Location, $LastMod, $ChangeFreq, $Priority )
	{
		$this->location = $Location;
		$this->lastMod = $LastMod;
		$this->changeFreq = $ChangeFreq;
		$this->priority = $Priority;
	}

	public function GetLocation ()
	{
		return $this->location;
	}

	public function GetLastMod ()
	{
		return $this->lastMod;
	}

	public function GetChangeFreq ()
	{
		return $this->changeFreq;
	}

	public function GetPriority ()
	{
		return $this->priority;
	}
}

?>