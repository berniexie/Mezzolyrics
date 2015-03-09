<?php

require __DIR__ . '/../Song.php';
class SongTest extends PHPUnit_Framework_TestCase
{
    protected $song;
    public function setUp()
    {
        $this->song = new Song("Test Title", "Test Artist", "Test Lyrics", array("Test", "Lyrics"));
    }

    public function testGetTitle()
    {
        $this->assertEquals("Test Title", $this->song->getTitle());
    }

    public function testGetArtist()
    {
        $this->assertEquals("Test Artist", $this->song->getArtist());
    }

    public function testGetOriginalLyrics()
    {
        $this->assertEquals("Test Lyrics", $this->song->getOriginalLyrics());
    }

    public function testGetParsedLyrics()
    {
        $this->assertEquals(array("Test", "Lyrics"), $this->song->getParsedLyrics());
    }

}