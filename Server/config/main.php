<?php

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
$databaseConfig = [
    'database_type' => 'mysql',
    'database_name' => 'AliceSPA',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'port' => 3306
    ];

$userConfig = [];