<?php

$container['db'] = function()use($databaseConfig){
    return new medoo($databaseConfig);
};