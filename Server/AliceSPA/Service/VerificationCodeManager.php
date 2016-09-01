<?php
namespace AliceSPA\Service;
use AliceSPA\Service\Database as db;
use AliceSPA\Helper\Utilities as utils;
use AliceSPA\Service\Authentication as auth;
use AliceSPA\Service\Session as session;
class VerificationCodeManager{

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

    public function store($code,$type){
        $codeId = utils::generateUniqueId();
        $session = session::getInstance();
        $createTime = utils::datetimePHP2Mysql(time());

        $codes = $session->get('AliceSPA_VerificationCodes');
        if(empty($codes)){
            $codes = [];
        }
        if(empty($codes[$type])){
            $codes[$type] = [];
        }
        $codes[$type][$codeId] = ['Code' => $code, 'CreateTime' => $createTime];

        if($session->set('AliceSPA_VerificationCodes', $codes) === false){
            return false;
        }

       return $codeId;
    }

    public function check($codeId,$code,$type,$validTime = null){
        $session = session::getInstance();
        $codes = $session->get('AliceSPA_VerificationCodes');
        if(empty($codes)){
            return false;
        }
        if(empty($codes[$type])){
            return false;
        }
        if(empty($codes[$type][$codeId])){
            return false;
        }
        $c = $codes[$type][$codeId];
        if(empty($c)){
            return false;
        }
        if($c['Code'] === $code && ($validTime === null ||   utils::datetimeMysql2PHP($c['CreateTime']) > time() - $validTime)){
            return true;
        }
        return false;
    }
};

$container['VCManager'] = function(){
    return \AliceSPA\Service\VerificationCodeManager::getInstance();
};