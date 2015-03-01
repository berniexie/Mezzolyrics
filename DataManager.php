<?php
include_once('Cloud.php');
include_once('Song.php');
include_once('Word.php');
include_once('APIManager.php');

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
          $this->artists[] = $artistName;   
          //Use the APIManager to fill in songs with Song Objs from the artist
          $this->songs = $this->apiManager->getArtistSongs($artistName);
        }
         
        public function getWords(){
          foreach($this->songs as $song){            
            $lyrics = $song->getParsedLyrics(); //this gets the individual lyrics
                                               // Why was this commented out?
            foreach($lyrics as $lyric){
              $bool = false;
              foreach($this->words as $word){
                //if it does, call the found() function in the word
                if($lyric == $word->getContent()){
                  $word->found();
                  $bool = true; 
                }
              }
              if($bool == false) {
                //If not, initialize it to a word object and add it to the array
                $word = new Word($lyric, $song);
                $words[] = $word;
              }
            }
            unset($song); //this pops the item from the array
          }
        }

        public function getCloud($artistName){
          $this->addArtist($artistName);
          $this->getWords();
          //only getting the first 250 elements 
          $cloudArray = array_slice($this->words, 0, 250);
          $this->cloud = new Cloud($this->artists, $cloudArray);
          return $this->cloud;
        }
}

?>
