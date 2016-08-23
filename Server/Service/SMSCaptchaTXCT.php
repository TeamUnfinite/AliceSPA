<?php
namespace AliceSPA\Service;
class SMSCaptchaTXCT{
    private static $_instance;

    private function __construct(){
    }

    public function __clone(){
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function send()
};

$container['SMSCaptchaTXCT'] = function(){
    return \AliceSPA\Service\SMSCaptchaTXCT::getInstance();
};