module.service('ConfigService',['AliceSPAConfig',function(AliceSPAConfig){
    return {
        'getUrlPrefix':function(){
            return AliceSPAConfig.Protocol + '://' + AliceSPAConfig.ServerHost + ':' + AliceSPAConfig.ServerPort;
        },
        'getApiUrlPrefix':function(){
            return this.getUrlPrefix() + AliceSPAConfig.ApiPath;
        },
        'getAliceSPAApiUrlPrefix':function(){
            return this.getUrlPrefix() + AliceSPAConfig.AliceSPAApiPath;
        }
    }
}]);
