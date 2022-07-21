<?php

/* @var $this yii\web\View */

$this->title = \Yii::t('app', 'گزارش');
$this->context->layout = "@themeLayouts/home";
?>
<h3><?= \rabint\helpers\option::appName(); ?></h3>
<p><?= \Yii::t('app', 'به پیشخوان مدیریت پایگاه خوش امدید'); ?></p>
