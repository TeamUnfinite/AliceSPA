define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAData',[function(){
        var data = {};
        if(localStorage && !_.isEmpty(localStorage['AliceSPA_Data'])){
            var data = JSON.parse(localStorage['AliceSPA_Data']);
        }
        return {
                set:function(key,value){
                    data[key] = value;
                    if(localStorage){
                        localStorage['AliceSPA_Data'] = JSON.stringify(data);
                    }
                },
                get:function(key){return data[key];},
                getAll: function(){return data;}
            }
        }
    ]);
});