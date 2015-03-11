<?php

require __DIR__ . '/../APIManager.php';
class APIManagerTest extends PHPUnit_Framework_TestCase
{
    protected $api;

    public function setUp()
    {
        $this->api = new APIManager();
    }

    public function testGetArtistSongs()
    {
        $max_results = 10;
        $songs = $this->api->getArtistSongs("Red Hot Chili Peppers", $max_results);
        $this->assertLessThanOrEqual( $max_results, count($songs));
        foreach ($songs as $s) {
            $this->assertEquals("Red Hot Chili Peppers", str_replace('&nbsp;', ' ', $s->getArtist()));
        }

    }

    public function testGetArtistPicture()
    {
        $url = $this->api->getArtistPicture("Red Hot Chili Peppers");
        $this->assertNotNull($url);
    }

    public function testGetArtistSuggestion()
    {
        $expected_count = 10;
        $suggestions = $this->api->getArtistSuggestion("Col");
        $this->assertContains("Coldplay", $suggestions);
        $this->assertContains("J. Cole", $suggestions);
        $this->assertCount($expected_count, json_decode($suggestions));
    }


}