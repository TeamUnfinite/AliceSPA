<?php
$APP_PATH  = dirname(dirname(__FILE__));
$SERVER_PATH = dirname($APP_PATH);
$AliceSPA_PATH = $SERVER_PATH . '/AliceSPA';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \AliceSPA\Helper\Config as configHelper;


require $SERVER_PATH . '/vendor/autoload.php';
require $APP_PATH . '/Config/load.php';

$app = new \Slim\App(['settings' => $AliceSPAConfig['slimConfig']]);

require $AliceSPA_PATH . '/Exception/load.php';
require $AliceSPA_PATH . '/Service/load.php';
require $AliceSPA_PATH . '/Middleware/load.php';
require $AliceSPA_PATH . '/Helper/load.php';

//API
require $AliceSPA_PATH . '/API/load.php';
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
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization' .
                    ', AliceSPA-UserID, AliceSPA-WebToken, AliceSPA-SessionID')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    });
}

$app->run();
