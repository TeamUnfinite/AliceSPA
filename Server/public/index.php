<?php
$SERVER_PATH = dirname(dirname(__FILE__));

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \AliceSPA\Helper\Config as configHelper;


require $SERVER_PATH . '/vendor/autoload.php';
require $SERVER_PATH . '/Config/load.php';

$app = new \Slim\App(['settings' => $AliceSPAConfig['slimConfig']]);

require $SERVER_PATH . '/Exception/load.php';
require $SERVER_PATH . '/Service/load.php';
require $SERVER_PATH . '/Middleware/load.php';
require $SERVER_PATH . '/Helper/load.php';  

//API
require $SERVER_PATH . '/API/load.php';
//--API

configHelper::setConfig($AliceSPAConfig);
$app->run();
