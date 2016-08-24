<?php
use \AliceSPA\Helper\Utilities as utils;

$app->get('/api/captcha/image','\AliceSPA\Controller\Captcha:image');
$app->get('/api/captcha/sms','\AliceSPA\Controller\Captcha:sms');