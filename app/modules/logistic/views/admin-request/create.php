<?php

use yii\bootstrap4\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Request */


$this->title = Yii::t('app', 'Create') .  ' ' . Yii::t('app', 'Request') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box-form request-create"  id="ajaxCrudDatatable">

    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
