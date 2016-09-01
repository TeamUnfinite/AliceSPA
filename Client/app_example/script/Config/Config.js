var AliceSPA = AliceSPA || {};
AliceSPA.Config = {
    Core:{
        'Protocol':'http',
        'ServerHost':'localhost',
        'ServerPort':'8080',
        'ClientHost':'localhost',
        'ClientPort':'8081',
        'ApiPath':'/api',
        'AliceSPAApiPath':'/AliceSPA/api'
    },
    App:{
        path: '/app_example',
        moduleName: 'app_example'
    }
}

var APP_PATH = AliceSPA.Config.App.path;
var BOWER_PATH = '/bower_components';
var AliceSPA_PATH = '/AliceSPA';
require.config({
    baseUrl:'/',
    paths: {
        'jquery': BOWER_PATH + '/jquery/dist/jquery.min',
        'jshashes': BOWER_PATH + '/jshashes/hashes.min',
        'domReady': BOWER_PATH + '/domReady/domReady',
        'angular': BOWER_PATH + '/angular/angular',
        'angular-ui-router': BOWER_PATH + '/angular-ui-router/release/angular-ui-router',
        'underscore': BOWER_PATH + '/underscore/underscore-min',
        'AliceSPA': AliceSPA_PATH + '/load',
        'app': APP_PATH + '/script/load'
    },
    shim: {
        'angular-ui-router':{
            'deps': ['angular']
        },
        'AliceSPA':{
            'deps': ['angular-ui-router','jshashes','angular','underscore']
        },
        'app': {
            'deps': ['AliceSPA']
        }
    },
    deps:[
        'app'
    ]
});
