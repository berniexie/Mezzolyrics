<?php
require "vendor/autoload.php";


$app = new \Slim\Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/mezzolyrics', function() use ($app) {
	$template = <<<EOT
<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/myStyles.css">
    </head>

  	<body bgcolor="#660099">

	<div id="header">
	<h1>Mezzolyrics</h1>
	</div>

	<div id="canvas">
	<img src="http://static.guim.co.uk/sys-images/Guardian/Pix/contributor/2009/12/9/1260365203581/Wordle-of-Alistair-Darili-002.jpg" alt="Mountain View" style="width:800px;height:600px">
	</div>
	<div id="empty"></div>

	<div id="wrapper">
    <form id="search"><br>
	<input type="text" name="firstname" placeholder="enter an artist">
	<br></form>
    <button id="second">Search!</button>
	</div>

	<div id="footer">
	Copyright Mezzolyrics
	</div>

	</body> 
   	</html>
EOT;
    echo $template;
});

$app->run();
