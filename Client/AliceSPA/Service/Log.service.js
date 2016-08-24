define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPALog',[function(){
        return {
            log:function(){
                if(console){
                    console.log.apply(console, arguments);
                }
            }
        }
    }]);
});