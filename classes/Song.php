<?php

class Song
{
	private $songTitle;	// string
	private $artist;	// string
	private $lyrics;	// string
	private $songID;	// string
	private $lyricMap = array();	// array (string) word => (int) frequency

   	public function __construct($songTitle, $artist, $lyrics, $songID, $lyricMap)
   	{
   		$this->songTitle = $songTitle;
   		$this->artist = $artist;
   		$this->lyrics = $lyrics;
   		$this->songID = $songID;
   		$this->lyricMap = $lyricMap;
   	}

	public function getFrequency($word)
	{
		return $this->lyricMap[$word];
	}

	public function getArtist()
	{
		return $this->artist;
	}

	public function getSongTitle()
	{
		return $this->songTitle;
	}

	public function getLyrics()
	{
		return $this->lyrics;
	}
}

?>