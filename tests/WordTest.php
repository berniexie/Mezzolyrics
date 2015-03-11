<?php
require __DIR__ . '/../Word.php';

class WordTest extends PHPUnit_Framework_TestCase
{
    protected $word;
    protected $song;

    public function setUp()
    {
        $this->song = new Song("Test Title", "Test Artist", "Test Lyrics", array("Test", "Lyrics"));
        $this->word = new Word("Test", $this->song);
    }

    public function testCmp()
    {
        $a = array('frequency' => 100);
        $b = array('frequency' => 1);

        $this->assertTrue($this->word->cmp($b, $a));
        $this->assertFalse($this->word->cmp($a, $b));
    }

    public function testGetString()
    {
        $this->assertEquals("Test", $this->word->getString());
    }

    public function testGetContent()
    {
        $this->assertEquals("Test", $this->word->getContent());
    }

    public function testGetFrequency()
    {
        $this->assertEquals(1, $this->word->getFrequency());
    }

    public function testGetSongTitles()
    {
        $this->assertEquals(array(array('title'=>'Test Title', 'frequency' => 1)), $this->word->getSongTitles());
    }

    public function testFound()
    {
        $previous_value = $this->word->getFrequency();
        $this->word->found($this->song);
        $new_value = $this->word->getFrequency();
        $this->assertEquals($previous_value + 1, $new_value);
    }
}