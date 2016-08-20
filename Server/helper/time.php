<?php
namespace AliceSPA\helper;
class time{
    public static function datetimeMysql2PHP($t){
        return strtotime($t);
    }

    public static function datetimePHP2Mysql($t){
        return date('Y-m-d H:i:s',$t);        
    }
};
