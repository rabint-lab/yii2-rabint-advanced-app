<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\PriceLog */

$this->title = Yii::t('rabint', 'Update') .  ' ' . Yii::t('rabint', 'Price Log') . ' «' . $model->id .'»';
$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'Price Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('rabint', 'Update');
?>

<div class="box-form price-log-update"  id="ajaxCrudDatatable">

    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
