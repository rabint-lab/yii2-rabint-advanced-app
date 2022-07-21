<?php

namespace app\controllers;

use app\modules\structurer\models\Data;
use Yii;

class SiteController extends \rabint\controllers\DefaultController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'rabint\actions\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                //                'backColor' => 0xFFFFFF,
                'foreColor' => rand(0x000000, 0x777777),
                //                'transparent' => true,
                'offset' => -1,
                'padding' => 3,
                'fontFile' => "@rabint/assets/captcha_font/font_" . random_int(1, 31) . ".ttf",
                //                'fontFile' => "@common/captcha_font/font_4".".ttf",
                'testLimit' => 1,
                'minLength' => 5,
                'maxLength' => 6,
                'width' => 200,
                'height' => 70,
            ],
            'set-locale' => [
                'class' => 'rabint\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "@themeLayouts/home";
        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAbout()
    {
        $request = Yii::$app->request;
        return $this->render('about');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionTest()
    {
        $structureId = 2;
        $sampleData = [
            'field_1' => 30,
            'field_2' => 12,
            'field_2' => 34,
            'field_3' => 56,
            'field_4' => 44,
            'field_5' => 24,
            'field_6' => 54,
        ];
        $newDataWithCachedField = Data::fillCacheFields($structureId, $sampleData);
        pr($newDataWithCachedField, 1);
    }
    
    public function actionTest2(){
        $render = new \rabint\helpers\shortcode;
        $render->shortcodes = ['SAMAN'=>'SAMAN_FUNC'];
        $str = "
            salam be hame </br>
            [SAMAN/]
            khodahafez
            ";
        echo $render->render($str);        
    }
}
