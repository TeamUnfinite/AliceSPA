<?php
namespace AliceSPA\middleware;
/**
* 
*/
class authentication
{
    function __invoke($req,$res,$next){
        $auth = \AliceSPA\service\authentication::getInstance();
        $auth->authenticateByWebToken(5,1);
        return $next($req,$res);
    }
}

$app->add(\AliceSPA\middleware\authentication::class);
