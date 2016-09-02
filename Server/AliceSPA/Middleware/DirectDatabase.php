<?php
namespace AliceSPA\Middleware;
use \AliceSPA\Service\APIProtocol as apip;
use \AliceSPA\Service\DirectDatabase as ddb;
/*
Rule:
{
    "table name":["select","insert","update","delete"],
    ...
}
Request:
{
    "table": "table name",
    "action": "select or insert or delete or update",
    "where": {},//where in medoo
    "data": {}//columns(select) or data(insert or update) in medoo
}
*/
class DirectDatabase{
    function __invoke($req,$res,$next){
        $apip = apip::getInstance();
        $ddbRule = $req->getAttribute('route')->getArgument('AliceSPA_DirectDatabase');

        if(!$req->isPost()){
            $apip->pushError(7);
            return $res;
        }
        $body = $req->getParsedBody();
        $ddbr = ddb::getInstance()->do($ddbRule,$body);
        if($ddbr !== false){
            $apip->setData($ddbr);
        }

        return $res;
    }
};
