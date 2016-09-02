<?php
use \AliceSPA\Helper\Utilities as utils;
utils::secureRoute($app->post('/api/test',function($req,$res,$args){
    return $res;
}),false,false,['test'=>['select','insert','update','delete']]);

utils::secureRoute($app->post('/api/test123',function($req,$res,$args){
    return $res;
}),false,'image');
