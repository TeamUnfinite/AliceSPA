define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAData',[function(){
        var data = {};
        return {
                set:function(key,value){data[key] = value},
                get:function(key){return data[key];}
            }
        }
    ]);
});