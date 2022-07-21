<?php

/* @var $this yii\web\View */
$opts = \rabint\option\models\Option::get('about');

$this->title = $opts[0]['page_title'];
?>
<section class="section homeSection section-redcircle section-alt">
    <div class="container">
        <div class="spacer"></div>
        <div class="spacer"></div>
        <div class="spacer"></div>

        <div class="about">
            <div class="about_content">
                <p>
                    <?= $opts[0]['page_text']; ?>
                </p>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="spacer"></div>
        <div class="spacer"></div>
        <div class="spacer"></div>

    </div>
</section>
