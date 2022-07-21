<?php
/**
 * Created by PhpStorm.
 * User: mojtaba
 * Date: 4/29/19
 * Time: 7:43 AM
 */

namespace common\controllers;




class ApiController extends \rabint\controllers\ApiController
{
public function errorCodes()
{
    $def = parent::errorCodes();
    //reserve errors
    $def[2] = \Yii::t('app','رویداد یافت نشد');
    $def[3] = \Yii::t('app','اکران یافت نشد');
    $def[4] = \Yii::t('app','صندلی انتخاب نشده است ');
    $def[5] = \Yii::t('app','فرمت ارسال صندلی نامعتبر است');
    $def[6] = \Yii::t('app','صندلی ارسال شده در اکران موجود نیست');
    $def[7] = \Yii::t('app','جایگاه ارسال شده برای این اکران معتبر نیست ');
    $def[8] = \Yii::t('app','صندلی  رزرو شده است  ');

    return $def;
}
}