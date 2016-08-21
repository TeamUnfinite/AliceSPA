<?php
use \AliceSPA\exception\APIException as apie;
use \AliceSPA\service\VerificationCodeManager as vcode;
$app->get('/api/test/vcode',function($req,$res,$args){
    $this->apip->setDisabled();
    $vcode = vcode::getInstance();
    //$vcode->store(123,'123','email');
    echo json_encode($vcode->clean(123,'email',1));
});
$app->get('/api/test/empty',function($req,$res,$args){
	
$this->apip->setDisabled();
    echo json_encode($this->auth->registerByUnionField(['user_name'=>'a3','telephone' => '123'],'a'));
});

$app->post('/api/test/account/register',function($req,$res,$args){
    $this->apip->setDisabled();
});
$app->post('/api/test/account/login',function($req,$res,$args){
    $this->apip->setDisabled();
    $parsedBody = $req->getParsedBody();

    $r = $this->auth->loginByUnionField($parsedBody,$parsedBody['password']);
    echo json_encode($r); 
});
$app->get('/api/test',function($req,$res,$args){
    $this->apip->setData($this->db->select('account','*'));
});

