<?php
namespace AliceSPA\middleware;
use \AliceSPA\service\authentication as authService;
use \AliceSPA\helper\utilities as utils;
use \AliceSPA\exception\APIException;
use \AliceSPA\service\APIProtocol as apip;
class authentication
{
    function __invoke($req,$res,$next){
        $userId = utils::getRequestHeader($req,'AliceSPA-UserID');
        $webToken = utils::getRequestHeader($req,'AliceSPA-WebToken');
        $userId = empty($userId)?null:$userId[0];
        $webToken = empty($webToken)?null:$webToken[0];
        $r = utils::disposeAPIException(
            function()use($userId,$webToken){
                $userId && $webToken && authService::getInstance()->authenticateByWebToken($userId,$webToken);
                return null;
            },[1=>['dispel'=>2]]);
        return $next($req,$res);
    }
}

$app->add(\AliceSPA\middleware\authentication::class);
