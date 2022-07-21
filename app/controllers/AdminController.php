<?php

namespace app\controllers;

use app\models\Sheet;
use rabint\helpers\locality;
use rabint\helpers\str;
use function GuzzleHttp\Psr7\str;
use Yii;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends \rabint\controllers\AdminController
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
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        return $this->render('index');
    }

}
