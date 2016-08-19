<?php
//AliceSPA config
$coreConfig = [
    'webTokenValidTime' => 24*60*60*1000000000,   //infinite for test
    'authenticateFieldNames' => ['user_name','email','telephone'], //Any of these database field names can identify a unique user and have a unique value. Its will be used by login and register functions.
    'timezone' => 'Asia/Shanghai', //OPTION, php date.timezone
    'autoincrementBeginValue' => 1, //OPTION, DEFAULT 1, for database autoincrement id
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