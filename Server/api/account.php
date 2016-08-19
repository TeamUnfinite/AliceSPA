<?php

//account login
$app->post('/api/account/login',function($req,$res,$args){
    $parsedBody = $req->getParsedBody();
    $r = $this->auth->loginByUnionField($parsedBody,$parsedBody['password']);
    $this->apip->setData($r);
    return $res;
});

$app->post('/api/account/register',function($req,$res,$args){
    $parsedBody = $req->getParsedBody();
    $r = $this->auth->registerByUnionField($parsedBody,$parsedBody['password']);
    $this->apip->setData($r);
    return $res;
});