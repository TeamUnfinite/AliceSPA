define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPASessionService',['ASPADataService','ASPANotifierService','ASPAAPIProtocolService',function(ASPADataService,ASPANotifierService,ASPAAPIProtocolService){
        var getSessionId = function(){
            return ASPADataService.get('sessionId');
        };
        var setSessionId = function(id){
            ASPADataService.set('sessionId',id);
        };
        var checkSession = function(){
            var config = {};
            config.headers = {};
            var sessionId = getSessionId();
            if(sessionId){
                config.headers['AliceSPA-SessionID'] = sessionId;
            }
            ASPAAPIProtocolService.VanillaGet('/environment/checkSession',true,config).then(function(res){
                if(res.sessionID !== sessionId){
                    setSessionId(res.sessionID);
                }
                ASPANotifierService.notifySessionId(true);
            },function(error){
                ASPANotifierService.notifySessionId(false);
            });
        }
        return {
            checkSession:checkSession,
            getSessionId:getSessionId
        };
    }]);
});
