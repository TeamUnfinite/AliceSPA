define([
    AliceSPA.Config.App.path + '/script/app.module.js',
    'domReady!'
    ],
    function (appModule,document) {
        angular.bootstrap(document,[AliceSPA.Config.App.moduleName]);
    });
