<?php

$app->get('/test',function($req,$res,$args){
    $r = $this->session->get('a');
    \AliceSPA\Service\APIProtocol::getInstance()->setData($r);
    return $res;
});