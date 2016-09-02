<?php
use \AliceSPA\Helper\Utilities as utils;
$app->get('/AliceSPA/api/environment/errors','\AliceSPA\Controller\Environment:getErrors');
$app->get('/AliceSPA/api/environment/checkSession',function($req,$res,$args){return $res;});//in session middleware
utils::secureRoute(
    $app->post('/AliceSPA/api/environment/clearSessions',function($req,$res,$args){
        \AliceSPA\Service\Session::getInstance()->clearSessions();
    }),['admin']);
