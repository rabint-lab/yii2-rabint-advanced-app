<?php

namespace common;

use Yii;

class GlobalBootstrap implements \yii\base\BootstrapInterface
{

    public function bootstrap($app)
    {

        /**
         * register module events
         */
        $modules = include(Yii::getAlias('@app/config/modules.php'));

        foreach ((array)$modules as $item) {
            $moduleClass = $item['class'];
            if (method_exists($moduleClass, 'registerEvent')) {
                call_user_func([$moduleClass, 'registerEvent']);
            }
        }

//        \yii\base\Event::on(\yii\web\Controller::className(), \yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
//            die('ma kheyli bahalim');
//        });
//            \yii\base\Event::on(\yii\web\Response::className(), \yii\web\Response::EVENT_AFTER_SEND, function ($event) {
//                \sahifedp\stats\stats::stat();
//            });
//        \Yii::$app->view->on(\yii\web\View::EVENT_END_PAGE, function () {
//            \sahifedp\stats\stats::stat();
//        });

    }

}
