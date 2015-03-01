<?php 

use Echonest\Service\Echonest;
Echonest::configure("5UXT7FYJZR50ZQQCR");

class APIManager
{


    public function __construct()
    {
    }

    // returns array of strings - artist names
    public function getArtistSuggestion($userInput)
    {
        $response = Echonest::query('artist', 'suggest', array(
                                    'name'=> $userInput,
                                    'results'=> 10));
        $response = json_decode(json_encode($response), true);
        $response = $response['response'];
        $artists = array();
        foreach ($response['artists'] as $artist)
        {
            array_push($artists, $artist['name']);
        }
        return $artists;
    }

    // returns string - url of artist image
    public function getArtistPicture($artistName)
    {
        
    }

    // returns array mapping song title to song id
    public function getArtistSongs($artistName)
    {

    }

    // returns string containing lyrics
    public function getSongLyrics($id)
    {

    }

    // sharee word cloud to facebook
    public function share() 
    {

    }
}