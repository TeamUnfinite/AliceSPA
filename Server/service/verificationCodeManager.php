<?php
namespace AliceSPA\service;
use AliceSPA\service\database as db;
use AliceSPA\helper\utilities as utils;
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

    public function clean($userId,$type,$validTime){
        $db = db::getInstance();
        $expiredTime = time() - $validTime;
        $expiredTime = utils::datetimePHP2Mysql($expiredTime);
        $db->delete('verification_code',[
                'AND' => [
                    'user_id' => $userId,
                    'type' => $type,
                    'create_time[<]' => $expiredTime
                ]
            ]);
        return true;
    }

    public function store($userId,$code,$type){
        $codeId = strval($userId) . time() . rand(0,100000);
        $db = db::getInstance();
        //$codeId = 1;
        $r = $db->insert('verification_code',[
                'user_id' => $userId,
                'code_id' => $codeId,
                'code' => $code,
                'type' => $type
            ]);
        if($db->error()[1]!==null){
            return false;
        }
        return $codeId;
    }

    public function check($userId,$codeId,$code,$type,$validTime){
        $db = db::getInstance();
        $expiredTime = time() - $validTime;
        $expiredTime = utils::datetimePHP2Mysql($expiredTime);
        $r = $db->has('verification_code',[
                'AND' => [
                    'user_id' => $userId,
                    'code_id' => $codeId,
                    'code' => $code,
                    'type' => $type,
                    'create_time[>]' => $expiredTime
                ]
            ]);
        return $r;
    }
};