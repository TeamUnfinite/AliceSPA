<?php
namespace AliceSPA\Middleware;
use \AliceSPA\Service\APIProtocol as apip;
use \AliceSPA\Exception\APIException;

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

$app->add(\AliceSPA\Middleware\APIProtocol::class);
