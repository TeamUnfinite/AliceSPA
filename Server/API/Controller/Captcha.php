<?php
namespace AliceSPA\Controller;
use \AliceSPA\Helper\Config as configHelper;
class Captcha{
    private $c;
    public function __construct($c){
        $this->c = $c;
    }

    public function image($req,$res,$args){
        $r = $this->c->get('imageCaptcha')->generate();
        $id = $this->c->get('VCManager')->store($r['code'],'image');
        unset($r['code']);
        $r['id'] = $id;
       $this->c->get('apip')->setData($r); 
        return $res;
    }

    public function checkImage($req,$res,$args){
        //$this->c->get('apip')->setDisabled();
            $this->c->get('apip')->setData($this->c->get('VCManager')->check('76908157bd27f157e4f','skdgta','image'));  
            return $res;
    }

    public function sms($req,$res,$args){
        
    }

};
