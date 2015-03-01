<?php

include_once('Song.php');

class Word
{
  private $content;       // string
  private $frequency;     // int
  private $map = array(); // Maps Song objects to int (frequency in that song)
  
  public function __construct($content, $song)
  {
    $this->content = $content;
    $this->frequency = 1;
    //$this->map[$song] = 1;
    $this->map[$song->getTitle()] = array(
      'songObject' => $song,
      'frequencyInSong' => 1
      );
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
    $songList = array();
    foreach ($this->map as $song => $freq) {
      $songList[] = array(
        'title' => $song->getTitle(),
        'frequency' => $freq
      );
    }
    return $songList;
  }

  public function found($song)
  {
    ++$frequency;

    if(array_key_exists($song->getTitle(), $this->map))
    {
      $this->map[$song->getTitle()]->frequencyInSong++;
    }
    else
    {
      //$this->map[$song] = 1;

      $this->map[$song->getTitle()] = array(
        'songObject' => $song,
        'frequencyInSong' => 1
        );
    }
  }
}

?>
