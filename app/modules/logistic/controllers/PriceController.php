<?php

namespace app\modules\logistic\controllers;

use app\modules\logistic\models\Price;
use app\modules\logistic\models\PriceLog;
use app\modules\logistic\models\Request;
use app\modules\logistic\models\search\PriceSiteSearch;
use rabint\helpers\locality;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
/**
 * PriceController implements the CRUD actions for Price model.
 */
class PriceController extends \rabint\controllers\DefaultController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return parent::behaviors([
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]);
    }

    /**
     * Lists all Price models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PriceSiteSearch();
        $query = $searchModel->search(Yii::$app->request->post(), true);
        $result = null;
        if (Yii::$app->request->isPost) {
            $result = $query->one();

            //sendSms:

            $type = $searchModel->car_type;
            $searchModel->cell = locality::convertToEnglish($searchModel->cell);
            if (!empty($result->$type)) {
                Price::sendSmsPrice($searchModel->car_type,$searchModel->cell,$result->$type);
            }

            $log = new PriceLog();
            $log->cellphone = $searchModel->cell;
            $log->src_state = $searchModel->src_state;
            $log->src_city = $searchModel->src_city;
            $log->dst_state = $searchModel->dst_state;
            $log->dst_city = $searchModel->dst_city;
            $log->request_type = $searchModel->car_type;
            $log->save(false);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'result' => $result,
        ]);
    }

    /**
     * Displays a single Price model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Price model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Price the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Price::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(\Yii::t('rabint', 'The requested page does not exist.'));
        }
    }


    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRequest()
    {

        $model = new Request();

        $request = Yii::$app->request;

        if ($model->load(Yii::$app->request->post())) {
            $model->status = Request::STATUS_DRAFT;
            if ($model->save()) {

                Yii::$app->session->setFlash('success',  Yii::t('app', 'کاربر گرامی درخواست بار شما با موفقیت ثبت شد. همکاران ما در اسرع وقت با شما تماس خواهد گرفت.'));

                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', \rabint\helpers\str::modelErrors($model->errors));
            }
        }
        return $this->render('request', [
            'model' => $model,
        ]);
    }

}
