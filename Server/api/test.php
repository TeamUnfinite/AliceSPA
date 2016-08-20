<?php
$app->get('/api/test',function($req,$res,$args){
    $this->apip->setData($this->db->select('account','*'));
});

$app->get('/api/test/empty',function($req,$res,$args){
    
});