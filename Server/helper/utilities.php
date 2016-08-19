<?php
namespace AliceSPA\helper;
class utilities{
    public static function arrayMap($arr1,$arr2){

        if(is_string($arr2)){
            $arr2 = [$arr2];
        }

        if(empty($arr1) || empty($arr2)){
            return false;
        }

        $count2 = count($arr2);
        if($count2 > 1 && $count2 !== count($arr1)){
            return false;
        }

        $res = [];
        $index2 = -1;
        foreach($arr1 as $item1){
            if($count2 === 1){
                $index2 = 0;
            }
            else{
                $index2 ++;
            }
            $res[$item1] = $arr2[$index2];
        }

        return $res;
    }

    public static function generateToken($arg = ''){
        return hash('sha256',$arg . time() . rand(),false);
    }
};