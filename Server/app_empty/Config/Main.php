<?php
//AliceSPA config
$coreConfig = [
    'sessionValidTime' => 24*60*60*10000,   //infinite for test
    'webTokenValidTime' => 24*60*60*1000000000,   //infinite for test
    'authenticateFieldNames' => ['user_name','email','telephone'], //Any of these database field names can identify a unique user and have a unique value. Its will be used by login and register functions.
    'imageCaptchaValidTime' => 24*60*60, //OPTION, DEFAULT one day
    'SMSCaptchaValidTime' => 24*60*60, //SECOND, OPTION, DEFAULT one day
    'SMSCaptchaSpan' => 60, //SECOND, OPTION, DEFAULT one minute
    'timezone' => 'Asia/Shanghai', //OPTION, php date.timezone
    'autoincrementBeginValue' => 1, //OPTION, DEFAULT 1, for database autoincrement id
    'displayPHPErrors'=>true, //OPTION, DEFAULT false, php display_errors
    'showAPIExceptoin' => true, //OPTION DEFAULT false, if true api response will have an APIException field for details when APIExceptoin occured.
    'CORSOrigin' => 'http://localhost:8081', //OPTION, DEFAULT false, if set CORS will work, this value will be filled in to HTTP header Access-Control-Allow-Origin

    //Tian Xia Chang Tong SMS accout info, http://www.opwo.cn
    'SMS_TXCT_UserId' => '5663', //OPTION
    'SMS_TXCT_Account' => 'a10289',//OPTION
    'SMS_TXCT_Password' => 'sms132456'//OPTION
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
    'port' => 3306,
    'prefix' => '' //Set this field when multiple apps;
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
