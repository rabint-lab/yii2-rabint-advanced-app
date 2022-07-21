<?php

use yii\bootstrap4\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Price */


$this->title = Yii::t('rabint', 'Create') .  ' ' . Yii::t('rabint', 'رکورد قیمت') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'استعلام قیمت'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box-form price-create"  id="ajaxCrudDatatable">

    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
