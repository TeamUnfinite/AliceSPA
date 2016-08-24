<?php
namespace AliceSPA\Service;
class Session{
    private $session = null;

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

    public function setSession($session){
        $this->session = $session;
    }

    public function getSession(){
        if($this->session === null){
            return false;
        }
        return $this->session;
    }

    public function set($key,$value){//BUG false may be a value in session, FIX IT
        if($this->session === null){
            return false;
        }
        $this->session[$key] = $value;
    }

    public function get($key){//BUG false may be a value in session, FIX IT
        if($this->session === null){
            return null;
        }
        return $this->session[$key];
    }
};

$container['session'] = function(){
    return \AliceSPA\Service\Session::getInstance();
};