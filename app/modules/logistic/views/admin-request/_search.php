<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\search\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card block block-rounded block-mode-loading-refresh">
    <div class="card-header block-header">
        <h3 class="card-title block-title float-start">
            <?=  \Yii::t('rabint', 'جستجو'); ?>
        </h3>
        <div class="block-options card-header-actions float-end">
            <button type="button" class="card-header-action btn-minimize btn-block-option block-minimize-btn btn btn-sm btn-link">
                <i class="btnicon fas fa-chevron-down"></i>
            </button>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php $form = ActiveForm::begin([
    //'action' => ['index'],
    'method' => 'get',
    ]); ?>

    <div class="card-body block-content bg-body-light" style="display: none;">
        <div class="search_box request-search">
            <div class="row">
                                <div class="col-sm-4"><?= $form->field($model, 'id') ?></div>

                <div class="col-sm-4"><?= $form->field($model, 'title') ?></div>

                <div class="col-sm-4"><?= $form->field($model, 'cellphone') ?></div>

                <div class="col-sm-4"><?= $form->field($model, 'src_state') ?></div>

                <div class="col-sm-4"><?= $form->field($model, 'src_city') ?></div>

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'dst_state') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'dst_city') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'request_type') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'car_feature') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'weight') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'packing') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'status') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'note') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'status_note') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'allow_rule') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'created_at') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'updated_at') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'created_by') ?></div>-->

                <!--<div class="col-sm-4"><?php // echo $form->field($model, 'updated_by') ?></div>-->


                <?php  /* ************************************************** * / ?>
                <div class="col-sm-4">
                    <div class="form-group field-cdrsearch-duration has-success">
                        <label class="control-label" for="cdrsearch-duration"><?= \Yii::t('app', 'تاریخ');
                            ?></label>
                        <div class="input-group">
                            <?= Html::activeInput('date', $model, 'calldate_from', ['class' => 'form-control',
                            'placeholder' => 'از']) ?>
                            <?= Html::activeInput('date', $model, 'calldate_to', ['class' => 'form-control',
                            'placeholder' => 'تا']) ?>
                        </div>
                        <div class="help-block">
                            <?= \Yii::t('app', 'بازه تاریخ مورد نظر بصورت شمسی یا قمری');?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group field-cdrsearch-duration has-success">
                        <label class="control-label" for="cdrsearch-duration"><?= \Yii::t('app', 'مدت مکالمه');
                            ?></label>
                        <div class="input-group">
                            <?=  Html::activeInput('number', $model, 'duration_from', ['class' =>
                            'form-control', 'placeholder' => 'از']) ?>
                            <?=  Html::activeInput('number', $model, 'duration_to', ['class' => 'form-control',
                            'placeholder' => 'تا']) ?>
                        </div>
                        <div class="help-block">
                            <?= \Yii::t('app', 'مدت مکالمه به ثانیه'); ?>
                        </div>
                    </div>
                </div>
                <?php  /* ************************************************** */ ?>

            </div>
            <div class="row">
                <div class="card-body block-content block-content-full">
                    <div class=" center center-block">
                        <?=  Html::submitButton(Yii::t('rabint', 'Search'), ['class' => 'btn btn-info
                        btn-noborder']) ?>
                                                <?=  Html::a(Yii::t('rabint', 'Reset'), ['index'], ['class' => 'btn btn-outline-info'])
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>