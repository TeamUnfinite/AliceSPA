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
configHelper::setErrors($AliceSPAErrors);

if(!empty(configHelper::getCoreConfig()['CORSOrigin'])){
    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });

    $app->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
                ->withHeader('Access-Control-Allow-Origin', configHelper::getCoreConfig()['CORSOrigin'])
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    });
}


$app->run();
