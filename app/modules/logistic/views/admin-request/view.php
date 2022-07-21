<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Request */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'درخواست ها'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$isModalAjax = Yii::$app->request->isAjax;

$this->context->layout = "@themeLayouts/full";

?>


<div class="box-view request-view"  id="ajaxCrudDatatable">
    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card block block-rounded <?= $isModalAjax?'ajaxModalBlock':'';?> ">
                <div class="card-header block-header block-header-default">
                    <h3 class="block-title">
                        <?= Html::encode($this->title) ?>
                    </h3>
                    <div class="block-action float-left">
                            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-sm  btn-noborder']) ?>
                            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm btn-noborder',
                            'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                            ],
                            ]) ?>
                    </div>
                </div>
                <div class="card-body block-content block-content-full">

                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'created_at' => [
                               'attribute' => 'created_at',
                            'value' => \rabint\helpers\locality::jdate('j F Y H:i:s', $model->created_at),
                            ],
                            'updated_at' => [
                               'attribute' => 'updated_at',
                            'value' => \rabint\helpers\locality::jdate('j F Y H:i:s', $model->updated_at),
                            ],
                        //     'transactioner' => [
                        //         'attribute' => 'transactioner',
                        //        'value' => isset($model->transactionerUser)?$model->transactionerUser->displayName:null,
                        //     ],
                        //     'amount',
                        //      [
                        //         'attribute' => 'gateway',
                        //           'value' => function() use($model){
                        //              $value =$model->gateway;
                        //               $enum = \rabint\finance\Config::paymentGateways();
                        //             $data = isset($enum[$value]['title']) ? $enum[$value]['title'] : $value;
                        //             $class = isset($enum[$value]['class']) ? $enum[$value]['class'] : 'default';
                        //             return '<span class="badge badge-' . $class . '">' . $data . '</span>';
                        //         },
                        //         'format' => 'raw',
                        //     ],
                                'id',
            'title',
            'cellphone',
            'src_city',
            'dst_city',
                             [
                                 'attribute' => 'request_type',
                                   'value' => function() use($model){
                                      $value =$model->request_type;
                                       $enum = \app\modules\logistic\models\Price::types();
                                     $data = isset($enum[$value]['title']) ? $enum[$value]['title'] : $value;
                                     $class = isset($enum[$value]['class']) ? $enum[$value]['class'] : 'default';
                                     return '<span class="badge badge-' . $class . '">' . $data . '</span>';
                                 },
                                 'format' => 'raw',
                             ],
            'car_feature',
            'weight',
            'packing',
                        [
                            'attribute' => 'status',
                            'value' => function() use($model){
                                $value =$model->status;
                                $enum = \app\modules\logistic\models\Request::statuses();
                                $data = isset($enum[$value]['title']) ? $enum[$value]['title'] : $value;
                                $class = isset($enum[$value]['class']) ? $enum[$value]['class'] : 'default';
                                return '<span class="badge badge-' . $class . '">' . $data . '</span>';
                            },
                            'format' => 'raw',
                        ],
            'note:ntext',
            'status_note:ntext',
                    ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
