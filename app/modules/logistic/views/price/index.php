<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\logistic\models\search\PriceSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rabint', 'استعلام قیمت');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list_box price-index">

    <div class="row">
        <div class="col">
            <div class="widget-header">
                <h3 class="widget-title">
                    <?= \Yii::t('app', 'فرم استعلام قیمت'); ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="spacer"></div>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="spacer"></div>
            <div class="spacer"></div>
        </div>
    </div>
    <?php
    if (Yii::$app->request->isPost) {
        ?>


        <div class="row">
            <div class="col">
                <div class="widget-header">
                    <h3 class="widget-title">
                        <?= \Yii::t('app', 'نتیجه استعلام'); ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                if ($result == null) {
                    ?>
                    <div class="alert alert-warning">
                        برای استعلام مورد نظر شما مبلغی ثبت نشده است
                    </div>
                    <?php
                } else {
                    $type = $searchModel->car_type;
                    if (empty($result->$type)) {
                        ?>
                        <div class="alert alert-warning">
                            برای استعلام مورد نظر شما مبلغی ثبت نشده است
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-success ">
                            <h6 class="text-center">

                            قیمت پیش بینی شده توسط
                                <u>
                            <?=\rabint\helpers\option::get('general','title',true,'این شرکت')?>
                                </u>

                            معادل است با :

                            </h6>
                            <div class="spacer"></div>
                            <h5 class="text-center">
                                <strong style="text-align: left; direction: ltr">
                                    <?= number_format($result->$type)?>
                                </strong>
                                    ریال
                            </h5>
                            <div class="spacer"></div>
                            <div class="spacer"></div>
                            <h6 class="text-center">
                                <?=\rabint\helpers\option::get('general','order_text',true,'جهت سفارش لطفا تماس بگیرید')?>
                                <br/>
                                <br/>
                                <p>
                                <a href="<?=\rabint\helpers\uri::to(['/logistic/price/request'])?>" class="btn btn-lg btn-warning"><?=\Yii::t('app','ثبت سفارش باربری');?></a>
                                </p>
                            </h6>

                        </div>
                        <?php
                    }
                }

                ?>
            </div>
        </div>
    <?php } ?>
</div>
