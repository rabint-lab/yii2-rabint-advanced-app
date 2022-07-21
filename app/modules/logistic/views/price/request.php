<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Request */


$this->title = Yii::t('app', 'ثبت درخواست باربری');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box-form request-create" id="ajaxCrudDatatable">

    <div class="row">
        <div class="col">
            <div class="widget-header">
                <h3 class="widget-title">
                    <?= $this->title; ?>
                </h3>
            </div>
        </div>
    </div>

    <div class="spacer"></div>


    <?php $form = ActiveForm::begin(); ?>


    <div class="clearfix"></div>
    <div class="form-block request-form">

        <div class="row">
            <div class="col-sm-12">
                <div class="card block block-rounded ">
                    <div class="card-header block-header block-header-default">
                        <h3 class="block-title"><?= \Yii::t('app', 'مشخصات مبدا'); ?></h3>
                    </div>

                    <div class="card-body block-content">
                        <div class="row">

                            <div class="col-sm-12 col-md-6">
                                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>
                            </div>

                            <?php
                            $srcCities = \app\modules\logistic\models\Price::find()
                                ->select(new \yii\db\Expression("distinct(concat(`src_state`,' - ',`src_city`)) as title , `src_city` as city "))
                                ->asArray()->all();

                            $dstCities = \app\modules\logistic\models\Price::find()
                                ->select(new \yii\db\Expression("distinct(concat(`dst_state`,' - ',`dst_city`)) as title , `dst_city` as city "))
                                ->asArray()->all();

                            $srcCities = \yii\helpers\ArrayHelper::map($srcCities,'city','title');
                            $dstCities = \yii\helpers\ArrayHelper::map($dstCities,'city','title');
                            ?>
                            <div class="col-sm-12 col-md-6">
                                <?= \rabint\helpers\widget::select2($form,$model,'src_city',$srcCities); ?>
                            </div>


                            <div class="col-sm-12 col-md-6">
                                <?= \rabint\helpers\widget::select2($form,$model,'dst_city',$dstCities); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card block block-rounded ">
                    <div class="card-header block-header block-header-default">
                        <h3 class="block-title"><?= \Yii::t('app', 'مشخصات ناوگان و بار'); ?></h3>
                    </div>

                    <div class="card-body block-content">
                        <div class="row">

                            <?php
                            $ct = [
                                'وانت' => 'وانت - نیسان',
                                'خاور' => 'خاور',
                                'تک' => 'تک ( ۶ چرخ )',
                                'جفت' => 'جفت ( ۱۰ چرخ )',
                                'تریلی' => 'تریلی',
                            ];
                            $cf= [
                                'سایر'=>'سایر',
                                'روباز'=>'روباز',
                                'یخچالی'=>'یخچالی',
                                'مسقف فلزی'=>'مسقف فلزی',
                                'مسقف چادری'=>'مسقف چادری',
                                'بغل بازشو'=>'بغل بازشو',
                                'کمپرسی'=>'کمپرسی',
                                'لبه‌دار'=>'لبه‌دار',
                                'نیم‌لبه'=>'نیم‌لبه',
                                ' ترانزیت چادری'=>' ترانزیت چادری',
                            ];
                            $pk= [
                                'سایر'=>'سایر',
                                'فله'=>'فله',
                                'پالت'=>'پالت',
                                'نگله'=>'نگله',
                                'کانتینر'=>'کانتینر',
                                'کیسه-جامبو'=>'کیسه-جامبو',
                                'صندوق-کارتن'=>'صندوق-کارتن',
                                'بشکه'=>'بشکه',
                                'شمش'=>'شمش',
                                'رول'=>'رول',
                            ];
                            ?>

                            <div class="col-sm-12 col-md-6">
                                <?php
                                $types = \yii\helpers\ArrayHelper::getColumn(\app\modules\logistic\models\Price::types(), 'title');
                                ?>
                                <?= $form->field($model, 'request_type')->dropDownList($types); ?>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <?= $form->field($model, 'car_feature')->dropDownList($cf); ?>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <?= $form->field($model, 'weight')->textInput()->hint(Yii::t('app','وزن بار را به تن وارد نمایید')) ?>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <?= $form->field($model, 'packing')->dropDownList($pk); ?>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =================================================================== -->
            </div>
        </div>
        <div class="spacer"></div>
        <div class="row">
            <!-- =================================================================== -->
            <div class="col-sm-12">
                <div class="card block block-success">
                    <div class="card-header block-header block-header-default">
                        <h3 class="block-title"><?= Yii::t('app', 'Save') ?></h3>
                    </div>
                    <div class="card-body block-content">

                        <div class="col-sm-12">
                            <?=
                            $form->field($model, 'captcha')
                                ->widget(\yii\captcha\Captcha::className(), [
                                    'captchaAction' => '/site/captcha',
                                    'template' => '<div class="row"><div class="col-sm-12 center center-block">{image}</div><div class="clearfix"></div><div class="col-sm-12">{input}</div></div>',
                                ])->hint(\Yii::t('rabint', 'برای تغییر کد روی عکس کلیک نمایید'));
                            ?>
                        </div>

                        <?php
                        $link = \rabint\helpers\uri::to(['/page/default/view', 'slug' => 'rules']);
                        $rule = <<<RYL
کلیه <a href="{$link}">قوانین باربری</a> این شرکت را می پذیرم  
RYL;

                        echo $form->field($model, 'allow_rule')->checkbox()->label($rule) ?>
                    </div>
                    <div class="card-body block-content block-content-full">
                        <div class="text-center">
                            <?= Html::submitButton(Yii::t('app', 'ثبت درخواست'), ['class' => 'btn btn-success btn-flat']) ?>
                        </div>
                    </div><!-- /.block-content block-content-full-->
                </div>
            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
