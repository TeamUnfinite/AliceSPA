<?php
namespace AliceSPA\middleware;
use \AliceSPA\service\APIProtocol as apip;
use \AliceSPA\exception\APIException;

class APIProtocol
{
    function __invoke($req,$res,$next){
        $apip = apip::getInstance();

        try{ // Cache APIExceptoin instance, api protocol should deal with it and fill the response body.
            $res = $next($req, $res);
        }
        catch(APIException $e){
            
            $apip->pushError($e->getCode());
            $apip->setAPIException($e);
        }

        if($apip->isEnabled()){
            $res = $apip->flush($res);
        }
        return $res;
    }
}

$app->add(\AliceSPA\middleware\APIProtocol::class);
