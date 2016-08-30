define([
    '/app/app.module.js',
    'domReady!'
    ],
    function (appModule,document) {
        angular.bootstrap(document,['app']);
    });
