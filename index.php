<?php
require "vendor/autoload.php";

include_once('Cloud.php');
include_once('DataManager.php');
require_once './vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./Views/templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => './tmp/cache',  # turned off for development purposes
));
session_cache_limiter(false);
session_start();
$app = new \Slim\Slim();

$app->get('/', function () use ($app, $twig) {	
	$template = $twig->loadTemplate('homePage.phtml');
	$params = array('title' => 'Mezzolyrics');
	$template->display($params);
	$_SESSION['dataManager'] = new DataManager();
});

$app->get('/auto', function () use ($app, $twig) {
	$tags = $app->request()->params('q');
	$callback = $app->request()->params('callback');
	$auto = $_SESSION['dataManager']->getAutofillSuggestions($tags);
	echo $callback . '(' . json_encode($auto) . ');';
});

$app->get('/cloud/:type', function ($type) use ($app, $twig) {
	$artist = $app->request()->params('artist');
 	if ($type == "back") {
		$wordCloud = $_SESSION['wordCloud'];
		$template = $twig->loadTemplate('wordCloudPage.phtml');
		$params = array(
			'title' => "Mezzolyrics",
			'cloud' => $wordCloud);
		$template->display($params);
	} else {
		if ($type == "add") {
			$cloudObject = $_SESSION['dataManager']->getAddCloud($artist);
		} 
		else {
			$cloudObject = $_SESSION['dataManager']->getSubmitCloud($artist);
		}
	    $wordCloud = $cloudObject->getWordCloudVisual();
	    $_SESSION['wordCloud'] = $wordCloud;
	    $_SESSION['cloud'] = $cloudObject;
		$template = $twig->loadTemplate('wordCloudPage.phtml');
		$params = array(
			'title' => 'Mezzolyrics',
			'cloud' => $wordCloud);
		$template->display($params);
	}
});

$app->get('/songs/:word', function ($word) use ($app, $twig) {
	$template = $twig->loadTemplate('songListPage.phtml');
	$cloudObject = $_SESSION['cloud'];
	$wordObject = $cloudObject->getWordObject($word);
	$songs = $wordObject->getSongTitles();
	$params = array(
		'title' => 'Mezzolyrics', 
		'searchword' => $word,
		'songs' => $songs
		);
	$template->display($params);
});

$app->get('/lyrics/:song/:word', function ($song, $word) use ($app, $twig) {
	$cloudObject = $_SESSION['cloud'];
	// Get Word object for $word, then get map which contains Song objects
	$tempWordObject = $cloudObject->getWordObject($word);
	$tempMap = $tempWordObject->getMap();

	// Get lyrics from Song object
	$lyrics = $tempMap[$song]['songObject']->getOriginalLyrics();
	$artist = $tempMap[$song]['songObject']->getArtist();
	$highlighted = "<mark>".$word."</mark>";
	$lyrics = preg_replace("/\b".$word."\b/u", $highlighted, $lyrics);
		
	$template = $twig->loadTemplate('lyricsPage.phtml');
	$params = array(
		'title' => 'Mezzolyrics',
		'songtitle' => $song,
		'artist' => $artist,
		'lyrics' => $lyrics,
		'word' => $word
		);
	$template->display($params);
});

$app->run();
