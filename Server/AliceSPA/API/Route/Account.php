<?php
use \AliceSPA\Helper\Utilities as utils;

$app->post('/AliceSPA/api/account/login','\AliceSPA\Controller\Account:login');

$app->post('/AliceSPA/api/account/register','\AliceSPA\Controller\Account:register');

utils::secureRoute(
        $app->post('/AliceSPA/api/account/info','\AliceSPA\Controller\Account:info')
    );

utils::secureRoute(
        $app->post('/AliceSPA/api/account/logout','\AliceSPA\Controller\Account:logout')
    );
