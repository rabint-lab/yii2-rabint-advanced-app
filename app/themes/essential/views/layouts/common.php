<?php

use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@themeLayouts/base.php');

$menusConf = include Yii::getAlias("@app/config/menus.php");

$ModuleMenu = [];
$modules = include(Yii::getAlias('@app/config/modules.php'));
foreach ((array)$modules as $item) {
    $moduleClass = $item['class'];
    if (method_exists($moduleClass, 'DashboardMenu')) {
        $ModuleMenu[] = call_user_func([$moduleClass, 'DashboardMenu']);
    }
}

$menus = \yii\helpers\ArrayHelper::merge(
#first menu
#main site menu
    \rabint\helpers\collection::getValue($menusConf, 'main', []),
#module menu
//    $ModuleMenu,
#last menu
    [

        Yii::$app->user->isGuest ? (['label' => Yii::t('rabint', 'ورود'), 'url' => ['/user/sign-in/login']]) : (

        [
            'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
            'visible' => !Yii::$app->user->isGuest,
            'items' => [
                [
                    'label' => Yii::t('rabint', 'داشبورد'),
                    'url' => ['/user/default/index']
                ],
                [
                    'label' => Yii::t('rabint', 'ویرایش پروفایل'),
                    'url' => ['/user/default/profile']
                ],
                [
                    'label' => Yii::t('rabint', 'پنل مدیریت'),
                    'url' => ['/user/admin/index'],
                    'visible' => rabint\helpers\user::can('loginToBackend')
                ],
                [
                    'label' => Yii::t('rabint', 'خروج'),
                    'url' => ['/user/sign-in/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ]
            ]
        ]
        ),
    ]);


?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
//            'renderInnerContainer' =>false,
            'options' => [
                'class' => 'navbar-inverse navbar-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => $menus,
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; rabint <?= date('Y') ?></p>
        </div>
    </footer>
<?php $this->endContent() ?>