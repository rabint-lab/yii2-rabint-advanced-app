<?php

$apps = include(RABINT_BASE_DIR . '/common/config/apps.php');

$migrations = ['@rabint/migrations/db', '@app/migrations/db'];
foreach ($apps as $appKey => $appDetail) {
    $migrations[] = RABINT_BASE_DIR . '/' . $appKey . '/migrations/db';
}
$migrations = array_merge($migrations, modulesPath('migrations/db'));

$mongoMigrations = ['@rabint/migrations/mongo', '@app/migrations/mongo'];
foreach ($apps as $appKey => $appDetail) {
    $mongoMigrations[] = RABINT_BASE_DIR . '/' . $appKey . '/migrations/mongo';
}
$mongoMigrations = array_merge($mongoMigrations, modulesPath('migrations/mongo'));

$rbacMigrations = ['@rabint/migrations/rbac', '@app/migrations/rbac'];
foreach ($apps as $appKey => $appDetail) {
    $rbacMigrations[] = RABINT_BASE_DIR . '/' . $appKey . '/migrations/rbac';
}
$rbacMigrations = array_merge($rbacMigrations, modulesPath('migrations/rbac'));

$cliConfig = [
    'id' => config('rabintApp', 'rabintApp') . '-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
//        'fixture' => [
//            'class' => 'yii\console\controllers\FixtureController',
//            'namespace' => 'common\fixtures',
//        ],
//        'command-bus' => [
//            'class' => 'trntv\bus\console\BackgroundBusController',
//        ],
        'message' => [
            'class' => 'console\controllers\ExtendedMessageController'
        ],
        'migrate' => [
//          'class' => 'yii\console\controllers\MigrateController',
            'class' => 'rabint\commands\MultiLocationMigrationsController',
            'migrationTable' => '{{%system_db_migration}}',
            'migrationLookup' => $migrations,
        ],
//        'mongo-migrate' => [
////          'class' => 'yii\console\controllers\MigrateController',
//            'class' => 'rabint\commands\MultiLocationMongoMigrationsController',
//            'migrationLookup' => $mongoMigrations,
//        ],
        'migrate-generate' => [
            'class' => 'bizley\migration\controllers\MigrationController',
            'migrationPath' => '@app/migrations/db',
            'generalSchema' => 0,
        ],
        'rbac-migrate' => [
//          'class' => 'yii\console\controllers\MigrateController',
            'class' => 'rabint\commands\MultiLocationRbacMigrationsController',
            'migrationTable' => '{{%system_rbac_migration}}',
            'migrationLookup' => $rbacMigrations,
        ],
    ],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ]
];

$baseConf = require RABINT_BASE_DIR . '/common/config/base.php';

$config = yii\helpers\ArrayHelper::merge($baseConf, $cliConfig);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $cliConfig['bootstrap'][] = 'gii';
    $cliConfig['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
