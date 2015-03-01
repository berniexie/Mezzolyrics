<?php

class Song
{
	private $songTitle;	// string
	private $artist;	// string
	private $lyrics;	// string
	private $songID;	// string
	private $lyricMap;	// array (string) word => (int) frequency

   	public function __construct($word, $songs)
   	{
   		$this->word = $word;
   		$this->songs = $songs;
   	}

	public function getSongs()
	{

	}
}

?>