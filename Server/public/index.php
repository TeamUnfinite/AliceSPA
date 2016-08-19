<?php
$SERVER_PATH = dirname(dirname(__FILE__));

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require $SERVER_PATH . '/vendor/autoload.php';
require $SERVER_PATH . '/config/main.php';

$config = [];
$config['settings'] = $slimConfig;
$config['userConfig'] = $userConfig;

$app = new \Slim\App($config);

require $SERVER_PATH . '/DI/load.php';
require $SERVER_PATH . '/middleware/load.php';


//API
require $SERVER_PATH . '/api/load.php';
//--API

$app->run();
