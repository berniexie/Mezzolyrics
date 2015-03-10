<?php
require "vendor/autoload.php";

include_once('Cloud.php');
include_once('DataManager.php');
require_once './vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./Views/templates');
$twig = new Twig_Environment($loader, array(
#    'cache' => './tmp/cache',  # turned off for development purposes
));
session_cache_limiter(false);
session_start();
$app = new \Slim\Slim();

$app->dataManager = new DataManager();

$app->get('/', function () use ($app, $twig) {
	$template = $twig->loadTemplate('homePage.phtml');
	$params = array('title' => 'Mezzolyrics');
	$template->display($params);
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
		$_SESSION['artist'] = $artist;
		if ($type == "add") {
			$cloudObject = $app->dataManager->getAddCloud($artist);
		} 
		else {
			$cloudObject = $app->dataManager->getSubmitCloud($artist);
		}
	    $wordCloud = $cloudObject->getWordCloudVisual();
	    $_SESSION['wordCloud'] = $wordCloud;
	    $_SESSION['cloud'] = $cloudObject;
		$template = $twig->loadTemplate('wordCloudPage.phtml');
		$params = array(
			'title' => "Mezzolyrics",
			'cloud' => $wordCloud);
		$template->display($params);
	}
});

$app->get('/songs/:word', function ($word) use ($app, $twig) {
	$template = $twig->loadTemplate('songListPage.phtml');
	$artist = $_SESSION['artist'];
	$cloudObject = $_SESSION['cloud'];
	$wordObject = $cloudObject->getWordObject($word);
	$songs = $wordObject->getSongTitles();
	$params = array(
		'title' => 'Mezzolyrics', 
		'searchword' => $word,
		'songs' => $songs,
		'artist' => $artist
	);
	$template->display($params);
});

$app->get('/lyrics/:artist/:song/:word', function ($artist, $song, $word) use ($app, $twig) {
	$cloudObject = $_SESSION['cloud'];
	// Get Word object for $word, then get map which contains Song objects
	$tempWordObject = $cloudObject->getWordObject($word);
	$tempMap = $tempWordObject->getMap();

	// Get lyrics from Song object
	$lyrics = $tempMap[$song]['songObject']->getOriginalLyrics();
	
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
