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

  public function getWordObject($word){
          for($i = 0; $i < count($this->wordObjectArray); $i++){
              $wordObj = $this->wordObjectArray[$i];
              if($wordObj->getString() == $word){
                return $wordObj;
              }
          }
  }

  function getWordCloudVisual($div_size = 400) {

    $words = array();
    foreach ($this->wordObjectArray as $word) {
      $words[$word->getContent()] = $word->getFrequency();
    }

    $cloud = "<div style='width:{$div_size}px' id='cloud'>";
    $colors = array('#00FFFF', '#0000FF', '#7FFF00', '#6495ED', '#DC143C', '#8B008B', '#B22222', '#FFD700', '#008000');

    $fmax = 96;
    $fmin = 8; 
    $tmin = min($words); 
    $tmax = max($words); 

    foreach ($words as $word => $frequency) {
    
        if ($frequency > $tmin) {
            $font_size = floor(  ( $fmax * ($frequency - $tmin) ) / ( $tmax - $tmin )  );
            $color = $colors[mt_rand(0,8)];
        }
        else {
            $font_size = 0;
        }
        
        if ($font_size >= $fmin) {
          $cloud .= "<a href='http://localhost:3000/songs/{$word}' style=\"font-size: {$font_size}px; color: $color;\">$word &nbsp;</a>";
        }
        
    }
    
    $cloud .= "</div>";
    
    return $cloud;
    
  }
         
}

?>
