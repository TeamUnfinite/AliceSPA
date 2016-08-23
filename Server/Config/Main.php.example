<?php
//AliceSPA config
$coreConfig = [
    'webTokenValidTime' => 24*60*60*1000000000,   //infinite for test
    'authenticateFieldNames' => ['user_name','email','telephone'], //Any of these database field names can identify a unique user and have a unique value. Its will be used by login and register functions.
    'imageCaptchaValidTime' => 24*60*60, //OPTION, DEFAULT one day
    'timezone' => 'Asia/Shanghai', //OPTION, php date.timezone
    'autoincrementBeginValue' => 1, //OPTION, DEFAULT 1, for database autoincrement id
    'displayPHPErrors'=>true, //OPTION, DEFAULT false, php display_errors
    'showAPIExceptoin' => true, //OPTION DEFAULT false, if true api response will have an APIException field for details when APIExceptoin occured.
];

/*for slim framework
 *http://www.slimframework.com/docs/objects/application.html#slim-default-settings
*/
$slimConfig = [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false // false for debugging, otherwise slim framework will throw an exception while var_dump() to outbuffer
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

/*for securimage
 *https://github.com/dapphp/securimage/blob/master/config.inc.php.SAMPLE
*/
$securimageConfig = [

    //we provided a function to manage verification codes.
    'no_session' => true, //ALWAYS be true in fact
    'use_database' => false, //ALWAYS be false in fact
    'no_exit' => true //ALWAYS be true in fact
];


$userConfig = [];

$AliceSPAConfig = [];
$AliceSPAConfig['coreConfig'] = $coreConfig;
$AliceSPAConfig['slimConfig'] = $slimConfig;
$AliceSPAConfig['medooConfig'] = $medooConfig;
$AliceSPAConfig['securimageConfig'] = $securimageConfig;
$AliceSPAConfig['uesrConfig'] = $userConfig;