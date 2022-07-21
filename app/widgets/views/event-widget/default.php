<?php

foreach ($events as $event) {
    ?>
    <div class="col-4 col-sm-4 col-md-3">
        <div class="event_item">
            <a href="<?= \yii\helpers\Url::to(['event/view','slug'=>$event['slug']]) ?>">
                <img src="<?= $event['thumbnail'] ?>" alt="<?= $event['title'] ?>">
            </a>
            <div class="event_options">
                <h4 class="event_title"><a href="<?= \yii\helpers\Url::to(['event/view','slug'=>$event['slug']]) ?>" class=""><?= $event['title'] ?></a></h4>
                <span class="event_desc"><?= $event['director'] ?></span>
                <a class="btn btn-sm btn-custom-alt event_buy" href="<?= \yii\helpers\Url::to(['event/view','slug'=>$event['slug']]) ?>"><?= \Yii::t('app',
                        'خرید بلیت'); ?></a>
            </div>
        </div>
    </div>
    <?php
}