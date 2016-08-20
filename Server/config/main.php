<?php
//AliceSPA config
$coreConfig = [
    'webTokenValidTime' => 24*60*60
];

/*for slim framework
 *http://www.slimframework.com/docs/objects/application.html#slim-default-settings
*/
$slimConfig = [
    'displayErrorDetails' => true
    ];

/*for medoo
 *see  Configuration section
 *http://medoo.in/api/new
*/
$medooConfig = [
    'database_type' => 'mysql',
    'database_name' => 'AliceSPA',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'port' => 3306
    ];

$userConfig = [];

$AliceSPAConfig = [];
$AliceSPAConfig['coreConfig'] = $coreConfig;
$AliceSPAConfig['slimConfig'] = $slimConfig;
$AliceSPAConfig['medooConfig'] = $medooConfig;
$AliceSPAConfig['uesrConfig'] = $userConfig;