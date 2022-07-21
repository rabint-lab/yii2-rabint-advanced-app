<?php

/**
 * rabint index app file
 * @version 3.0
 */

/**
 * ini_sets and php configs
 * -------------------------------------------------------------------
 */

//ini_set('memory_limit', '1024M');

/**
 * rabint base and important configs
 * -------------------------------------------------------------------
 */

defined('RABINT_APP_DIR') or define('RABINT_APP_DIR', dirname(__DIR__));
defined('RABINT_BASE_DIR') or define('RABINT_BASE_DIR', dirname(dirname(__DIR__)));

if (!file_exists(RABINT_BASE_DIR . '/env.php')) {
    die('env file not exists in root project folder');
}

$env = require RABINT_BASE_DIR . '/env.php';
defined('RABINT_ENV') or define('RABINT_ENV', $env);//local,test,prod & ...

require(RABINT_BASE_DIR . '/common/_global_functions.php');

/**
 * PHP and Yii debug
 * -------------------------------------------------------------------
 */

defined('YII_DEBUG') or define('YII_DEBUG', config('YII_DEBUG', false));
defined('YII_ENV') or define('YII_ENV', config('YII_ENV', 'dev'));//test,dev,prod

if (YII_DEBUG) {
    defined('USER_CAN_DEBUG') or define('USER_CAN_DEBUG', userCanDebug(config('debugersIp', '')));
} else {
    defined('USER_CAN_DEBUG') or define('USER_CAN_DEBUG', false);
}


if (USER_CAN_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);
} else {
    ini_set('display_errors', false);
    error_reporting(0);
}

/**
 * yii configs and bootstraps
 * -------------------------------------------------------------------
 */

require RABINT_BASE_DIR . '/vendor/autoload.php';
require RABINT_BASE_DIR . '/vendor/yiisoft/yii2/Yii.php';
require RABINT_BASE_DIR . '/common/config/bootstrap.php';
require RABINT_APP_DIR . '/config/bootstrap.php';

$config = require RABINT_APP_DIR . '/config/web.php';

(new yii\web\Application($config))->run();

