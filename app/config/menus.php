<?php

use app\modules\structurer\models\search\ReportCategorySearch;
use app\modules\user_group\models\search\UserGroupSearch;

$isHome = (\rabint\helpers\uri::isHome());
return [
    'preadmin' => [
        [
            'label' => \Yii::t('rabint', 'نخست'),
            'url' => ['/'],
        ], [
            'label' => \Yii::t('rabint', 'درباره'),
            'url' => $isHome ? '#attorneys-section' : ['/about'],
        ],

    ],
    'admin' => [
        // [
        //     'label' => Yii::t('app', 'ارگان ها'),
        //     'items' => $menus,
        // ],
        //        [
        //            'label' => Yii::t('app', 'access entries'),
        //            'items' => [
        //                ['label' => Yii::t('app', 'providers'), 'url' => ['/admin-provider/index']],
        //                '<li class="divider" role=>"separator"></li>',
        //                ['label' => Yii::t('app', 'services(proxy & ...)'), 'url' => ['/admin-service/index']],
        //                ['label' => Yii::t('app', 'accounts'), 'url' => ['/admin-account/index']],
        //                ['label' => Yii::t('app', 'vpn'), 'url' => ['/admin-vpn/index']],
        //                ['label' => Yii::t('app', 'ezproxy'), 'url' => ['/admin-ezproxy/index']],
        //                '<li class="divider" role=>"separator"></li>',
        //                ['label' => Yii::t('app', 'sites'), 'url' => ['/admin-site/index']],
        //            ],
        //        ],
        // [
        //     'label' => Yii::t('app', 'set access'),
        //     'items' => [
        //         ['label' => Yii::t('app', 'access models'), 'url' => ['/admin-access-model/index']],
        //         ['label' => Yii::t('app', 'user accesses'), 'url' => ['/admin-access/index']],
        //     ],
        // ],
        // ['label' => Yii::t('app', 'changelog'), 'url' => ['/admin-changelog/index']],
    ],
    'dashboard' => [
        // !Yii::$app->user->isGuest ? ['label' => Yii::t('app', 'my access'), 'url' => ['/access/index']] : '',
    ],
    'main' => [
        // ['label' => Yii::t('app', 'وبسایت اصلی'), 'url' => 'http://reo.ir'],
        // ['label' => Yii::t('app', 'Companies'), 'url' => ['/open/company/index']],
        //        ['label' => Yii::t('app', 'Projects'), 'url' => ['/open/project/index']],
        //        ['label' => Yii::t('app', 'Employees'), 'url' => ['/open/employee/index']],
        //        ['label' => Yii::t('app', 'About us'), 'url' => ['/page/default/view','slug'=>'about']],
        //        ['label' => Yii::t('app', 'Contact us'), 'url' => ['/contact']],
        //        !Yii::$app->user->isGuest ? ['label' => Yii::t('app', 'my access'), 'url' => ['/access/index']] : '',
    ]
];
