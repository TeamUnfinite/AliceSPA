<?php
namespace AliceSPA\Service;
use AliceSPA\Service\Database as db;
use AliceSPA\Helper\Config as configHelper;
use AliceSPA\Helper\Utilities as utils;
class Session{
    private $session = null;

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

    public function loadSession($sessionId){
        $db = db::getInstance();
        $session = null;
        if(!empty($sessionId)){
            $sessionValidTime = configHelper::getCoreConfig()['sessionValidTime'];
            $sessions = $db->select('aspa_session',
                '*',
                [
                    'AND' => [
                        'id' => $sessionId,
                        'create_time[>]' => utils::datetimePHP2Mysql(time() - $sessionValidTime)
                    ]
                ]);
            if(!empty($sessions)){
                $session = $sessions[0]['session'];
                $session = json_decode($session,true);

            }
        }

        if($session === null){
            $sessionId = utils::generateUniqueId();
            $session  = [];
            $db->insert('aspa_session',['id' => $sessionId, 'session' => json_encode($session)]);
        }
        $this->setSession($session);
        return $sessionId;
    }

    public function storeSession($sessionId){
        $db = db::getInstance();
        $session = $this->getSession();
        if($session !== false){
            $db->update('aspa_session',['session'=>json_encode($session)],['id' => $sessionId]);
        }
    }

    private function setSession($session){
        $this->session = $session;
    }

    public function getSession(){
        if($this->session === null){
            return false;
        }
        return $this->session;
    }

    public function set($key,$value){//BUG false may be a value in session, FIX IT
        if($this->session === null){
            return false;
        }
        $this->session[$key] = $value;
    }

    public function get($key){//BUG false may be a value in session, FIX IT
        if($this->session === null){
            return null;
        }
        return $this->session[$key];
    }

    public function clearSessions(){
        $db = db::getInstance();
        $db->delete('aspa_session',['create_time[<]'=>utils::datetimePHP2Mysql(time()-configHelper::getCoreConfig()['sessionValidTime'])]);
        return true;
    }
};

$container['session'] = function(){
    return \AliceSPA\Service\Session::getInstance();
};
