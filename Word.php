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

  public function cmp($a, $b)
  {
    return ($a['frequency'] < $b['frequency']);
  }

  public function getString()
  {
    return $this->content;
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
    foreach ($this->map as $title => $song) {
      $songList[] = array(
        'title' => $title,
        'frequency' => $song['frequencyInSong']
      );
    }

    // Sort songs by freqency
    uasort($songList, array("Word", 'cmp'));

    return $songList;
  }

  public function found($song)
  {
    ++$this->frequency;

    if(array_key_exists($song->getTitle(), $this->map))
    {
      $this->map[$song->getTitle()]['frequencyInSong']++;
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
