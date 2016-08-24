<?php

$app->get('/api/captcha/image','\AliceSPA\Controller\Captcha:image');
$app->get('/api/captcha/sms','\AliceSPA\Controller\Captcha:sms');