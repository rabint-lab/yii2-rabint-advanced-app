<?php

$baseUrl = str_replace('/app/web', '', (new \yii\web\Request)->getBaseUrl());

$webConf = [
    'id' => config('rabintApp', 'rabintApp'),
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'defaultRoute' => 'site/index',
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
            'csrfParam' => '_csrf-rabintApp',
            'cookieValidationKey' => config('cookieValidationKey'),
//            'csrfCookie' => [
//                'httpOnly' => true,
//                'secure' => false,
//            ]
//            'enableCookieValidation' => false,
//            'enableCsrfValidation' => false,
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
            'loginUrl' => ['/user/sign-in/login'],
            'enableAutoLogin' => true,
//            'as afterLogin' => 'common\behaviors\LoginTimestampBehavior',
//            'identityCookie' => [
//                'name' => '_identity',
//                'httpOnly' => config('SECURITY.cookie.httpOnly', true),
//                'secure' => config('SECURITY.cookie.secure', false),
//            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'rabint\components\UrlManager',
            'enablePrettyUrl' => true,
////          'baseUrl' => $baseUrl,
//            'absoluteUrl' => true,
            'showScriptName' => (YII_ENV == 'test') ? true : false,
            'rules' => require __DIR__ . '/routes.php',
        ],
    ]
];

$baseConf = require RABINT_BASE_DIR . '/common/config/base.php';

$config = yii\helpers\ArrayHelper::merge($baseConf, $webConf);

$config['modules'] = yii\helpers\ArrayHelper::merge($config['modules'], require(__DIR__ . '/modules.php'));

$config['components']['view']['theme'] = [
//    'basePath' => '@webroot',
//    'baseUrl' => '@web',
    'pathMap' => [
        '@app/views' => config('themePath') . '/views',
    ]
];


return $config;
