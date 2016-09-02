module.service('ASPADirectDatabaseService',['ASPAAPIProtocolService',function(ASPAAPIProtocolService){
    var handle = function(url,table,action,data,where,internal){
        var fun = internal?ASPAAPIProtocolService.ASPAPost:ASPAAPIProtocolService.post;
        var body = {
            'table':table,
            'action':action,
            'where':where,
            'data':data
        };
        return fun(url,body);
    };
    return {
        select:function(url,table,columns,where){handle(url,table,'select',columns,where,false)},
        insert:function(url,table,data){handle(url,table,'insert',data,null,false)},
        update:function(url,table,data,where){handle(url,table,'update',data,where,false)},
        remove:function(url,table,where){handle(url,table,'delete',null,where,false)},
        ASPASelect:function(url,table,columns,where){handle(url,table,'select',columns,where,true)},
        ASPAInsert:function(url,table,data){handle(url,table,'insert',data,null,true)},
        ASPAUpdate:function(url,table,data,where){handle(url,table,'update',data,where,true)},
        ASPARemove:function(url,table,where){handle(url,table,'delete',null,where,true)}
    };
}]);
