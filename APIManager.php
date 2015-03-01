<?php 

//use Echonest\Service\Echonest;
Echonest\Service\Echonest::configure("5UXT7FYJZR50ZQQCR");
require __Dir__ . "/classes/Song.php";


class APIManager
{


    private $spotify_api;
    //http://www.ranks.nl/stopwords
    private $stop_words = array('a','about','above','after','again',
                                'against','all','am','an','and','any','are','arent',
                                'as','at','be','because','been','before','being',
                                'below','between','both','but','by','cant','cannot',
                                'could','couldnt','did','didnt','do','does','doesnt',
                                'doing','dont','down','during','each','few','for','from','further',
                                'had','hadnt','has','hasnt','have','havent','having','he','hed',
                                'hell','hes','her','here','heres','hers','herself','him','himself','his',
                                'how','hows','i','id','ill','im','ive','if','in','into','is','isnt','it',
                                'its','itself','lets','me','more','most','mustnt','my','myself','no','nor',
                                'not','of','off','on','once','only','or','other','ought','our','ours','ourselves',
                                'out','over','own','same','shant','she','shed','shell','shes','should','shouldnt',
                                'so','some','such','than','that','thats','the','their','theirs',
                                'them','themselves','then','there','theres','these','they','theyd','theyll',
                                'theyre','theyve','this','those','through','to','too','under','until','up','very',
                                'was','wasnt','we','wed','well','were','weve','were','werent','what','whats',
                                'when','whens','where','wheres','which','while','who','whos','whom','why',
                                'whys','with','wont','would','wouldnt','you','youd','youll','youre',
                                'youve','your','yours','yourself','yourselves');

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

    // returns array of Song objects containing all the songs of a given artist
    public function getArtistSongs($artistName)
    {
        $response = Echonest\Service\Echonest::query('song', 'search', array(
                                    'artist'=> $artistName,
                                    'results'=> 100,
                                    'rank_type' => 'familiarity',
                                    'song_type' => 'studio',
                                    'sort' => 'song_hotttnesss-desc'));
        $response = json_decode(json_encode($response), true)['response'];
        $songs = array();
        foreach($response['songs'] as $song)
        {
            $title = $song['title'];
            $id = $song['id'];
            $lyrics = $this->getSongLyrics($id);
            $artist = $song['artist_name'];
            $s = new Song($title, $artist, $lyrics['display_lyrics'], $lyrics['lyrics_array']);
            $songs[] = $s;
            break;
            
        }
        return $songs;
    }

    // returns string containing lyrics
    public function getSongLyrics($id)
    {
        $response = Echonest\Service\Echonest::query('song', 'profile', array(
                                    'id' => $id));
        $response = json_decode(json_encode($response), true)['response'];
        try
        {
            $title = $response['songs'][0]['title'];
            $artist = $response['songs'][0]['artist_name'];
            $artist_lower = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $artist));
            $title_lower = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $title));
            $html = file_get_contents('http://www.azlyrics.com/lyrics/' . $artist_lower . '/' . $title_lower . '.html');
        } catch (Exception $e) {
            return null;
        }
        
        $html =  substr($html, strpos($html, "start of lyrics"), strpos($html, "end of lyrics") - strpos($html, "start of lyrics"));
        $html = str_replace('<!--', '', $html);
        $html = str_replace('start of lyrics -->', '', $html);
        $display_lyrics = $html;
        $html = str_replace('<i>', '', $html);
        $html = str_replace('</i>', '', $html);
        $html = preg_replace('#\s*\[.+\]\s*#U', ' ', $html);
        $html = str_replace('<!--', '', $html);
        $html = str_replace('<br />', ' ', $html);

        $html = strtolower(preg_replace("/[^A-Za-z ]/", '', $html));
        $simple_lyrics = $html;
        foreach ($this->stop_words as $word) {
            $simple_lyrics = str_replace(' ' . $word . ' ', ' ', $simple_lyrics);
        }

        $lyrics_array = preg_split('/\s+/', $simple_lyrics);
        

        $song = new Song($title, $artist, $display_lyrics, $lyrics_array);
        return compact('display_lyrics', 'lyrics_array');
    }

    // sharee word cloud to facebook
    public function share() 
    {

    }
}