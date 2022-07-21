<?php

namespace app\modules\logistic\models;

use Yii;

/**
 * This is the model class for table "lgst_price_log".
 *
 * @property integer $id
 * @property string $cellphone
 * @property string $src_state
 * @property string $src_city
 * @property string $dst_state
 * @property string $dst_city
 * @property string $request_type
 * @property integer $created_at
 * @property integer $created_by
 */
class PriceLog extends \common\models\base\ActiveRecord     /* \yii\db\ActiveRecord */
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lgst_price_log';
    }


    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => time(),
            ],
            [
                'class' => \yii\behaviors\BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false,
            ],
        ];
    }


    /* ====================================================================== */

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cellphone', 'src_state', 'src_city', 'dst_state', 'dst_city', 'request_type'], 'required'],
            [['created_at', 'created_by'], 'integer'],
            [['cellphone'], 'string', 'max' => 130],
            [['src_state', 'src_city', 'dst_state', 'dst_city'], 'string', 'max' => 190],
            [['request_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'cellphone' => Yii::t('app', 'تلفن'),
            'src_state' => Yii::t('app', 'استان مبدا'),
            'src_city' => Yii::t('app', 'شهر مبدا'),
            'dst_state' => Yii::t('app', 'استان مقصد'),
            'dst_city' => Yii::t('app', 'شهر مقصد'),
            'request_type' => Yii::t('app', 'نوع خودرو'),
            'created_at' => Yii::t('app', 'تاریخ'),
            'created_by' => Yii::t('app', 'شناسه کاربر'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
//if(!empty($this->publish_at)){
//    $this->publish_at = \rabint\helpers\locality::anyToGregorian($this->publish_at);
//    $this->publish_at = strtotime($this->publish_at);// if timestamp needs
//}
        return parent::beforeSave($insert);
    }


}
