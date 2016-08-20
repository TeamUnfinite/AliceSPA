<?php
$SERVER_PATH = dirname(dirname(__FILE__));

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \AliceSPA\helper\config as ASPAConfigHelper;


require $SERVER_PATH . '/vendor/autoload.php';
require $SERVER_PATH . '/config/main.php';

$app = new \Slim\App(['settings' => $AliceSPAConfig['slimConfig']]);

require $SERVER_PATH . '/service/load.php';
require $SERVER_PATH . '/middleware/load.php';
require $SERVER_PATH . '/helper/load.php';  

//API
require $SERVER_PATH . '/api/load.php';
//--API

ASPAConfigHelper::setConfig($AliceSPAConfig);

$app->run();
