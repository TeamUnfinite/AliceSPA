<?php
namespace AliceSPA\Service;
use AliceSPA\Service\Database as db;
use AliceSPA\Helper\Utilities as utils;
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

    public function clean($validTime/*second*/){
        $db = db::getInstance();
        $expiredTime = time() - $validTime;
        $expiredTime = utils::datetimePHP2Mysql($expiredTime);
        $db->delete('verification_code',[
                'AND' => [
                    'create_time[<]' => $expiredTime
                ]
            ]);
        return true;
    }

    public function store($code,$type){
        $codeId = rand(100000,999999) . uniqid();
        $db = db::getInstance();
        //$codeId = 1;
        $r = $db->insert('verification_code',[
                'id' => $codeId,
                'code' => $code,
                'type' => $type
            ]);
        if($db->error()[1]!==null){
            return false;
        }
        return $codeId;
    }

    public function check($codeId,$code,$type,$validTime){
        $db = db::getInstance();
        $expiredTime = time() - $validTime;
        $expiredTime = utils::datetimePHP2Mysql($expiredTime);
        $r = $db->has('verification_code',[
                'AND' => [
                    'code_id' => $codeId,
                    'code' => $code,
                    'type' => $type,
                    'create_time[>]' => $expiredTime
                ]
            ]);
        return $r;
    }
};