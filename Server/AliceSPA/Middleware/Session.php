<?php
namespace AliceSPA\Middleware;
use AliceSPA\Helper\Utilities as utils;
use AliceSPA\Service\Session as sessionServ;
use AliceSPA\Service\APIProtocol as apip;
class Session{
    function __invoke($req,$res,$next){
        if($req->isOptions()){
            return $res;
        }


        $sessionId = utils::getRequestHeader($req,'AliceSPA-SessionID');
        if(!empty($sessionId)){
            $sessionId = $sessionId[0];
        }
        $sessionId = sessionServ::getInstance()->loadSession($sessionId);
        apip::getInstance()->setSessionId($sessionId);
        $res = $next($req, $res);
        sessionServ::getInstance()->storeSession($sessionId);

        return $res;
    }
}

$app->add(\AliceSPA\Middleware\Session::class);
