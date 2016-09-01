<?php
namespace AliceSPA\Controller;
use \AliceSPA\Helper\Config as configHelper;
use \AliceSPA\Service\APIProtocol as apip;
class Environment{
    private $c;
    public function __construct($c){
        $this->c = $c;
    }

    public function getErrors ($req,$res,$args){
        $errors = configHelper::getErrors();
        apip::getInstance()->setData($errors);
    }

};
