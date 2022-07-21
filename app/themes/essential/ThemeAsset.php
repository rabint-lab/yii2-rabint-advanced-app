<?php

namespace app\themes\essential;

use Yii;
use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{

    public $publishOptions = ['forceCopy' => true];
    public $sourcePath = '@app/themes/essential/web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
//        'rabint\assets\Bootstrap4RtlAsset',
        'rabint\assets\CommonAsset',
        'rabint\assets\font\VazirAsset',
        //        'rabint\assets\FontAwesomeAsset',
    ];

}


