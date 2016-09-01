<?php
$app->get('/AliceSPA/api/environment/errors','\AliceSPA\Controller\Environment:getErrors');
$app->get('/AliceSPA/api/environment/checkSession',function($req,$res,$args){return $res;});
