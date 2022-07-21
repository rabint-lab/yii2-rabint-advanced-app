<?php

namespace app\components\Access;

/**
 * Created by PhpStorm.
 * User: mojtaba
 * Date: 12/30/18
 * Time: 1:27 PM
 */

abstract class AccessAbstract extends \yii\base\BaseObject
{

    abstract public function exportAccessConfig();
}