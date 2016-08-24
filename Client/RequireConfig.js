var BOWER_PATH = '/bower_components';
var AliceSPA_PATH = '/AliceSPA'
require.config({
    baseUrl:'/',
    paths: {
        'domReady': BOWER_PATH + '/domReady/domReady',
        'angular': BOWER_PATH + '/angular/angular.min',
        'underscore': BOWER_PATH + '/underscore/underscore-min',
        'AliceSPA': AliceSPA_PATH + '/load',
        'app': '/app/load'
    },
    shim: {
        'AliceSPA':{
            'deps': ['angular','underscore']
        },
        'app': {
            'deps': ['AliceSPA']
        }
    },
    deps:[
        'app'
    ]
});