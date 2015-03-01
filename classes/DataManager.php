<?php
include 'Cloud.php'
include 'Song.php'
include 'Word.php'
include 'APIManager.php'

class DataManager 
{
	private $artists = array();	//array of artists used to generate the cloud
	private $words = array();	//array of Word objects
        private $songs = array();
        private $cloud;
        private $apiManager;

        public function __construct(){
          //the usefulness of this is debatable
          $this->apiManager = new APIManager();
        }

        public function addArtist($artistName){
          $this->artists[] = artistName;   
          //Use the APIManager to fill in songs with Song Objs from the artist
        }
         
        public function getWords(){
          foreach($songs as $song){
            unset($song); //this pops the item from the array
            //$lyrics = $song.getParsedLyrics(); //this gets the individual lyrics
            foreach($lyrics as $lyric){
              $bool = false;
              foreach($words as $word){
                //if it does, call the found() function in the word
                if($lyric == $word->getContent()){
                  $word.found();
                  $bool = true; 
                }
              }
              if($bool == false {
                //If not, initialize it to a word object and add it to the array
                $word = new Word($lyric, $song);
                $words[] = $word;
              }
            }
          }
        }

        public function getCloud($artistName){
          $this->addArtist($artistName);
          $this->getWords();
          //only getting the first 250 elements 
          $cloudArray = new array_slice($this->words, 0, 250);
          $this->cloud = new Cloud($artists, $cloudArray);
          return $this->cloud;
        }
}

?>
