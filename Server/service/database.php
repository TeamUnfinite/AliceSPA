<?php
namespace AliceSPA\service;
class database{
   private static $_instance;

    private function __construct(){
    }

    public function __clone(){
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof medoo)){
            self::$_instance = new \medoo(\AliceSPA\helper\config::getConfig()['medooConfig']);
        }
        return self::$_instance;
    }
};
$container['db'] = function(){
    return \AliceSPA\service\database::getInstance();
};