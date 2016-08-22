<?php
namespace AliceSPA\Middleware;
use \AliceSPA\Service\Authentication as authService;
use \AliceSPA\Helper\Utilities as utils;
use \AliceSPA\Exception\APIException;
use \AliceSPA\Service\APIProtocol as apip;
class Authentication
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

$app->add(\AliceSPA\Middleware\authentication::class);
