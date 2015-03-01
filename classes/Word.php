<?php

class Word
{
  private $content;       // string
  private $frequency;     // int
  private $map = array(); // Maps Song objects to int (frequency in that song)
  
  public function __construct($content, $song)
  {
    $this->content = $content;
    $this->frequency = 1;
    $this->map[$song] = 1;
  }
  
  public function getContent()
  {
    return $this->content;
  }

  public function getFrequency()
  {
    return $this->frequency;
  }

  public function getMap()
  {
    return $this->map;
  }

  public function getSongTitles()
  {
    $songList = array()
    foreach ($this->map as $song => $freq) {
      $songList[] = new array(
        'title' => $song->getTitle(),
        'frequency' => $freq
      );
    }
    return $songList;
  }

  public function incrementFrequency()
  {
    ++$frequency;
  }

  public function found($song)
  {
    if(array_key_exists($song, $this->map))
    {
      ++$this->map[$song];
    }
    else
    {
      $this->map[$song] = 1;
    }
  }
}

?>
