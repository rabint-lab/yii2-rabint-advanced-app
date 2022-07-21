<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\logistic\models\Price */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rabint', 'استعلام قیمت'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'src_state',
            'src_city',
            'dst_state',
            'dst_city',
            'vanet',
            'khavar',
            'tak',
            'joft',
            'tereily',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
