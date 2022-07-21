<?php

$baseConf = [
# -----------------------------------------------------------------------------
# App
    'app_id' => "rabint_app",
    'app_name' => "داشبورد",
    'app_token' => "baseApp:DARiRpRi64UM58v8TvAqt9QAqt9AZWqLpunHUFaDUrRWViNF",
    'base_url' => [
        'scheme' => 'http',
        'host' => 'shafaf.local',
        'path' => '/',
    ],
    'sourceLanguage' => 'fa-IR',
    'language' => 'fa-IR',
    'timeZone' => 'Asia/Tehran',
    'themePath' => '@app/themes/fatehin',
    'backendThemePath' => '@rabint/themes/codebase',
    'panelThemePath' => '@app/themes/fatehin',
    'adminEmail' => 'admin@.rabint.ir',
    'noreplyEmail' => 'noreply@rabint@.ir',
    'maintenanceMode' => false,
# -----------------------------------------------------------------------------
# Framework
    'YII_DEBUG' => true,
    'YII_ENV' => 'dev', //test , dev , prod
    'debugersIp' => '127.0.0.1, 127.0.1.1, ::1',
    'symlink' => true,
    'logTragets' => 'db, file', //'slack,file, db, email',
    'forceCopyAssets' => false,
    //COMPRESS_ASSETS = true
    //RESTAPI = false
    'globalCacheTime' => 1200,
    'sessionTimeout' => 1200,
    'cookieValidationKey' => 'wKzQJ-z4_mS19yn0fKYZo6EWAPF8xb0m',
# -----------------------------------------------------------------------------
# Databases
    'DB' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=tracking',
        'user' => 'su',
        'pass' => '123',
        'tablePrefix' => '',
        'schemaCacheTime' => 1200,
    ],
# -----------------------------------------------------------------------------
    'SERVICE' => [
        'email' => [
            'type' => 'smtp',
            'config' => [
                'host' => 'mail.rabint.ir',
                'username' => 'razavi.tv@rabint.ir',
                'password' => '756y!rht5y5r',
                'port' => '25',
//            'encryption' => 'tls',
//            'HOST' => 'mail.rabint.ir',
//            'ENCRYPTION' => 'tls',
            ]
        ],
        'sms' => [
            "serviceClass" => "\rabint\classes\sms\webservice\sms3300",
            "serviceConfig" => [
                "from" => "9800098708725220",
                "username" => "rabint_app",
                "password" => "452j76tf4",
            ]
        ],
        'qeuee' => [
            "serviceClass" => "\rabint\classes\sms\webservice\sms3300",
            "serviceConfig" => [
                "from" => "9800098708725220",
                "username" => "rabint_app",
                "password" => "452j76tf4",
            ]
        ],
    ],
# —---------------------------------------------------------------------------
# SECURITY
    'SECURITY' => [
        'globalXssFilter' => true,
        'globalBadFileFilter' => true,
        'whiteListExt' => 'ogv, webm, mp4, vob, mpg, avi, mov, wmv, flv, mp3, wav, wma, ogg, gif, png, jpg, jpeg, xls, xlsx, pdf',
        'blackListExt' => 'php, inc, exe',
        'whiteListMime' => 'audio/ogg, video/ogg, video/mp4, audio/mp4, application/mp4, video/mpeg, audio/mpeg, video/x-ms-vob, video/x-msvideo,
         video/quicktime, video/x-sgi-movie, video/x-flv, audio/x-wav, video/x-ms-wm, audio/x-ms-wma, video/x-ms-wmv, image/gif, image/png,
          image/jpeg, application/octet-stream, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/pdf',
        'blackListMime' => 'application/x-php, application/x-msdownload',
    ],
# -----------------------------------------------------------------------------
# filemanager
    'filemanager' => [
        'protectedBasePath' => '@app/runtime',
        // directory for files available from the web
        'unprotectedBasePath' => '@app/web',
        // path in a directory of upload
        'uploadSubDirPath' => 'upload',
        'userCanUpload' => 'user', //'contributor',
        'presets' => [
            'global' => [
                'tiny' => [50, 50, 'normal'],
                'small' => [120, 68, 'normal'],
                'medium' => [320, 180, 'normal'],
                'orginal' => [320, 320, 'resizeToX'],
                'large' => [720, 400, 'resizeToX'], //resizeToY , resize
            ],
            'userAvatar' => [
                'tiny' => [50, 50, 'normal'],
                'medium' => [150, 150, 'normal'],
            ],
            'personalAvatar' => [
                'tiny' => [60, 80, 'normal'],
                'small' => [120, 160, 'normal'],
                'orginal' => [300, 400, 'resizeToX'],
                'medium' => [300, 400, 'normal'],
                'large' => [600, 800, 'normal'],
            ],
        ],
    ],
## -----------------------------------------------------------------------------
# Params
    'params' => [
        'rabint_enviroment' => 'app',
        'bsVersion' => '4.x',
        'adminEmail' => 'admin@example.com',
        'availableLocales' => [
            'fa' => ['slug' => 'fa', 'shortTitle' => 'فا', 'title' => 'فارسی', 'fullTitle' => 'فارسی (Persian)'],
//            'en' => ['slug' => 'en', 'shortTitle' => 'en', 'title' => 'English', 'fullTitle' => 'انگلیسی (English)'],
//            'ar' => ['slug' => 'ar', 'shortTitle' => 'عر', 'title' => 'العربي', 'fullTitle' => 'عربی (Arabic)'],
//            'fr' => ['slug' => 'fr', 'shortTitle' => 'fr', 'title' => 'French', 'fullTitle' => 'فرانسوی (French)'],
//            'ur' => ['slug' => 'ur', 'shortTitle' => 'ار', 'title' => 'اردو', 'fullTitle' => 'اردو (Urdu)'],
        ],
    ],
];

return $baseConf;
