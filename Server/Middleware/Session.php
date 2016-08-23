<?php
namespace AliceSPA\Middleware;
use AliceSPA\Helper\Utilities as utils;
use AliceSPA\Service\Database as db;
use AliceSPA\Helper\Config as configHelper;
use AliceSPA\Service\Session as session;
use AliceSPA\Service\APIProtocol as apip;
class Session{
    function __invoke($req,$res,$next){
        $db = db::getInstance();

        $sessionId = utils::getRequestHeader($req,'AliceSPA-SessionID');
        if(!empty($sessionId)){
            $sessionId = $sessionId[0];
        }
        $session = null;
        if(!empty($sessionId)){
            $sessionValidTime = configHelper::getCoreConfig()['sessionValidTime'];
            $sessions = $db->select('session',
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
            $db->insert('session',['id' => $sessionId, 'session' => json_encode($session)]);
        }
        session::getInstance()->setSession($session);
        apip::getInstance()->setSessionId($sessionId);
        $res = $next($req, $res);
        $session = session::getInstance()->getSession();
        if($session !== false){
            $db->update('session',['session'=>json_encode($session)],['id' => $sessionId]);
        }
        
        return $res;
    }
}

$app->add(\AliceSPA\Middleware\Session::class);