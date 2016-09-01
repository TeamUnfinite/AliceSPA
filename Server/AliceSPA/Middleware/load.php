<?php
$MIDDLEWARE_PATH = $AliceSPA_PATH . '/Middleware';

require $MIDDLEWARE_PATH . '/Authentication.php';
require $MIDDLEWARE_PATH . '/Captcha.php';
require $MIDDLEWARE_PATH . '/APIProtocol.php';//Attention for the loading index of APIProtocol , so that it could catch exception instances. e.g. APIException

require $MIDDLEWARE_PATH . '/Session.php';
