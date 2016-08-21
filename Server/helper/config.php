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
        if(isset($config['coreConfig']['timezone'])){
            ini_set('date.timezone',$config['coreConfig']['timezone']);
        }
        if(isset($config['coreConfig']['displayPHPErrors'])){
            ini_set('display_errors',$config['coreConfig']['displayPHPErrors']);
        }
        else{
            ini_set('display_errors',false);
        }
        if(!isset($config['coreConfig']['autoincrementBeginValue'])){
            $config['coreConfig']['autoincrementBeginValue'] = 1;
        }
        self::$config = $config;
    }
    public static function getConfig(){
        return self::$config;
    }
    public static function getCoreConfig(){
        return self::$config['coreConfig'];
    }
};


