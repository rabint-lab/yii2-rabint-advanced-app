<?php

$myCliConfig = [
    'id' => config('rabintApp', 'rabintApp') . '-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
    ],
];

$mybaseConf = require RABINT_BASE_DIR . '/console/config/web.php';


$config = yii\helpers\ArrayHelper::merge($mybaseConf, $myCliConfig);

$config['modules'] = yii\helpers\ArrayHelper::merge($config['modules'], require(__DIR__ . '/modules.php'));

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $myCliConfig['bootstrap'][] = 'gii';
    $myCliConfig['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}
return $config;
