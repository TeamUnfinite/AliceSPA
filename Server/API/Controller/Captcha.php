<?php
namespace AliceSPA\Controller;
use \AliceSPA\Service\APIProtocol as apip;
use \AliceSPA\Service\VerificationCodeManager as VCManager;
use \AliceSPA\Service\ImageCaptcha as ImageCaptcha;
use \AliceSPA\Helper\Config as configHelper;
class Captcha{
    private $c;
    public function __construct($c){
        $this->c = $c;
    }

    public function image($req,$res,$args){
        $r = ImageCaptcha::generate();
        $id = VCManager::getInstance()->store($r['code'],'image');
        unset($r['code']);
        $r['id'] = $id;
        apip::getInstance()->setData($r); 
        return $res;
    }

    public function clean($req,$res,$args){
        VCManager::getInstance()->clean(configHelper::getCoreConfig()['imageCaptchaValidTime']);
    }
};
