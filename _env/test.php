<?php

$envConf = [
# -----------------------------------------------------------------------------
# App
    'base_url' => [
        'scheme' => 'http',
        'host' => 'test.ir',
        'path' => '/',
    ],
# -----------------------------------------------------------------------------
# Framework
    'YII_DEBUG' => true,
    'YII_ENV' => 'dev', //test , dev , prod
    'debugersIp' => '127.0.0.1, ::1, 83.123.213.195',
    'symlink' => true,
    'logTragets' => 'db, file', //'slack,file, db, email',
    'forceCopyAssets' => false,
    'globalCacheTime' => 0,
    'sessionTimeout' => 0,
# -----------------------------------------------------------------------------
# Databases
    'DB' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=sdsdfsdf',
        'user' => 'sdfsdf',
        'pass' => 'dfsdf@sdf',
        'tablePrefix' => '',
        'schemaCacheTime' => 1200,
    ],
# -----------------------------------------------------------------------------
];

//marge is done in config function. return config_deep_merge(include RABINT_BASE_DIR.'/_env/base_env.php', $envConf);
return $envConf;
