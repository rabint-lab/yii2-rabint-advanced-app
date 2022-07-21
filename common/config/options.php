<?php

/**
 *
 * Option fields:
 * * text
 * * textarea
 * * wysiwyg
 * * select
 * * radio
 * * checkbox
 * * checkboxlist
 * * hidden
 * * attachment_id
 * * attachment_url
 * * seprator
 *
 * Example:
 * $options=[
 *      'optGroup'=>[
 *          'title'=>'group_title',
 *          'clone'=>FALSE
 *          'description'=>'description',
 *          'options'=> [
 *              [
 *                  'name' => 'option_name',
 *                  'label' => 'optionLabel',
 *                  'type' => 'optionType' ,
 *                  'items'=>['key'=>'title','key'=>'title2'],
 *                  'default'=>'defaultValue'
 *                  'hint'=>'',
 *                  'tagOption'=>'',
 *              ]
 *          ]
 *      ]
 *  ]
 *
 * *****************************************************************
 * $options = [
 *      'global_group' => [
 *          'title'=>'group_label',
 *          'clone'=>FALSE,
 *          'description'=>'description',
 *          'options'=> [
 *              ['name' => 'text_example','label' => 'label_sample', 'type' => 'text','hint' => ''],
 *              ['name' => 'textarea_example','label' => 'label_sample', 'type' => 'textarea','hint' => '']
 *              ['name' => 'select_example','label' => 'label_sample', 'type' => 'select', 'items' => ['1' => 'man', '0' => 'woman'], 'default' => '1','hint' => ''],
 *              ['type' => 'seprator','label' => 'label_sample',  'tag' => 'h2'],
 *          ]
 *      ]
 * ];
 * *****************************************************************
 */
return [
    /**
     * a page
     */
    'default' => [
        'title' => \Yii::t('rabint', 'کلی'),
        'description' => \Yii::t('rabint', 'تنظیمات کلی وبسایت در اینجا قابل انجام است.'),
        'tabs' => [
            'general' => [
                'title' => \Yii::t('rabint', 'تنظیمات کلی'),
                'clone' => false,
                'description' => \Yii::t('rabint', 'تنظیمات کلی '),
                'options' => [
                    ['name' => 'slogan', 'label' => \Yii::t('rabint', 'پیشوند عنوان پایگاه'), 'type' => 'text',],
                    ['name' => 'subject', 'label' => \Yii::t('rabint', 'عنوان پایگاه'), 'type' => 'text',],
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان کامل'), 'type' => 'text',],
                    ['name' => 'desc', 'label' => \Yii::t('rabint', 'توضیحات پایگاه'), 'type' => 'textarea',],
                    ['name' => 'keyword', 'label' => \Yii::t('rabint', 'کلمات کلیدی صفحه اول'), 'type' => 'textarea',],

                    ['name' => 'address', 'label' => \Yii::t('rabint', 'آدرس'), 'type' => 'text',],
                    ['name' => 'email', 'label' => \Yii::t('rabint', 'ایمیل'), 'type' => 'text',],
                    ['name' => 'tel', 'label' => \Yii::t('rabint', 'تلفن'), 'type' => 'text',],
                    ['name' => 'fax', 'label' => \Yii::t('rabint', 'فکس'), 'type' => 'text',],
                    ['name' => 'location', 'label' => \Yii::t('rabint', 'لوکیشن دفتر مرکزی'), 'type' => 'location', 'hint' => 'لطفا از قسمت ابزارک های مدیریتی نقطه مورد نظر را انتخاب نمایید',],

                    ['name' => 'head_script', 'label' => \Yii::t('rabint', 'اسکریپت سر صفحه'), 'type' => 'textarea' ],
                    ['name' => 'foot_script', 'label' => \Yii::t('rabint', 'اسکریپت انتهای صفحه'), 'type' => 'textarea'],

                ],
            ],
            'social' => [
                'title' => \Yii::t('rabint', 'شبکه های اجتماعی'),
                'clone' => false,
                'description' => \Yii::t('rabint', 'لینک صفحات در شبکه های اجتماعی'),
                'options' => [

                    ['name' => 'telegram', 'label' => \Yii::t('rabint', 'تلگرام'), 'type' => 'text',],
                    ['name' => 'instagram', 'label' => \Yii::t('rabint', 'اینستاگرام'), 'type' => 'text',],
                    ['name' => 'youtube', 'label' => \Yii::t('rabint', 'یوتیوب'), 'type' => 'text',],
                    ['name' => 'twitter', 'label' => \Yii::t('rabint', 'تویتر'), 'type' => 'text',],
                    ['name' => 'facebook', 'label' => \Yii::t('rabint', 'فیسبوک'), 'type' => 'text',],
                    ['name' => 'linkedin', 'label' => \Yii::t('rabint', 'لینکدین'), 'type' => 'text',],
                    ['name' => 'pinterest', 'label' => \Yii::t('rabint', 'پینترس'), 'type' => 'text',],
                    ['name' => 'vimeo', 'label' => \Yii::t('rabint', 'ویمو'), 'type' => 'text',],

                    ['name' => 'aparat', 'label' => \Yii::t('rabint', 'آپارات'), 'type' => 'text',],
                    ['name' => 'gap', 'label' => \Yii::t('rabint', 'گپ'), 'type' => 'text',],
                    ['name' => 'soroush', 'label' => \Yii::t('rabint', 'سروش'), 'type' => 'text',],
                ],
            ],
            'footer' => [
                'title' => \Yii::t('rabint', 'فوتر'),
                'clone' => false,
                'description' => \Yii::t('rabint', 'تنظیمات بخش فوتر'),
                'options' => [
                    ['name' => 'footer_title', 'label' => \Yii::t('rabint', 'عنوان در فوتر'), 'type' => 'text',],
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان بخش اول'), 'type' => 'text',],
                    ['name' => 'nav_title_2', 'label' => \Yii::t('rabint', 'عنوان بخش سوم'), 'type' => 'text',],
                ],
            ],
            'footer_link_1' => [
                'title' => \Yii::t('rabint', 'منوی سراسری فوتر'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'منوی پیوند ها در فوتر'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],
            'footer_link_2' => [
                'title' => \Yii::t('rabint', 'منوی بخش اول'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'منوی های انتهای صفحه'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],
            'footer_link_3' => [
                'title' => \Yii::t('rabint', 'منوی بخش دوم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'منوی پیوند ها در فوتر'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],
        ]
    ],

    'menu' => [
        'title' => \Yii::t('rabint', 'منوی اصلی'),
        'description' => \Yii::t('rabint', 'تعریف منوی اصلی سایت'),
        'tabs' => [
            'right_menu' => [
                'title' => \Yii::t('rabint', 'منوی های راست'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                    ['name' => 'submenu', 'label' => \Yii::t('rabint', 'زیر منو'), 'type' => 'select', 'items' => [
                        'submenu-1' => \Yii::t('rabint', 'زیر منوی اول'),
                        'submenu-2' => \Yii::t('rabint', 'زیر منوی دوم'),
                        'submenu-3' => \Yii::t('rabint', 'زیر منوی سوم'),
                        'submenu-4' => \Yii::t('rabint', 'زیر منوی چهارم'),
                        'submenu-5' => \Yii::t('rabint', 'زیر منوی پنجم'),
                        'submenu-6' => \Yii::t('rabint', 'زیر منوی ششم'),
                        'submenu-7' => \Yii::t('rabint', 'زیر منوی هفتم'),
                        'submenu-8' => \Yii::t('rabint', 'زیر منوی هشتم'),
                    ]],
                ],
            ],

            'left_menu' => [
                'title' => \Yii::t('rabint', 'منوی های چپ'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                    ['name' => 'submenu', 'label' => \Yii::t('rabint', 'زیر منو'), 'type' => 'select', 'items' => [
                        'submenu-1' => \Yii::t('rabint', 'زیر منوی اول'),
                        'submenu-2' => \Yii::t('rabint', 'زیر منوی دوم'),
                        'submenu-3' => \Yii::t('rabint', 'زیر منوی سوم'),
                        'submenu-4' => \Yii::t('rabint', 'زیر منوی چهارم'),
                        'submenu-5' => \Yii::t('rabint', 'زیر منوی پنجم'),
                        'submenu-6' => \Yii::t('rabint', 'زیر منوی ششم'),
                        'submenu-7' => \Yii::t('rabint', 'زیر منوی هفتم'),
                        'submenu-8' => \Yii::t('rabint', 'زیر منوی هشتم'),
                    ]],
                ],
            ],

            'submenu-1' => [
                'title' => \Yii::t('rabint', 'زیر منوی اول'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],

            'submenu-2' => [
                'title' => \Yii::t('rabint', 'زیر منوی دوم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],

            'submenu-3' => [
                'title' => \Yii::t('rabint', 'زیر منوی سوم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],


            'submenu-4' => [
                'title' => \Yii::t('rabint', 'زیر منوی چهارم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],


            'submenu-5' => [
                'title' => \Yii::t('rabint', 'زیر منوی پنجم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],


            'submenu-6' => [
                'title' => \Yii::t('rabint', 'زیر منوی ششم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],

            'submenu-7' => [
                'title' => \Yii::t('rabint', 'زیر منوی هفتم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],

            'submenu-8' => [
                'title' => \Yii::t('rabint', 'زیر منوی هشتم'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'لینک های منوی اصلی'),
                'options' => [
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],

        ]
    ],

    'home' => [
        'title' => \Yii::t('rabint', 'صفحه اول'),
        'description' => \Yii::t('rabint', 'تنظیمات صفحه اول سایت، نظیر اسلایدر و... در اینجا قابل انجام است.'),
        'tabs' => [
            'slider' => [
                'title' => \Yii::t('rabint', 'تنظیمات اسلایدر'),
                'clone' => true,
                'description' => \Yii::t('rabint', 'تنظیمات اسلایدر '),
                'options' => [
                    ['name' => 'img', 'label' => \Yii::t('rabint', 'تصویر'), 'type' => 'attachment_url',],
                    ['name' => 'title', 'label' => \Yii::t('rabint', 'متن اصلی'), 'type' => 'text',],
                    ['name' => 'subtitle', 'label' => \Yii::t('rabint', 'متن دوم'), 'type' => 'text',],
                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
                    [
                        'name' => 'target',
                        'label' => \Yii::t('rabint', 'نوع لینک'),
                        'type' => 'select',
                        'items' => [
                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
                        ],
                    ],
                ],
            ],
//            'stats' => [
//                'title' => \Yii::t('rabint', 'آمار'),
//                'clone' => 4,
//                'description' => \Yii::t('rabint', 'محتوای بخش دوم'),
//                'options' => [
//                    ['name' => 'icon', 'label' => \Yii::t('rabint', 'آیکن'), 'type' => 'icon', 'hint' => 'لطفا از قسمت ابزارک های مدیریتی آیکن مورد نظر را انتخاب نمایید',],
//                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
//                    ['name' => 'number', 'label' => \Yii::t('rabint', 'عدد'), 'type' => 'text',],
//                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
//                    [
//                        'name' => 'target',
//                        'label' => \Yii::t('rabint', 'نوع لینک'),
//                        'type' => 'select',
//                        'items' => [
//                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
//                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
//                        ],
//                    ],
//                ],
//            ],
//            'tips' => [
//                'title' => \Yii::t('rabint', 'تیپ'),
//                'clone' => 6,
//                'description' => \Yii::t('rabint', 'محتوای بخش سوم'),
//                'options' => [
//                    ['name' => 'icon', 'label' => \Yii::t('rabint', 'آیکن'), 'type' => 'icon', 'hint' => 'لطفا از قسمت ابزارک های مدیریتی آیکن مورد نظر را انتخاب نمایید',],
//                    ['name' => 'title', 'label' => \Yii::t('rabint', 'عنوان'), 'type' => 'text',],
//                    ['name' => 'desc', 'label' => \Yii::t('rabint', 'متن'), 'type' => 'textarea',],
//                    ['name' => 'link', 'label' => \Yii::t('rabint', 'لینک'), 'type' => 'text',],
//                    [
//                        'name' => 'target',
//                        'label' => \Yii::t('rabint', 'نوع لینک'),
//                        'type' => 'select',
//                        'items' => [
//                            '_self' => \Yii::t('rabint', 'در همان صفحه'),
//                            '_blank' => \Yii::t('rabint', 'صفحه جدید'),
//                        ],
//                    ],
//                ],
//            ],
        ]
    ],
//    'pages' => [
//        'title' => \Yii::t('rabint', 'تصاویر صفحات'),
//        'description' => \Yii::t('rabint', 'در این بخش می توانید تصاویر صفحات متفرقه سایت را تنظیم نمایید'),
//        'tabs' => [
//            'page_image' => [
//                'title' => \Yii::t('rabint', 'تصویر صفحات'),
//                'clone' => 20,
//                'description' => \Yii::t('rabint', 'تصویر هر صفحه'),
//                'options' => [
//                    ['name' => 'route', 'label' => \Yii::t('rabint', 'محدودیت آدرس صفحات'), 'type' => 'text', 'hint' => 'بخشی از آدرس صفحات مورد نظر را وارد نمایید'],
//                    ['name' => 'image', 'label' => \Yii::t('rabint', 'تصویر'), 'type' => 'attachment_url',],
//                    //['name' => 'text_color', 'label' => \Yii::t('rabint', 'رنگ متن'), 'type' => 'select', 'items' => ['light' => 'سفید', 'dark' => 'تیره'],'default'=>'light'],
//                ],
//            ],
//        ]
//    ],
];