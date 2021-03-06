<?php

class Cloud
{
	private $artists = array();	//array of artists used to generate the cloud
	private $wordObjectArray = array();	//array of Word items used in the lyric cloud

 	public function __construct($artists, $lyricCloud)
 	{
 		$this->artists = $artists;
 		$this->wordObjectArray = $lyricCloud;
 	}
     
  /*
  public function addNewWords($newArtist, $newWords){
          $artists[] = $newArtist;
          for($i = 0; $i < count($newWords); $i++){
              $wordObjectArray[] = $newWords[$i];
          }
          //sort the array after adding an object


          $lyricCloud = usort($wordObjectArray, 
            function($a, $b){
              return ($a->getFrequency() > $b->getFrequency());
            });
  }
  */

  function getWordObject($word){
          for($i = 0; $i < count($this->wordObjectArray); $i++){
              $wordObj = $this->wordObjectArray[$i];
              if($wordObj->getString() == $word){
                return $wordObj;
              }
          }
  }

  function getWordCloudVisual($div_size = 800) {
    $totalSize = 0;
    $optimal = 2000;
    $multiplier = 2;

    $words = array();
    foreach ($this->wordObjectArray as $word)     {
      $words[$word->getContent()] = $word->getFrequency();
      $totalSize += $word->getFrequency();
    }

    if ($totalSize > 1000) {
      $multiplier = ($optimal/$totalSize);
    }

    $tags = 0;
    $cloud = "<div style='width:{$div_size}px' id='cloud'>";
    $colors = array('#F60D0D', '#AF0D0D', '#F04646', '#F90F65', '#B10A66', '#F357AD', '#D704E6', 
      '#E565EE', '#90059A', '#3611F0', '#7057EF', '#1F0893', '#10A3EF', '#56B8E9', '#106995', 
      '#06ECC5', '#6EF4DE', '#02957D', '#0AEB54', '#5DF18E', '#029D35', '#F3E717', '#F56808', '#FF5B00');
    shuffle($colors);

    $fmax = 66;
    $fmin = 12; 
    $tmin = min($words); 
    $tmax = max($words);  

    foreach ($words as $word => $frequency) {
      $font_size = floor($multiplier * (  ( $fmax * ($frequency - $tmin) ) / ( $tmax - $tmin )  ));
      $color = $colors[$tags % sizeof($colors)];
      $cloud .= "<a href='http://localhost:3000/songs/{$word}' style=\"font-size: {$font_size}px; color: $color;\">$word &nbsp;</a>";
      $tags++;
    }
    $cloud .= "</div>";
    
    return $cloud;
    
  }
         
}

?>
