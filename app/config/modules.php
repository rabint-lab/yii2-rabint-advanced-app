<?php

$appOnlyModules =  [
    
];

$commonModuls = require RABINT_BASE_DIR . '/common/config/modules.php';

return yii\helpers\ArrayHelper::merge($commonModuls, $appOnlyModules);
