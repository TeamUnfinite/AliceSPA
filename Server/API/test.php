<?php
$app->get('/cap',function($req,$res,$argd){
    \AliceSPA\Service\APIProtocol::getInstance()->setDisabled();
    (new \Securimage())->show();
});

