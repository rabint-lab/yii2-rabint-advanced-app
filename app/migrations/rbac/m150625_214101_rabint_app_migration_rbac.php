<?php

use rabint\rbac\AutoMigration;
use rabint\rbac\rule\OwnModelRule;
use rabint\user\models\User;

class m150625_214101_rabint_app_migration_rbac extends AutoMigration
{


    public function roles()
    {
        return [
            User::ROLE_USER => [
                'description' => \Yii::t('rabint', 'کاربر عادی'),
            ],
            User::ROLE_CONTRIBUTOR => [
                'description' => \Yii::t('rabint', 'مشارکت کننده'),
                'children' => [User::ROLE_USER],
            ],
            User::ROLE_AUTHOR => [
                'description' => \Yii::t('rabint', 'نویسنده'),
                'children' => [User::ROLE_CONTRIBUTOR],
            ],
            // User::ROLE_REPORTER => [
            //     'description' => \Yii::t('rabint', 'گزارشگیر'),
            //     'children' => [User::ROLE_AUTHOR],
            // ],
            // User::ROLE_EDITOR => [
            //     'description' => \Yii::t('rabint', 'مدیر داخلی'),
            //     'children' => [User::ROLE_REPORTER],
            // ],
            User::ROLE_MANAGER => [
                'description' => \Yii::t('rabint', 'مدیر'),
                'children' => [User::ROLE_CONTRIBUTOR],
            ],
            User::ROLE_ADMINISTRATOR => [
                'description' => \Yii::t('rabint', 'مدیر کل'),
                'children' => [User::ROLE_MANAGER],
            ],
        ];
    }

    public function permissions()
    {
        return [
            'loginToBackend' => [
                'description' => \Yii::t('rabint', 'ورود به مدیریت'),
                'parents' => [User::ROLE_MANAGER],
            ],
            'sendMessage' => [
                'description' => \Yii::t('rabint', 'ارسال پیام خصوصی'),
                'parents' => [User::ROLE_CONTRIBUTOR],
            ],
            'sendMessageBroadcast' => [
                'description' => \Yii::t('rabint', 'ارسال پیام خصوصی برای همه'),
                'parents' => [User::ROLE_MANAGER],
            ],
            'createModel' => [
                'description' => \Yii::t('rabint', 'ایجاد آیتم'),
                'parents' => [User::ROLE_CONTRIBUTOR],
            ],
            'publishModel' => [
                'description' => \Yii::t('rabint', 'انتشار آیتم'),
                'parents' => [User::ROLE_MANAGER],
            ],
            'updateModel' => [
                'description' => \Yii::t('rabint', 'ویررایش آیتم‌ها'),
                'parents' => [User::ROLE_MANAGER],
            ],
        ];
    }

    public function rules()
    {
        return [
            'updateOnwModel' => [
                'class' => OwnModelRule::class,
                'objConfig' => ['name' => 'updateOnwModel'],
                'description' => \Yii::t('rabint', 'ویرایش آیتم های خود'),
                'parents' => [
                    User::ROLE_AUTHOR
                ],
            ],
            'publishOnwModel' => [
                'class' => OwnModelRule::class,
                'objConfig' => ['name' => 'publishOnwModel'],
                'description' => \Yii::t('rabint', 'انتشار آیتم های خود'),
                'parents' => [
                    User::ROLE_AUTHOR
                    /* , User::ROLE_CONTRIBUTOR, User::ROLE_AUTHOR, User::ROLE_EDITOR */
                ],
            ],
        ];
    }

    public function seeds()
    {
        return [
            ['role', 1, User::ROLE_ADMINISTRATOR],
            ['role', 2, User::ROLE_MANAGER],
            ['role', [3], User::ROLE_USER],
            //['permission', [1,2], 'loginToBackend'],
            //['rule', User::ROLE_USER, User::RULE_USER_OWN_MODEL],
        ];
    }
}
