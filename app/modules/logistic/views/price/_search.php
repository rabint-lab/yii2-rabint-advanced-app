<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\search\PriceSearch */
/* @var $form yii\widgets\ActiveForm */

$states = \common\models\City::find()->distinct('state')->all();
$states = \yii\helpers\ArrayHelper::map($states, 'state', 'state');

$types = \yii\helpers\ArrayHelper::getColumn(\app\modules\logistic\models\Price::types(), 'title');

$srcCities = \app\modules\logistic\models\Price::find()
    ->select(new \yii\db\Expression("distinct(concat(`src_state`,' - ',`src_city`)) as title , `src_city` as city "))
    ->asArray()->all();

$dstCities = \app\modules\logistic\models\Price::find()
    ->select(new \yii\db\Expression("distinct(concat(`dst_state`,' - ',`dst_city`)) as title , `dst_city` as city "))
    ->asArray()->all();

$srcCities = \yii\helpers\ArrayHelper::map($srcCities,'city','title');
$dstCities = \yii\helpers\ArrayHelper::map($dstCities,'city','title');
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'post',
]); ?>
    <div class="cart cart-info">
        <div class="cart-body">

            <div class="search_box price-search">

                <div class="row">

<!--                    <div class="col-lg-2 col-md-6 col-sm-6 offset-lg-1 offset-sm-0 offset-md-0">--><?php //= $form->field($model, 'src_state')->dropDownList($states) ?><!--</div>-->

                    <div class="col-lg-3 col-md-6 col-sm-12">

                        <?= \rabint\helpers\widget::select2($form,$model,'src_city',$srcCities); ?>
                        <?php //= $form->field($model, 'src_city') ?>

                    </div>

<!--                    <div class="col-lg-2 col-md-6 col-sm-6">--><?php //= $form->field($model, 'dst_state')->dropDownList($states) ?><!--</div>-->

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <?= \rabint\helpers\widget::select2($form,$model,'dst_city',$dstCities); ?>
                        <?php //= $form->field($model, 'dst_city') ?>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <?= $form->field($model, 'car_type')->dropDownList($types); ?>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12"><?= $form->field($model, 'cell') ?></div>

<!--                    <div class="col-sm-3">--><?php //echo $form->field($model, 'price_type')->dropDownList($types) ?><!--</div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'vanet') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'khavar') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'tak') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'joft') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'tereily') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'created_at') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'updated_at') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'created_by') ?></div>-->

                    <!--<div class="col-sm-4"><?php // echo $form->field($model, 'updated_by') ?></div>-->
                </div>
            </div>
        </div>
        <div class="cart-footer center">
            <?php // echo Html::resetButton(Yii::t('rabint', 'Reset'), ['class' => 'btn btn-default pull-left']) ?>
            <?= Html::a(Yii::t('rabint', 'Reset'), ['index'], ['class' => 'btn btn-default pull-left  btn-lg']) ?>
            <?= Html::submitButton(Yii::t('rabint', 'Search'), ['class' => 'btn btn-primary pull-left btn-lg']) ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php ActiveForm::end(); ?>