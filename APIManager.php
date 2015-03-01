<?php 

//use Echonest\Service\Echonest;
Echonest\Service\Echonest::configure("5UXT7FYJZR50ZQQCR");


class APIManager
{

    private $spotify_api;

    public function __construct()
    {
        $this->spotify_api = new SpotifyWebAPI\SpotifyWebAPI();
    }

    // returns array of strings - artist names
    public function getArtistSuggestion($userInput)
    {
        $response = Echonest\Service\Echonest::query('artist', 'suggest', array(
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
        $response = $this->spotify_api->search($artistName, 'artist');
        $response = json_decode(json_encode($response), true);
        $url = $response['artists']['items'][0]['images'][0]['url'];
        return $url;
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