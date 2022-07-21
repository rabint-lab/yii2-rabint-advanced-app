<?php

/* @var $uid */
/* @var $events \app\modules\event\models\Event[] */

?>
<ul id="event-slider<?= $uid; ?>" class="event-list row">
    <?php foreach ($events as $event) {
        $img = \rabint\attachment\models\Attachment::url($event->thumbnail_id, [290, 430]);
        ?>
        <li >
            <section class="tgv-movie-info">
                <figure>
                    <img class="img-responsive" alt="<?= $event->title ?>" src="<?= $img ?>">
                </figure>
                <?php if (!empty($event->categories[0])) { ?>
                    <section class="tgv-btn-group tgv-movie-customtag coming-soon">
                        <aside class="tgv-btn-primary tgv-btn-block triangle-top-left">
                            <a href="#" class="tgv-btn"><?= $event->categories[0]->title ?></a>
                        </aside>
                    </section>
                <?php } ?>
                <section class="tgv-movie-cont">
                    <section class="tgv-table-row">
                        <article class="tgv-table-col">
                            <h2 class=""><?= $event->title ?></h2>
                            <ul>
                                <li>
                                    <i class="far fa-user"></i>
                                    استاد:
                                    <span class="rtlRight">
                                <?= $event->teacher_name; ?>
                            </span>
                                </li>
                                <li>
                                    <i class="fab fa-stack-overflow"></i>
                                    سمت استاد:
                                    <span class="rtlRight">
                                <?= $event->teacher_post; ?>
                            </span>
                                </li>
                                <li>
                                    <i class="far fa-clock"></i>
                                    مهلت ثبت‌نام:
                                    <span class="rtlRight">
                                <?= \rabint\helpers\locality::anyToJalali($event->end_register, 'j F Y') ?>
                            </span>
                                </li>
                                <li>
                                    <i class="fas fa-clock"></i>
                                    تاریخ برگزاری:
                                    <span>
                                                <?= \rabint\helpers\locality::anyToJalali($event->start_date, 'j F Y') ?>
                                            </span>
                                </li>
                                <!--                <li>-->
                                <!--                    <i class="fas fa-clock"></i>-->
                                <!--                    تاریخ پایان:-->
                                <!--                    <span>-->
                                <!--                                                 --><?php \rabint\helpers\locality::anyToJalali($event->end_date, 'j F Y') ?>
                                <!--                                            </span>-->
                                <!--                </li>-->
                                <!--                        <li>-->
                                <!--                            <i class="fas fa-user-friends"></i>-->
                                <!--                            مناسب برای:-->
                                <!--                            <span>-->
                                <!--                                                 --><?php
                                //                                                 foreach ($event->gender as $gender)
                                //                                                     echo \app\modules\event\models\Event::$genders[$gender] . ' ';
                                //                                                 //                                        pr($event->gender,1);
                                //
                                ?>
                                <!--                                            </span>-->
                                <!--                        </li>-->
                                <!--                                        <li>-->
                                <!--                                            <i class="fas fa-layer-group"></i>-->
                                <!--                                            سطح دوره:-->
                                <!--                                            <span>متوسط</span>-->
                                <!--                                        </li>-->
                                <!--                                        <li>-->
                                <!--                                            <i class="fas fa-exclamation-circle"></i>-->
                                <!--                                            وضعیت دوره:-->
                                <!--                                            <span>در حال برگزاری</span>-->
                                <!--                                        </li>-->
                            </ul>
                            <div class="buy-btn">
                                <?php if (!empty($event->amount_no_off)) { ?>
                                    <h5><s><?= number_format($event->amount_no_off) . ' ریال'; ?></s></h5>
                                <?php } ?>
                                <h5><?= number_format($event->amount) . ' ریال'; ?></h5>
                            </div>
                            <div class="buy-btn">
                                <a href="<?= yii\helpers\Url::to(['/event/event/view-event', 'slug' => $event->slug]); ?>"
                                   class="buy-content-btn">مشاهده و ثبت نام</a>
                            </div>


                        </article>
                    </section>
                </section>
            </section>
        </li>
    <?php } ?>
</ul>

<script>
    <?php ob_start(); ?>
    $(document).ready(function () {
        // $('#moviesection .movieSliders').slick({
        //     rtl: true,
        //     dots: false,
        //     focusOnSelect: true,
        //     centerMode: true,
        //     arrows: true,
        //     slidesToShow: 4,
        //     slidesToScroll: 1,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        //     pauseOnHover: true
        // });
        jQuery('#event-slider<?=$uid;?>').slick({
            rtl: true,
            arrows: true,
            dots: false,
            infinite: true,
            autoplay: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            // speed: 1500,
            // autoplaySpeed: 2000,
            // //centerMode: true,
            cssEase: 'linear',
            pauseOnHover: true,
            // //pauseOnHover: false,
            // //onAfterChange: function() {
            // //	//console.log('after change');
            // //},
            responsive: [{
                breakpoint: 1919,
                settings: {
                    //centerMode: true,
                    centerPadding: '130px',
                    slidesToShow: 5,
                    slidesToScroll: 5
                }
            },
                {
                    breakpoint: 1679,
                    settings: {
                        //centerMode: true,
                        centerPadding: '100px',
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 1599,
                    settings: {
                        //centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 1439,
                    settings: {
                        //centerMode: true,
                        centerPadding: '70px',
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 1279,
                    settings: {
                        //centerMode: true,
                        centerPadding: '70px',
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        //centerMode: true,
                        centerPadding: '60px',
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 815,
                    settings: {
                        //centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        //centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 599,
                    settings: {
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 361,
                    settings: {
                        centerMode: true,
                        centerPadding: '30px',
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
    <?php
    $script = ob_get_clean();
    $this->registerJs($script, $this::POS_END);
    ?>
</script>