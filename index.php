<?php
require "vendor/autoload.php";


$app = new \Slim\Slim();

$app->get('/search_artist/', function() use ($app){
  $req = $app->request();
  $searched_artist = $req->get('firstname');
  echo "$searched_artist";
});

$app->get('/', function() use ($app) {
  $app->render('word_cloud_page.php');
});

$app->get('/song_list', function() use ($app) {
  $app->render('song_list_page.php');
});

$app->run();