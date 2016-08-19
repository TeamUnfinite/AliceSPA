<?php
require $SERVER_PATH . '/middleware/authentication.php';
require $SERVER_PATH . '/middleware/APIProtocol.php';//Attention for the loading index of APIProtocol , so that it could catch exception instances. e.g. APIException
