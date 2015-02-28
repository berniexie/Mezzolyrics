<?php
require "vendor/autoload.php";


$app = new \Slim\Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/', function() use ($app) {
  $app->render('word_cloud_page.php');
});

$app->run();
