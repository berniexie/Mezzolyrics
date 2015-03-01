<?php

class Cloud 
{
	private $artists = array();	//array of artists used to generate the cloud
	private $lyricCloud = array();	//array of Word items used in the lyric cloud

   	public function __construct($artists, $lyricCloud)
   	{
   		$this->artists = artists;
   		$this->lyricCloud = lyricCloud;
   	}
        /*

        public function addNewWords($newArtist, $newWords){
                $artists[] = $newArtist;
                for($i = 0; $i < count($newWords); $i++){
                    $lyricCloud[] = $newWords[$i];
                }
                //sort the array after adding an object


                $lyricCloud = usort($lyricCloud, 
                  function($a, $b){
                    return ($a->getFrequency() > $b->getFrequency());
                  });
        }
        */

        public function getWordObject($word){
                for($i = 0; $i < count($newWords); $i++){
                    $wordObj = $lyricCloud[$i];
                    if($wordObj->getString() == $word){
                      return $wordObj;
                    }
                }
        }
         
}

?>
