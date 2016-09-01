<?php
namespace AliceSPA\Helper;

class Config
{
    private static $config = null;
    private static $errors = null;
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
        if(!isset($config['coreConfig']['showAPIExceptoin'])){
            $config['coreConfig']['showAPIExceptoin'] = false;
        }
        if(!isset($config['coreConfig']['imageCaptchaValidTime'])){
            $config['coreConfig']['imageCaptchaValidTime'] = 24*60*60;
        }
        if(!isset($config['coreConfig']['SMSCaptchaValidTime'])){
            $config['coreConfig']['SMSCaptchaValidTime'] = 24*60*60;
        }
        if(!isset($config['coreConfig']['SMSCaptchaSpan'])){
            $config['coreConfig']['SMSCaptchaSpan'] = 60;
        }


            
        $config['securimageConfig']['no_session'] = true;
        $config['securimageConfig']['use_database'] = false;
        $config['securimageConfig']['no_exit'] = true;
        

        self::$config = $config;
    }
    public static function getConfig(){
        return self::$config;
    }
    public static function getCoreConfig(){
        return self::$config['coreConfig'];
    }
    public static function setErrors($errors){
        self::$errors = $errors;
    }
    public static function getErrors(){
        return self::$errors;
    }
};


