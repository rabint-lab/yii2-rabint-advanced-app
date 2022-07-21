<?php

$envConf = [
# -----------------------------------------------------------------------------
# App
    'base_url' => [
        'scheme' => 'http',
        'host' => 'sample.ir',
        'path' => '/',
    ],
# -----------------------------------------------------------------------------
# Framework
    'YII_DEBUG' => false,
    'YII_ENV' => 'dev', //test , dev , prod
    'debugersIp' => '127.0.0.1, ::1',// add * and your ip  for debugging on docker
    'symlink' => true,
    'logTragets' => 'db, file', //'slack,file, db, email',
    'forceCopyAssets' => false,
    'globalCacheTime' => 0,
    'sessionTimeout' => 0,
# -----------------------------------------------------------------------------
# Databases
    'DB' => [
        'dsn' => 'mysql:host=localhost;port=33070;dbname=test',
        'user' => 'test',
        'pass' => 'asdfsdsdsdfb',
        'tablePrefix' => '',
        'schemaCacheTime' => 1200,
    ],
# -----------------------------------------------------------------------------
];

//marge is done in config function. return config_deep_merge(include RABINT_BASE_DIR.'/_env/base_env.php', $envConf);
return $envConf;
