<?php
namespace AliceSPA\DI;

class APIProtocol
{
    var $data = [
        'status' => 'SUCCESS',
        'errors' => [],
        'data' => null
    ];

    var $isEnabled = true;

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

    function setSuccess(){
        $this->data['status'] = 'SUCCESS';
    }

    function setFailure(){
        $this->data['status'] = 'FAILURE';
    }

    function isSuccess(){
        return $this->data['status'] === 'SUCCESS';
    }

    function setData($data){
        $this->data['data'] = $data;
    }

    function getData(){
        return $this->data['data'];
    }

    function getResponse(){
        return $this->data;
    }

    function setEnabled(){
        $this->isEnabled = true;
    }

    function setDisabled(){
        $this->isEnabled = false;
    }

    function isEnabled(){
        return $this->isEnabled;
    }
}

$container['apip'] = function(){
    return \AliceSPA\DI\APIProtocol::getInstance();
};