<?php
namespace AliceSPA\middleware;
use \AliceSPA\service\authentication as authService;

class authentication
{
    function __invoke($req,$res,$next){
//     $auth = authentication::getInstance();
        return $next($req,$res);
    }
}

$app->add(\AliceSPA\middleware\authentication::class);
