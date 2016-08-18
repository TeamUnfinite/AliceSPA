<?php

//account login
$app->get('/api/account/login',function($req,$res,$args){
	echo json_encode($this->userConfig);
	echo json_encode($this->db->select('account','*',['user_name'=>'2']));
});