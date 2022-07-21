<?php

namespace app\modules\logistic\controllers;

use app\modules\logistic\models\Request;
use yii\web\Controller;
use yii\web\Response;
use Yii;


/**
 * Default controller for the `logistic` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


}
