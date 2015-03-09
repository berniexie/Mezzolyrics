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

  public function __construct()
  {
    //the usefulness of this is debatable
    $this->apiManager = new APIManager();
  }

  public function clearArtistsAndSongs()
  {
    $this->artists = null;
    $this->songs = null;
  }

  public function getAutofillSuggestions($userInput)
  {
    // Passes autofill suggestions from apiManager
    return $this->apiManager->getArtistSuggestion($userInput);
  }

  public function addArtist($artistName)
  {
    $this->artists[] = $artistName;
    
    $this->songs = $this->apiManager->getArtistSongs($artistName);

    /*// Get songs from new artist
    $newSongs = array();
    $newSongs = $this->apiManager->getArtistSongs($artistName);

    // Add songs from new artist to songs array
    $this->songs = array_merge($this->songs, $newSongs);*/
  }
   
  public function getWords()
  {
    foreach($this->songs as $song)
    {            
      $lyrics = $song->getParsedLyrics(); //this gets the individual lyrics
      
      foreach($lyrics as $lyric)
      {
        $bool = false;

        foreach($this->words as $word)
        {
          //if it does, call the found() function in the word
          if($lyric == $word->getContent())
          {
            $word->found($song);
            $bool = true; 
          }
        }

        if($bool == false)
        {
          //If not, initialize it to a word object and add it to the array
          $word = new Word($lyric, $song);
          $this->words[] = $word;
        }
      }

      //unset($song); //this pops the item from the array so we don't have to parse it each time
    }

    $this->songs = null; // Set to null because unset was not removing item from array
  }

  //this is for when the addArtist button is clicked
  public function getAddCloud($artistName)
  {
    $this->addArtist($artistName);
    $this->getWords();

    //only getting the first 250 elements 
    $cloudArray = $this->words; 
    $cloudArray = array_slice($cloudArray, 0, 250);
    $this->cloud = new Cloud($this->artists, $cloudArray);
    return $this->cloud;
  }

  //this is for when the submit button is clicked
  public function getSubmitCloud($artistName)
  {
    $this->clearArtistsAndSongs();
    return $this->getAddCloud($artistName);
  }
}

?>
