<?php
namespace AliceSPA\Helper;
use \AliceSPA\Exception\APIException;
use \AliceSPA\Service\APIProtocol as apip;
class Utilities{
    public static function getRequestHeader($req,$headerName){
        $headerName = str_replace('-', '_', $headerName);
        $schema = $req->getUri()->getScheme();
        $headerName = $schema . '_' . $headerName;
        $headerName = strtoupper($headerName);
        return $req->getHeader($headerName);
    }
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

    public static function generateUniqueId(){
        return rand(100000,999999) . uniqid();
    }

    public static function datetimeMysql2PHP($t){
        return strtotime($t);
    }

    public static function datetimePHP2Mysql($t){
        return date('Y-m-d H:i:s',$t);
    }


    /*
        dispose APIException
        params:
            $callable: function() will be executed, which may throw an APIException.
            $map:   $map = [matchCode => ['change' => int, 'dispel' => int, 'dispelPushError' => boolean]]
                matchCode: Match APIException's code.
                change: Change the matched APIException's code with int and throw it on.
                dispel: Return int if matched APIExceptoin and nothing will be throwed.
                dispelPushError: If dispel is effective, push int to APIProtocol as an error.
            $successCallback($ret): Callback when callable execute without Exception.
                $ret: Callable returned value.
            $dispelCallback($dispeledCode): Callback when Exceptoin dispeled.
                $code: Dispeled code.
    */
    public static function disposeAPIException($callable,$map,$successCallback = null,$dispelCallback = null){
        $r = null;
        try{

            $r = $callable();
            $successCallback && $successCallback($r);
        }
        catch(APIException $e){

            $oCode = $e->getCode();
            if(!empty($map[$oCode])){

                if(!empty($map[$oCode]['change'])){
                    $e->setCode($map[$oCode]['change']);

                    throw $e;
                }
                if(!empty($map[$oCode]['dispel'])){
                    $r = $map[$oCode]['dispel'];

                    if(!($map[$oCode]['dispelPushError'] === false)){
                        apip::getInstance()->pushError($r);
                    }

                    $dispelCallback && $dispelCallback($r);
                    return false;
                }

            }

        }

        return $r;
    }


    //params:
    //  $roles
    //                  false : Not effective.
    //                  true : User must has logged in
    //                  array : User must has specified roles. e.g. ['admin']
    //  $captchaType
    //                  false : Not effective.
    //                  string : Accessable with currect captcha of thie captcha type. e.g. 'image' , 'SMS'
    //  $directDatabase
    //                  false: Not effective
    //                  array: Tables with actions.
    //                      [
    //                          "table name":["select","insert","update","delete"],
    //                          ...
    //                      ]
    public static function secureRoute($route,$roles = true,$captchaType = false,$directDatabase = false){
        if(!empty($directDatabase)){
            $route = $route->add(\AliceSPA\Middleware\directDatabase::class);
            $route->setArgument('AliceSPA_DirectDatabase',$directDatabase);
        }

        if($roles !== false){
            $route = $route->add(\AliceSPA\Middleware\Authentication::class);
            if(is_array($roles) && count($roles) > 0){
                $route->setArgument('AliceSPA_Roles',$roles);
            }
        }

        if(!empty($captchaType)){
                $route = $route->add(\AliceSPA\Middleware\Captcha::class);
                $route->setArgument('AliceSPA_CaptchaType',$captchaType);
        }

        return $route;
    }

};
