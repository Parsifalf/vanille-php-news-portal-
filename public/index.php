<?php

use myfrm\Db;

require_once __DIR__ . '/../vendor/autoload.php';

require_once dirname(__DIR__) . '/config/config.php';

require_once CORE . '/func.php';

require_once CONFIG . '/routes.php';
require_once CORE . '/router.php';



$db_config = require CONFIG . '/db.php';