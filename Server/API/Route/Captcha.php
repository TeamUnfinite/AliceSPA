<?php
use \AliceSPA\Service\Authentication as authService;

$app->get('/api/captcha/image','\AliceSPA\Controller\Captcha:image');

authService::makeRouteAuthentication(
        $app->post('/api/captcha/clean','\AliceSPA\Controller\Captcha:clean'),
        ['admin']
    );