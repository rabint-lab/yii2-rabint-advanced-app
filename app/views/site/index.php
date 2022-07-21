<?php

/* @var $this yii\web\View */

use app\modules\structurer\componnets\ReportTemplateAbstract;
use app\modules\structurer\models\Report;
use rabint\widgets\chart\OrgChartWidget;


$opts = \rabint\option\models\Option::get('general');

$this->title = $opts[0]['subject'];

//$this->title = config('app_name');
$this->context->layout = "@themeLayouts/home";
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
            </div>
        </div>
    </div>
</div>