<?php
use \AliceSPA\Helper\Utilities as utils;
utils::secureRoute($app->post('/test',function($req,$res,$args){
    return $res;
}),['admini'],'image');
