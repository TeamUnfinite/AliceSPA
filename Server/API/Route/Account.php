<?php
$app->post('/api/account/login','\AliceSPA\Controller\Account:login');
$app->post('/api/account/register','\AliceSPA\Controller\Account:register');