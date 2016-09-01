<?php
namespace AliceSPA\Helper;
class Database{
    public static function getUniqueRow($rows){
        if(empty($rows) || count($rows) > 1){
            return false;
        }
            return $rows[0];
    }

};
