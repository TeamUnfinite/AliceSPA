<?php
use \AliceSPA\Service\Authentication as authService;

$app->get('/api/captcha/image','\AliceSPA\Controller\Captcha:image');
$app->get('/api/captcha/sms','\AliceSPA\Controller\Captcha:sms');
authService::makeRouteAuthentication(
        $app->post('/api/captcha/clean','\AliceSPA\Controller\Captcha:clean'),
        ['admin']
    );