<?php

$envConf = [
# -----------------------------------------------------------------------------
# App
    'base_url' => [
        'scheme' => 'http',
        'host' => 'sample.local',
        'path' => '/',
    ],
# -----------------------------------------------------------------------------
# Framework
    'YII_DEBUG' => true,
    'YII_ENV' => 'dev', //test , dev , prod
    'debugersIp' => '127.0.0.1, ::1',
    'symlink' => true,
    'logTragets' => 'db, file', //'slack,file, db, email',
    'forceCopyAssets' => false,
    'globalCacheTime' => 0,
    'sessionTimeout' => 0,
# -----------------------------------------------------------------------------
];

//marge is done in config function. return config_deep_merge(include RABINT_BASE_DIR.'/_env/base_env.php', $envConf);
return $envConf;
