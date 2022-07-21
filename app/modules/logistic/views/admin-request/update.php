<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Request */

$this->title = Yii::t('app', 'Update') .  ' ' . Yii::t('app', 'درخواست') . ' «' . $model->title .'»';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'درخواست ها'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="box-form request-update"  id="ajaxCrudDatatable">

    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
