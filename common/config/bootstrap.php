<?php

Yii::setAlias('@base', RABINT_BASE_DIR);

Yii::setAlias('@app', RABINT_APP_DIR);

Yii::setAlias('@common', RABINT_BASE_DIR . '/common');
//Yii::setAlias('@app', RABINT_BASE_DIR . '/app');
#Yii::setAlias('@app', RABINT_BASE_DIR . '/app');
#Yii::setAlias('@backend', RABINT_BASE_DIR . '/backend');
#Yii::setAlias('@api', RABINT_BASE_DIR . '/api');
#Yii::setAlias('@console', RABINT_BASE_DIR . '/console');

Yii::setAlias('@config', RABINT_APP_DIR . '/config');
Yii::setAlias('@web', RABINT_APP_DIR . '/web');

Yii::setAlias('@console', RABINT_BASE_DIR . '/console');
Yii::setAlias('@vendor', RABINT_BASE_DIR . '/vendor');
Yii::setAlias('@rabint', RABINT_BASE_DIR . '/vendor/rabint/base');

Yii::setAlias('@bower', RABINT_BASE_DIR . '/vendor/bower-asset');
Yii::setAlias('@npm', RABINT_BASE_DIR . '/vendor/npm-asset');
Yii::setAlias('@tests', RABINT_APP_DIR . '/tests');

Yii::setAlias('@theme', config('themePath'));
Yii::setAlias('@themeLayouts', config('themePath') . '/views/layouts');

