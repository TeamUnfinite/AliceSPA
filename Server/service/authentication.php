<?php
namespace AliceSPA\service;
use \AliceSPA\helper\time as timeHelper;
use \AliceSPA\helper\config as configHelper;
class authentication
{
    private $isLoggedIn = false;
    private static $_instance;

    private function __construct(){
    }

    public function __clone(){
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self;
        }
        return self::$_instance;
    }
    function authenticateByWebToken($userId,$webToken){
        $db = \AliceSPA\service\database::getInstance();
        $users = $db->select('account',
            [ 'id',
            'user_name',
            'email',
            'telephone',
            'web_token_create_time'],
            ['AND' =>[
                'id'=>$userId,
                'web_token'=>$webToken]
            ]);
        if(empty($users) || count($users) > 1){
            return false;
        }
        $user = $users[0];
        $web_token_create_time = $user['web_token_create_time'];
        if(empty($web_token_create_time)){
            return false;
        }
        if(time() - timeHelper::datetimeMysql2PHP($web_token_create_time) > configHelper::getConfig()['coreConfig']['webTokenValidTime']){
            return false;
        }
        
    }
}

$container['auth'] = function(){
    return \AliceSPA\service\authentication::getInstance();
};