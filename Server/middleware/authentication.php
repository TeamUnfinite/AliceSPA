<?php
namespace AliceSPA\middleware;
use \AliceSPA\service\authentication as authService;
use \AliceSPA\helper\utilities as utils;
class authentication
{
    function __invoke($req,$res,$next){
        $userId = utils::getRequestHeader($req,'AliceSPA-UserID');
        $webToken = utils::getRequestHeader($req,'AliceSPA-WebToken');
        $userId = empty($userId)?null:$userId[0];
        $webToken = empty($webToken)?null:$webToken[0];
        $r = authService::getInstance()->authenticateByWebToken($userId,$webToken);
        return $next($req,$res);
    }
}

$app->add(\AliceSPA\middleware\authentication::class);
