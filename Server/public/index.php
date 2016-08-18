<?php
$SERVER_PATH = dirname(dirname(__FILE__));

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require $SERVER_PATH . '/vendor/autoload.php';
require $SERVER_PATH . '/config/main.php';

//database
$getDB = function()use($databaseConfig){
	return new medoo($databaseConfig);
};
//--database

$config = [];
$config['settings'] = $slimConfig;
$config['userConfig'] = $userConfig;
$config['db'] = $getDB;


$app = new \Slim\App($config);

//API
$API_PATH = $SERVER_PATH . '/api';
require $API_PATH . '/account.php';
//--API

$app->run();
