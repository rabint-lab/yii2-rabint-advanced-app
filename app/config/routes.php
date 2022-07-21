<?php


return [
    '' => 'site/index',
    /* user ------------------------------------------------ */
    '/events'=>'/event/event',
    'login'=>'/user/sign-in/login',
    'page/view/<slug>' => '/page/default/view',
    'companies' => '/open/company/index',
    'company/view/<slug>' => '/open/company/view',
    'projects' => '/open/project/index',
    'project/view/<slug:\w+>' => '/open/project/view',
    'employee' => '/open/employee',
    'questions' => '/faq/faq/index',
    'questions/<action>' => '/faq/faq/<action>',
    
    'joinroom/<group>/<room>' => '/webinar/default/direct-link',
    
//    'logout' => 'user/sign-in/logout',
//    'dashboard' => 'user/default/index',
//    'profile' => 'user/default/profile',
//    'register' => 'user/sign-in/signup',
//    ['pattern' => 'video', 'route' => '/post/default/index', 'defaults' => ['type' => 'video']],
//    '@<nikename>' => '/post/default/channel',
//    'post/<slug>' => '/post/default/view',
//    [
//        'pattern' => 'channels/official_channels',
//        'route' => '/post/default/channels',
//        'defaults' => ['is_official' => '1']
//    ],
];
