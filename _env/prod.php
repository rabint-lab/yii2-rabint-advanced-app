<?php
$envConf = [
# -----------------------------------------------------------------------------
# App
    'base_url' => [
        'scheme' => 'http',
        'host' => 'http://sample.com/',
        'path' => '/',
    ],
# -----------------------------------------------------------------------------
# Framework
    'YII_DEBUG' => true,
    'YII_ENV' => 'dev', //test , dev , prod
    'debugersIp' => '127.0.0.1, ::1, 5.56.135.139,185.162.43.106',
    'symlink' => true,
    'logTragets' => 'db, file', //'slack,file, db, email',
    'forceCopyAssets' => false,
    'globalCacheTime' => 0,
    'sessionTimeout' => 0,
# -----------------------------------------------------------------------------
# Databases
    'DB' => [
        'dsn' => 'mysql:host=79.143.85.188;port=33070;dbname=maindb',
        'user' => 'db_user',
        'pass' => 'rwrwasdasdasd@123',
        'tablePrefix' => '',
        'schemaCacheTime' => 1200,
    ],
# -----------------------------------------------------------------------------
];

//marge is done in config function. return config_deep_merge(include RABINT_BASE_DIR.'/_env/base_env.php', $envConf);
return $envConf;


