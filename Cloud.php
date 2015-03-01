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

        public function addNewWords($newArtist, $newWords){
                $artists[] = $newArtist;
                for($i = 0; $i < count($newWords); $i++){
                    $lyricCloud[] = $newWords[$i];
                }
        }

        public function getWordObject($word){
                for($i = 0; $i < count($newWords); $i++){
                    $wordObj = $lyricCloud[$i];
                    if($wordObj->getString() == $word){
                      return $wordObj;
                    }
                }
        }

        public function generateCloud(){

        }
}

?>
