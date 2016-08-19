<?php
namespace AliceSPA\exception;
use \AliceSPA\service\APIProtocol as apip;
class APIException extends \Exception{
    public function __construct($code,$message = '',Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
};