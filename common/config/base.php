<?php

$config = [
    'id' => config('app_id', 'rabintApp'),
    'name' => config('app_name', 'Rabint App'),
    'vendorPath' => RABINT_BASE_DIR . '/vendor',
    'extensions' => require(RABINT_BASE_DIR . '/vendor/yiisoft/extensions.php'),
    'sourceLanguage' => config('sourceLanguage'),
    'language' => config('language'),
    'TimeZone' => config('timeZone', 'Asia/Tehran'),
    'bootstrap' => [
        'log',
        //'common\SecurityBootstrap', included in rabint base module
        'common\GlobalBootstrap',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'notify' => [
            'class' => 'rabint\notify\components\notify',
        ],
        'authManager' => [
            'class' => 'common\models\base\DbAuthManager',
        ],
        'assetManager' => [
            'forceCopy' => config('forceCopyAssets', false),
            'appendTimestamp' => config('apendTimestampAssets', true),
            'linkAssets' => config('symlink', false),
            //'dirMode'=>0775,
            //            'assetMap' => [
            //                'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
            //            ],
        ],
        'session' => [
            'class' => 'common\models\base\Session',
            'cookieParams' => ['lifetime' => 3600 * 8],
            'timeout' => 3600 * 8,
//            'cookieParams' => [
//                'httpOnly' => true,
//                'secure' => false,
//            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/modules/notify/mail/',
            'useFileTransport' => false,//set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.gmail.com',
//                'username' => 'username@gmail.com',
//                'password' => 'password',
//                'port' => '587',
//                'encryption' => 'tls',
//            ],
        ],
        'cookies' => [
            'class' => 'yii\web\Cookie',
            'httpOnly' => true,
            'secure' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@app/runtime/cache'
        ],

        'commandBus' => [
            'class' => 'trntv\bus\CommandBus',
            'middlewares' => [
                [
                    'class' => '\trntv\bus\middlewares\BackgroundCommandMiddleware',
                    'backgroundHandlerPath' => '@console/yii',
                    'backgroundHandlerRoute' => 'command-bus/handle',
                ]
            ]
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/modules/notify/mail/',
            'useFileTransport' => false,//set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'email.sender.00001@gmail.com',
                'password' => 'Asdf!234Asdf!234', // new generated API key by mandrill
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => config('DB.dsn'),
            'username' => config('DB.user'),
            'password' => config('DB.pass'),
            'tablePrefix' => config('DB.tablePrefix'),
            'charset' => 'utf8mb4',
            'enableSchemaCache' => YII_ENV_PROD,
            'schemaCacheDuration' => config('DB.schemaCacheTime', 1200),
            'schemaCache' => 'cache',
        ],
        /*'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => config('mongodb.dsn'),
            'options' => config('mongodb.options')
        ],*/
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => []
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'forceTranslation' => true,
                ],
                'rabint' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@rabint/messages',
                    'forceTranslation' => true,
                    'fileMap' => [
                        'rabint' => 'rabint.php',
                    ],
                ],

//                '*' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@app/messages',
//                    'fileMap' => [
//                        'common' => 'common.php',
//                        'backend' => 'backend.php',
//                        'app' => 'app.php',
//                    ],
//                    'on missingTranslation' => ['\modules\i18n\Module', 'missingTranslation']
//                ],
            ],
        ],

        'Attachment' => [
            'class' => 'rabint\attachment\components\Attachment',
            'baseUrl' => config('filemanager.base_url'),
            'uploadDirProtected' => config('filemanager.protectedBasePath', '@common/protected'),
            'uploadDirUnprotected' => config('filemanager.unprotectedBasePath', '@app/web'),
            'publicPath' => config('filemanager.uploadSubDirPath', 'uploads'),
            'ownerTypes' => [
                'user_profile.avatar_url' => 1,
            ]
        ],

    ],
    'params' => array_merge(config('params', []), [
        'adminEmail' => config('adminEmail'),
        'robotEmail' => config('adminEmail'),
    ]),
];


/**
 * Apps Url Managers
 * --------------------------------------------------------------------------------
 */
$apps = include __DIR__ . '/apps.php';
foreach ($apps as $appKey => $appDetail) {
    $ucfName = ucfirst($appKey);
    $config['components']['urlManager' . $ucfName] = [
        'class' => 'rabint\components\UrlManager',
        'hostInfo' => $appDetail['hostInfo'],
        'baseUrl' => $appDetail['baseUrl'],
        'enablePrettyUrl' => true,
        //            'absoluteUrl' => true,
        'showScriptName' => (YII_ENV == 'test') ? true : false,
        'rules' => require RABINT_BASE_DIR . '/' . $appKey . '/config/routes.php',
    ];
}

/**
 * mail config
 * --------------------------------------------------------------------------------
 */
if (config('SERVICE.email.type') == "smtp") {
    $config['components']['mailer']['transport'] = [
            'class' => 'Swift_SmtpTransport',
            //    'plugins' => [
            //        [
            //            'class' => 'Swift_Plugins_LoggerPlugin',
            //            'constructArgs' => [new Swift_Plugins_Loggers_EchoLogger],
            //        ],
            //    ],
        ] + config('SERVICE.email.config');

}
/**
 * debug config
 * --------------------------------------------------------------------------------
 */

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $allowedIPs = array_map('trim', explode(',', config('debugersIp')));
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => array_merge(['127.0.0.1', '::1'], $allowedIPs),
    ];
}

/**
 * GII config
 * --------------------------------------------------------------------------------
 */
if (YII_ENV_DEV) {
    $allowedIPs = array_map('trim', explode(',', config('debugersIp')));
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => array_merge(['127.0.0.1', '::1'], $allowedIPs),
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    ' Bs4 Ajax Backend' => Yii::getAlias('@rabint/gii/bs4BackendCrud'),
                    ' Bs3 Backend' => Yii::getAlias('@rabint/gii/backendCrud'),
                    ' Bs3 Ajax Backend' => Yii::getAlias('@rabint/gii/ajaxcrud'),
                    'Frontend Crud' => Yii::getAlias('@rabint/gii/frontendCrud'),
                ],
                'template' => 'rabint',
                'messageCategory' => 'rabint'
            ],
            'model' => [
                'class' => 'yii\gii\generators\model\Generator',
                'templates' => [
                    'rabintModel' => Yii::getAlias('@rabint/gii/model'),
                ],
                'template' => 'rabint',
                'messageCategory' => 'rabint'
            ],
            'module' => [
                'class' => 'yii\gii\generators\module\Generator',
                'templates' => [
                    'rabintModule' => Yii::getAlias('@rabint/gii/module'),
                ],
                'template' => 'rabint',
                'messageCategory' => 'rabint'
            ],
        ]
    ];
}

if (YII_ENV_DEV) {
    $config['components']['cache'] = [
        'class' => 'yii\caching\DummyCache'
    ];
}

/* =================================================================== */

$loggTargets = config('logTragets', 'file', true);
if (in_array('file', $loggTargets)) {
    $logTraget['file'] = [
        'class' => 'yii\log\FileTarget',
        'levels' => ['error', 'warning'],
    ];
}
if (in_array('db', $loggTargets)) {
    $logTraget['db'] = [
        'class' => 'yii\log\DbTarget',
        'levels' => ['error', 'warning'],
        'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
        'prefix' => function () {
            $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
            return sprintf('[%s][%s]', Yii::$app->id, $url);
        },
        'logVars' => [],
        'logTable' => '{{%system_log}}'
    ];
}
if (in_array('email', $loggTargets)) {
    $logTraget['email'] = [
        'class' => 'yii\log\EmailTarget',
        'except' => ['yii\web\HttpException:*'],
        'levels' => ['error', 'warning'],
        'message' => ['from' => config('noreplyEmail'), 'to' => config('adminEmail')]
    ];
}

if (in_array('slack', $loggTargets)) {
    $logTraget['slack'] = [
        'class' => 'rabint\components\log\SlackTarget',
        'levels' => ['error', 'warning', 'notice'],
        'token' => "xoxp-423416454964-423791037173-423520553171-c12b701c2559e6b914dd5d3534ddc606",
        'channelId400' => "CDJNAEM52",
        'channelId' => "CDJDSNESU",
    ];
}

$config['components']['log']['targets'] = $logTraget;
/* =================================================================== */

return $config;
