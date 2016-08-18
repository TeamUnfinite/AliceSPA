<?php

//account login
$app->get('/api/account/login',function($req,$res,$args){

    $this->apip->setData($this->db->select('account','*'));
    $this->apip->setEnabled();
});