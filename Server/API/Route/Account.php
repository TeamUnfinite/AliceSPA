<?php
use \AliceSPA\Helper\Utilities as utils;

$app->post('/api/account/login','\AliceSPA\Controller\Account:login');

$app->post('/api/account/register','\AliceSPA\Controller\Account:register');

utils::makeRouteAuthentication(
        $app->post('/api/account/info','\AliceSPA\Controller\Account:info')
    );