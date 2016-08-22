<?php
namespace AliceSPA\Exception;
use \AliceSPA\Service\APIProtocol as apip;
class APIException extends \Exception{
    public function __construct($code,$ignore = false, $message = '',Exception $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->ignore = $ignore;
    }
    public function setCode($code){
        $this->code = $code;
    }
};