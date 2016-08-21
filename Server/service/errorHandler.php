<?php
namespace AliceSPA\exception;
use \AliceSPA\service\APIProtocol as apip;
class APIException extends \Exception{
    public function __construct($code,$message = '',Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
};
$container['errorHandler'] = function($c){
    return function($req,$res,$exc){
        if($exc instanceof \AliceSPA\Exception\APIException && apip::getInstance()->isEnabled()){
            apip::getInstance()->pushError($exc->getCode());
            $res = apip::getInstance()->flush($res);
        }
        return $res;
    };
};