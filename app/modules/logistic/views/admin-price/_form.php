<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Price */
/* @var $form yii\widgets\ActiveForm */
$isModalAjax = Yii::$app->request->isAjax;

$this->context->layout = "@themeLayouts/full";

?>
<?php $form = ActiveForm::begin(); ?>


    <div class="clearfix"></div>
    <div class="form-block price-form">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card block block-rounded <?= $isModalAjax ? 'ajaxModalBlock' : ''; ?>">
                        <div class="card-header block-header block-header-default">
                            <h3 class="block-title"><?= Html::encode($this->title) ?></h3>
                        </div>

                        <div class="card-body block-content">
                            <?php
                            $states = \common\models\City::find()->distinct('state')->all();
                            $states = \yii\helpers\ArrayHelper::map($states, 'state', 'state');

                            if ($model->isNewRecord) {
                                $model->src_city = 'مشهد';
                            }
                            ?>
                            <div class="row">
                                <div class="col">
                                    <?= $form->field($model, 'src_state')->dropDownList($states) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'src_city')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <?= $form->field($model, 'dst_state')->dropDownList($states) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'dst_city')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <?= $form->field($model, 'vanet')->textInput()->hint(Yii::t('app', 'قیمت وانت یا نیسان به ریال')) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'khavar')->textInput()->hint(Yii::t('app', 'قیمت خاور به ریال')) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'b911')->textInput()->hint(Yii::t('app', 'قیمت 911 به ریال')) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'tak')->textInput()->hint(Yii::t('app', 'قیمت تک به ریال')) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'joft')->textInput()->hint(Yii::t('app', 'قیمت جفت به ریال')) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'tereily')->textInput()->hint(Yii::t('app', 'قیمت تریلی به ریال')) ?>
                                </div>


                            </div>
                            <div class="spacer"></div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-center">
                                        <?= Html::submitButton($model->isNewRecord ? Yii::t('rabint', 'Create') : Yii::t('rabint', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="spacer"></div>
                            <div class="spacer"></div>
                        </div>
                    </div>
                    <!-- =================================================================== -->
                </div>
            </div>

        </div>
    </div>

<?php ActiveForm::end(); ?>