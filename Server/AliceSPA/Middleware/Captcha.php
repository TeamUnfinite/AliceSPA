<?php
namespace AliceSPA\Middleware;
use \AliceSPA\Service\APIProtocol as apip;
use \AliceSPA\Service\VerificationCodeManager as VCManager;
use \AliceSPA\Helper\Config as configHelper;
class Captcha
{
    function __invoke($req,$res,$next){

        $apip = apip::getInstance();
        $captchaType = $req->getAttribute('route')->getArgument('AliceSPA_CaptchaType');
        $body = $req->getParsedBody();
        if(!empty($captchaType) && !empty($body) && !empty($body['AliceSPA_Captcha'])){
            $captcha = $body['AliceSPA_Captcha'];
            $validTime = null;
            if($captchaType === 'image'){
                $validTime = configHelper::getCoreConfig()['imageCaptchaValidTime'];
            }
            if($captchaType === 'SMS'){
                $validTime = configHelper::getCoreConfig()['SMSCaptchaValidTime'];
            }
            $r = VCManager::getInstance()->check($captcha['id'],$captcha['code'],$captchaType,$validTime);
            if($r === false){
                $apip->pushError(6);
                return $res;
            }
        }
        else{
                $apip->pushError(6);
                return $res;
        }
        return $next($req,$res);
    }
}

