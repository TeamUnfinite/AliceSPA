<?php
namespace AliceSPA\Controller;
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
        $r = $this->c->get('auth')->registerByUnionField($parsedBody,$parsedBody['password']);
        $this->c->get('apip')->setData($r);
        return $res;
    }

};
