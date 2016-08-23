<?php
namespace AliceSPA\Service;
use \AliceSPA\Helper\Config as configHelper;
use \AliceSPA\Service\VerificationCodeManager as VCManager;
class ImageCaptcha{

    public static function generate(){
        $config = configHelper::getConfig()['securimageConfig'];
        $si = (new \Securimage($config));
        
        //securimage write the image data to output buffer, we should get it and clean output buffer and encode image data to a base64 string.
        $si->show();
        $imageData = ob_get_contents();
        ob_get_clean();
        $imageStr = base64_encode($imageData);
        $imageCode = $si->getCode(false,true);
    
       return ['data' => $imageStr,'code' => $imageCode];
    } 
};