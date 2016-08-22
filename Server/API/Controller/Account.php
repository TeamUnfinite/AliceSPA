<?php
namespace AliceSPA\Controller;
use \AliceSPA\Helper\Utilities as utils;
class Account{
    private $c;
    public function __construct($c){
        $this->c = $c;
    }

    public function login($req,$res,$args){
        $parsedBody = $req->getParsedBody();
        $r = $this->c->get('auth')->loginByUnionField($parsedBody,$parsedBody['password']);
        $this->c->get('apip')->setData($r);
        return $res;
    }

    public function register($req,$res,$args){
        $parsedBody = $req->getParsedBody();
        
        $r = utils::disposeAPIException(function()use($parsedBody){
            return $this->c->get('auth')->registerByUnionField($parsedBody,$parsedBody['password']);
        },[2=>['dispel' => 4]]);
        if(!($r === true)){
            return $res;
        }

        $r = $this->c->get('auth')->loginByUnionField($parsedBody,$parsedBody['password']);
        $this->c->get('apip')->setData($r);
        return $res;
    }

};
