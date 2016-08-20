<?php
namespace AliceSPA\helper;

class config
{
    private static $config = null;

    private function __construct(){
    }

    public function __clone(){
    }

    public static function setConfig($config){
        self::$config = $config;
    }
    public static function getConfig(){
        return self::$config;
    }
};


