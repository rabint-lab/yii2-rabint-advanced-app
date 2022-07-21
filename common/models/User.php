<?php
/**
 * Created by PhpStorm.
 * User: mojtaba
 * Date: 11/13/18
 * Time: 10:36 AM
 */

namespace common\models;


class User extends \rabint\user\models\User
{

    /* maturity */
    const MATURITY_UNKNOWN = 0;
    const MATURITY_A = 1;
    const MATURITY_B = 2;
    const MATURITY_C = 4;
    const MATURITY_D = 8;
    const MATURITY_E = 16;
    const MATURITY_F = 32;

//    const MATURITY_G = 64;

    public static function maturites() {
        return [
            self::MATURITY_UNKNOWN => ['title' => \Yii::t('rabint', 'نا مشخص'), 'shortTitle' => \Yii::t('rabint', 'نامشخص')],
            self::MATURITY_A => ['title' => \Yii::t('rabint', 'کمتر از 4 سال'), 'shortTitle' => \Yii::t('rabint', 'زیر الف')],
            self::MATURITY_B => ['title' => \Yii::t('rabint', 'الف- 4 تا 6 سال'), 'shortTitle' => \Yii::t('rabint', 'الف')],
            self::MATURITY_C => ['title' => \Yii::t('rabint', 'ب- 7 تا 11 سال'), 'shortTitle' => \Yii::t('rabint', 'ب')],
            self::MATURITY_D => ['title' => \Yii::t('rabint', 'ج- 12 تا 18 سال'), 'shortTitle' => \Yii::t('rabint', 'ج')],
            self::MATURITY_E => ['title' => \Yii::t('rabint', 'د- 19 تا 30 سال'), 'shortTitle' => \Yii::t('rabint', 'د')],
            self::MATURITY_F => ['title' => \Yii::t('rabint', 'هـ- 30 سال به بالا'), 'shortTitle' => \Yii::t('rabint', 'هـ')],
//            self::MATURITY_G => ['title' => \Yii::t('rabint', 'گروه سنی ز'),'shortTitle' => \Yii::t('rabint', 'ز')],
        ];
    }
}
