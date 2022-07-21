<?php

use yii\bootstrap4\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\PriceLog */


$this->title = Yii::t('rabint', 'Create') .  ' ' . Yii::t('rabint', 'Price Log') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'Price Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box-form price-log-create"  id="ajaxCrudDatatable">

    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
