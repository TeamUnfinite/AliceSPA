define([
    '/app/app.module.js',
    'domReady!'
    ],
    function (document) {
        angular.bootstrap(document,['app']);
    });