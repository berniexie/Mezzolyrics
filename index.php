<?php

require "vendor/autoload.php";
require "APIManager.php";

require_once './vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./Views/templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => './tmp/cache',  # turned off for development purposes
));

$app = new \Slim\Slim();

$app->get('/test/api', function () {
    $manager = new APIManager();
    $manager->getArtistSuggestion('nir');
    //$manager->getArtistPicture("Daft Punk");
    $manager->getArtistSongs("J. Cole");
    $manager->getSongLyrics("SOKPCYI13F6B1E9740");
});

$app->get('/', function () use ($app, $twig) {
	$template = $twig->loadTemplate('homePage.phtml');
	$params = array('title' => 'Mezzolyrics');
	$template->display($params);
});

$app->get('/songs', function () use ($app, $twig) {
	$template = $twig->loadTemplate('songListPage.phtml');
	$params = array(
		'title' => 'Mezzolyrics', 
		'searchword' => 'Word X',
		'songs' => array(
			array(
				'title' => 'Song 1',
				'frequency' => '4'
			),
			array(
				'title' => 'Song 2',
				'frequency' => '3'
			),
			array(
				'title' => 'Song 3',
				'frequency' => '2'
			),
			array(
				'title' => 'Song 4',
				'frequency' => '1'
			)
		)
	);
	$template->display($params);
});

$app->get('/lyrics', function () use ($app, $twig) {
	$lyrics = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper malesuada sem, nec ornare libero fermentum scelerisque. Nulla sed elit malesuada, condimentum nunc ac, vehicula libero. Suspendisse sit amet tellus laoreet, laoreet felis sit amet, iaculis orci. Suspendisse in viverra tellus, quis venenatis nisl. Nullam in ligula arcu. Nunc commodo, ante eget tempor dapibus, diam dui porta nisl, id mollis libero lorem ut lacus. Quisque fringilla ante a semper porttitor. Donec a ornare ligula, nec luctus arcu. Sed in ex cursus, fringilla augue id, pretium sem. Suspendisse velit tellus, iaculis maximus libero ut, sodales feugiat tortor. Praesent laoreet, justo vel fermentum rutrum, lacus dolor dignissim est, mollis bibendum risus dui quis massa. Mauris sit amet ante bibendum, venenatis arcu a, viverra purus. Cras at purus ligula.';
	$template = $twig->loadTemplate('lyricsPage.phtml');
	$params = array(
		'title' => 'Mezzolyrics',
		'songtitle' => 'Song Y',
		'artist' => 'Artist Z',
		'lyrics' => $lyrics);
	$template->display($params);
});

$app->get('/cloud', function () use ($app, $twig) {
	$template = $twig->loadTemplate('wordCloudPage.phtml');
	$params = array('title' => 'Mezzolyrics');
	$template->display($params);
});

$app->run();