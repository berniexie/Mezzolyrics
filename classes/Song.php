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
		return lyricMap[word];
	}

	public function getArtist()
	{
		return artist;
	}

	public function getSongTitle()
	{
		return songTitle;
	}

	public function getLyrics()
	{
		return lyrics;
	}
}

?>