<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use rabint\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\logistic\models\search\PriceLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rabint', 'Price Logs');
$this->params['breadcrumbs'][] = $this->title;

$this->context->layout = "@themeLayouts/full";


?>

<div class="price-log-index"  id="ajaxCrudDatatable">
        
    <h2 class="ajaxModalTitle" style="display: none"><?=  $this->title; ?></h2>
    <div class="content-search">
        <?php echo $this->render('_search',['model'=>$searchModel]);?>
    </div>
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'showAddBtn'=>false,
            'columns' => require(__DIR__.'/_columns.php'),
            'modelTitle' => Yii::t('rabint', 'گزارش استعلام قیمت'),
//            'bulkActions' => $this->context::bulkActions(),
        ])?>
    </div>
</div>
