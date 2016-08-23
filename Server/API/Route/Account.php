<?php
use \AliceSPA\Service\Authentication as authService;

$app->post('/api/account/login','\AliceSPA\Controller\Account:login');

$app->post('/api/account/register','\AliceSPA\Controller\Account:register');

authService::makeRouteAuthentication(
        $app->post('/api/account/info','\AliceSPA\Controller\Account:info')
    );