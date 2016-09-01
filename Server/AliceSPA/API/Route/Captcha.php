<?php

$app->get('/AliceSPA/api/captcha/image','\AliceSPA\Controller\Captcha:image');
$app->get('/AliceSPA/api/captcha/sms','\AliceSPA\Controller\Captcha:sms');
