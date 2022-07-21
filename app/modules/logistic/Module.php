<?php

namespace app\modules\logistic;

/**
 * logistic module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\logistic\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    
    public static function adminMenu() {
        return [
            'label' => \Yii::t('rabint', 'لجستیک'),
            'icon' => '<i class="fas fa-truck"></i>',
            'url' => '#',
            'options' => ['class' => 'treeview'],
            'items' => [
                ['label' => \Yii::t('rabint', 'استعلام قیمت'), 'url' => ['/logistic/admin-price'], 'icon' => '<i class="far fa-circle"></i>'],
                ['label' => \Yii::t('rabint', 'گزارش استعلام قیمت'), 'url' => ['/logistic/admin-price-log'], 'icon' => '<i class="far fa-circle"></i>'],
                ['label' => \Yii::t('rabint', 'درخواست های ثبت شده'), 'url' => ['/logistic/admin-request'], 'icon' => '<i class="far fa-circle"></i>'],
            ]
        ];
    }
}
