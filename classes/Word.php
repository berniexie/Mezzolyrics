<?php

class Word
{
	private $word;	// string
	private $songs;	// array of Song objects

   	public function __construct($word, $songs)
   	{
   		$this->word = $word;
   		$this->songs = $songs;
   	}

	public function getSongs()
	{
		return $songs;
	}
        public function getString(){
                return $word;
        }
}

?>
