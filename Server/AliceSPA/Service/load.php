<?php
$SERVICE_PATH = $AliceSPA_PATH . '/Service';
$container = $app->getContainer();
require $SERVICE_PATH . '/APIProtocol.php';
require $SERVICE_PATH . '/Database.php';
require $SERVICE_PATH . '/Authentication.php';
require $SERVICE_PATH . '/VerificationCodeManager.php';
require $SERVICE_PATH . '/ImageCaptcha.php';
require $SERVICE_PATH . '/Session.php';
