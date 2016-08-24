<?php
use \AliceSPA\Helper\Utilities as tuils;

$app->post('/api/account/login','\AliceSPA\Controller\Account:login');

$app->post('/api/account/register','\AliceSPA\Controller\Account:register');

tuils::secureRoute(
        $app->post('/api/account/info','\AliceSPA\Controller\Account:info')
    );