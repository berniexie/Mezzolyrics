<?php

class Song
{
	private $title;				// string
	private $artist;			// string
	private $originalLyrics;	// string
	private $parsedLyrics;		// string

   	public function __construct($title, $artist, $originalLyrics, $parsedLyrics)
   	{
   		$this->title = $title;
   		$this->artist = $artist;
   		$this->originalLyrics = $originalLyrics;
   		$this->parsedLyrics = $parsedLyrics;
   	}

	public function getTitle($word)
	{
		return $this->title;
	}

	public function getArtist()
	{
		return $this->artist;
	}

	public function getOriginalLyrics()
	{
		return $this->originalLyrics;
	}

	public function getParsedLyrics()
	{
		return $this->parsedLyrics;
	}
}

?>