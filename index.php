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

$app = new \Slim\Slim();

$dataManager = new DataManager();
$cloudObject;

$app->get('/test', function () use ($app) {
	$api = new APIManager();
	print_r($api->getArtistSongs("coldplay"));
});

$app->get('/', function () use ($app, $twig) {
	$template = $twig->loadTemplate('homePage.phtml');
	$params = array('title' => 'Mezzolyrics');
	$template->display($params);
});

$app->get('/cloud', function () use ($app, $twig, $dataManager, $cloudObject) {
	$artist = $app->request()->params('artist');
	$cloudObject = $dataManager->getSubmitCloud($artist);
	$wordCloud = $cloudObject->getWordCloudVisual();
	$template = $twig->loadTemplate('wordCloudPage.phtml');
	$params = array(
		'title' => 'Mezzolyrics',
		'cloud' => $wordCloud);
	$template->display($params);
});

$app->get('/songs/:word', function ($word) use ($app, $twig, $cloudObject) {
	$template = $twig->loadTemplate('songListPage.phtml');
	$wordObject = $cloudObject->getWordObject($word);
	$songs = $wordObject->getSongTitles();
	$params = array(
		'title' => 'Mezzolyrics', 
		'searchword' => $word,
		'songs' => $songs
	);
	$template->display($params);
});

$app->get('/lyrics/:song', function ($song) use ($app, $twig) {
	$lyrics = "STUFFFFFFFFF";
	// FILLL THIS IN
	// $lyrics = $cloudObject->getWordObject
	$template = $twig->loadTemplate('lyricsPage.phtml');
	$params = array(
		'title' => 'Mezzolyrics',
		'songtitle' => $song,
		'artist' => 'Artist Z',
		'lyrics' => $lyrics);
	$template->display($params);
});

$app->run();