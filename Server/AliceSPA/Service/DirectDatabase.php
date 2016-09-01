<?php
namespace AliceSPA\Service;
use AliceSPA\Service\Database as db;
class DirectDatabase{
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

    public function check($rule,$data){
        if(empty($rule) || empty($rule['table']) || empty($rule['actions'])){
            $apip->pushError(7);
            return false;
        }


        $table = $data['table'];
        if(empty($table)){
            $apip->pushError(8);
            return false;
        }
        if($table !== $rule['table']){
            $apip->pushError(9);
            return false;
        }
        $action = $data['action'];
        if(empty($action)){
            $apip->pushError(8);
            return false;
        }
        if(!in_array($action,$rule['actions'])){
            $apip->pushError(9);
            return false;
        }
        $where = $data['where'];
        $data = $data['data'];

        if($action === 'select'){
            if(empty($where)){
                $apip->pushError(8);
                return false;
            }
            if(empty($data)){
                $apip->pushError(8);
                return false;
            }
        }
        if($action === 'insert'){
            if(empty($data)){
                $apip->pushError(8);
                return false;
            }
        }
        if($action === 'update'){
            if(empty($where)){
                $apip->pushError(8);
                return false;
            }
            if(empty($data)){
                $apip->pushError(8);
                return false;
            }
        }
        if($action === 'delete'){
            if(empty($where)){
                $apip->pushError(8);
                return false;
            }
        }
        return true;
    }

    public function do($rule,$data){
        if(!$this->check($rule,$data)){
            return false;
        }
        $table = $data['table'];
        $action = $data['action'];
        $where = $data['where'];
        $data = $data['data'];
        $db = db::getInstance();
        $dbr = null;
        if($action === 'select'){
            $dbr = $db->select($table,$data,$where);
        }
        if($action === 'insert'){
            $dbr = $db->insert($table,$data);
        }
        if($action === 'update'){
            $dbr = $db->update($table,$data,$where);
        }
        if($action === 'delete'){
            $dbr = $db->delete($table,$where);
        }
        return $dbr;
    }
};
