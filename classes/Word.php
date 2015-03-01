<?php

class Word
{
  private $word;  // string
  private $songs; // array of Song objects
  private $frequency; //frequency of that word in the wordCloud
  
  public function __construct($word, $songs, $frequency)
  {
    $this->word = $word;
    $this->songs = $songs;
    $this->frequency = $frequency;
  }
  
  public function getSongs()
  {
    return $this->songs;
  }
  
  public function getString()
  {
    return $this->word;
  }

  public function getFrequency()
  {
    return $this->frequency;
  }
}

?>
