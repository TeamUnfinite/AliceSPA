<?php
namespace AliceSPA\middleware;
/**
* 
*/
class APIProtocol
{
    function __invoke($req,$res,$next){
		
    $res = $next($req, $res);

    $apip = \AliceSPA\service\APIProtocol::getInstance();
    if($apip->isEnabled()){
        $res->withJson($apip->getResponse());
    }
    else{

    }
		
    return $res;
    }
}

$app->add(\AliceSPA\middleware\APIProtocol::class);
