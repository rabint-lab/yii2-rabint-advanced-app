<?php
/**
* Created by PhpStorm.
 * User: mojtaba
* Date: 4/30/19
* Time: 3:11 AM
*/

namespace common\models;

use Yii;
use common\models\base\ActiveRecord;


/**
 * This is the model class for table "{{%cin_shafaf}}".
 *
 * @property integer $id
* @property string $title
* @property string $en_title
* @property string $state
* @property integer $status
*/
class City extends ActiveRecord
{

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISH = 1;

    public static function tableName()
    {
        return 'system_city';
    }


    public static function statuses()
    {
        return [
            static::STATUS_DRAFT => ['title' => \Yii::t('rabint', 'draft')],
            static::STATUS_PUBLISH => ['title' => \Yii::t('rabint', 'publish')],
            static::STATUS_PUBLISH => ['title' => \Yii::t('rabint', 'publish')],
        ];
    }

    /* ====================================================================== */

/**
* @inheritdoc
*/
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title', 'en_title', 'state'], 'string', 'max' => 190],
        ];
    }

/**
* @inheritdoc
*/
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'status' => Yii::t('app', 'وضعیت'),
            'title' => Yii::t('app', 'عنوان'),
            'en_title' => Yii::t('app', 'عنوان لاتین'),
            'state' => Yii::t('app', 'استان'),
        ];
    }


}