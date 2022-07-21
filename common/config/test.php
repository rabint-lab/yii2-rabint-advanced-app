<?php

$config = [
    'id' => config('rabintApp', 'rabintApp') . '-tests',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\commands',
    'language' => 'en-US',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],
    ]
];

$baseConf = require __DIR__ . '/web.php';

$config = yii\helpers\ArrayHelper::merge($baseConf, $config);

return $config;

