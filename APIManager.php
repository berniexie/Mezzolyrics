<?php 

//use Echonest\Service\Echonest;
Echonest\Service\Echonest::configure("5UXT7FYJZR50ZQQCR");
include_once('Song.php');
include(__DIR__ . '/vendor/jacksonbrodeur/RapGenius-PHP/src/rapgenius.php');



class APIManager
{


    private $spotify_api;
    //http://www.ranks.nl/stopwords
    private $stop_words = array('a','about','above','after','again', 'know', 'like' ,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
                                'against','all','am','an','and','any','are','arent', 'us', 'tell', 'let', 'oh', 'can', 'got', 'makes', 'just', 'get',
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
        $artists = json_encode($artists);
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
    public function getArtistSongs($artistName, $limit = 50)
    {
        $urlArtistName = str_replace(' ', '-', $artistName);
        $urlArtistName = str_replace('$', '-', $urlArtistName);
        $urlArtistName = str_replace('--', '-s', $urlArtistName);
        $urlArtistName = str_replace('\'', '', $urlArtistName);
        $urlArtistName = str_replace('.', '', $urlArtistName);
        $songs = array();
        foreach (album_list($urlArtistName) as $album) {
            $albumUrl = $album['link'];

            try
            {
                $tracks = tracklist($albumUrl);
            } catch (Exception $e) {
                continue;
            }
            foreach ($tracks as $track) {
                $title = $track['title'];
                if(strpos(strtolower($title), 'credit') !== false) continue;
                $trackUrl = $track['link'];

                try
                {
                    $lyrics = lyrics($trackUrl, FALSE);
                    $simplified_lyrics = trim(preg_replace('/\[.*?\]/', '', $lyrics));
                    $simplified_lyrics = str_replace('(', '', $simplified_lyrics);
                    $simplified_lyrics = str_replace(')', '', $simplified_lyrics);
                    $simplified_lyrics = preg_replace("/[^A-Za-z ]/", '', $simplified_lyrics);
                    $simplified_lyrics = strtolower($simplified_lyrics);
                    foreach ($this->stop_words as $word) {
                        $simplified_lyrics = str_replace(' ' . $word . ' ', ' ', $simplified_lyrics);
                    }
                     $lyrics_array = preg_split('/\s+/', $simplified_lyrics);
                    
                    $title = str_replace('.', '', $track['title']);
                    $s = new Song($title, $track['artist'], $lyrics, $lyrics_array);
                    $songs[] = $s;
                    if(count($songs) >= $limit) return $songs;
                } catch (Exception $e) {
                    continue;
                }
                
            }
        }
        return $songs;
    }

    // sharee word cloud to facebook
    public function share() 
    {

    }
}