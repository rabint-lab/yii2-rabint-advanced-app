<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
?>
<div class = "site-error">

    <h1><?= \Yii::t('rabint', 'درخواست شما نا معتبر است'); ?></h1>

    <div class="alert alert-danger">
        <?php echo nl2br(Html::encode($message)) ?>
    </div>

    <p class="class">
        <?= \Yii::t('rabint', 'کاربر گرامی !'); ?>
    <ul class="class">
        <li> <?= \Yii::t('rabint', 'پارامتر های ارسالی شما ناقص است'); ?></li>
    </ul>

</p>

</div>
