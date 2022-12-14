<?php

namespace app\modules\logistic\models;

use Yii;

/**
 * This is the model class for table "lgst_request".
 *
 * @property integer $id
 * @property string $title
 * @property string $cellphone
 * @property string $src_state
 * @property string $src_city
 * @property string $dst_state
 * @property string $dst_city
 * @property string $request_type
 * @property string $car_feature
 * @property integer $weight
 * @property string $packing
 * @property string $status
 * @property string $note
 * @property string $status_note
 * @property integer $allow_rule
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Request extends \common\models\base\ActiveRecord     /* \yii\db\ActiveRecord */
{
    const SCENARIO_CREATE = 'create';
    /* statuses */
    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING = 'pending';
    const STATUS_DONE = 'done';

    public $captcha;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lgst_request';
    }


    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => time(),
            ],
            [
                'class' => \yii\behaviors\BlameableBehavior::class,
                'createdByAttribute' => false,
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['title', 'cellphone','src_city',  'dst_city', 'request_type','car_feature', 'weight', 'packing', 'note', 'allow_rule','captcha'];
        return $scenarios;
    }


    /* ====================================================================== */

    public static function statuses()
    {
        return [
            static::STATUS_DRAFT => ['title' => \Yii::t('rabint', '??????????????')],
            static::STATUS_PENDING => ['title' => \Yii::t('rabint', '?????????? ??????????')],
            static::STATUS_DONE => ['title' => \Yii::t('rabint', '?????????? ??????')],
        ];
    }

    /* ====================================================================== */

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cellphone', 'src_city', 'dst_city', 'request_type', 'weight', 'packing', 'note', 'allow_rule'], 'required'],
            [['weight', 'allow_rule', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            ['allow_rule', 'compare', 'compareValue' => 1, 'operator' => '==', 'type' => 'number','message'=>'?????? ???????? ???????????? ???? ??????????????.'],
            [['note', 'status_note'], 'string'],
            [['title' , 'src_city', 'dst_city', 'request_type', 'car_feature', 'packing'], 'string', 'max' => 190],
            [['cellphone'], 'string', 'min' => 11, 'max' => 13],
            [['status'], 'string', 'max' => 10],
            [['captcha'], 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '??????????'),
            'title' => Yii::t('app', '?????????? ??????'),
            'cellphone' => Yii::t('app', '???????? ??????????'),
            'src_city' => Yii::t('app', '?????? ????????'),
            'dst_city' => Yii::t('app', '?????? ????????'),
            'request_type' => Yii::t('app', '???????????? ????????????????'),
            'car_feature' => Yii::t('app', '?????????? ????????????'),
            'weight' => Yii::t('app', '?????? ?????? ???? ????'),
            'packing' => Yii::t('app', '?????? ???????? ????????'),
            'status' => Yii::t('app', '?????????? ??????????????'),
            'note' => Yii::t('app', '?????????????? ??????'),
            'status_note' => Yii::t('app', '?????????????? ???????????? ??????????????'),
            'allow_rule' => Yii::t('app', '???????????? ?????????????? ??????'),
            'created_at' => Yii::t('app', '?????????? ??????????????'),
            'updated_at' => Yii::t('app', '?????????? ??????????????????'),
            'created_by' => Yii::t('app', '?????????????? ??????????'),
            'updated_by' => Yii::t('app', '?????????? ??????????'),
            'captcha' => Yii::t('app', '???? ????????????'),
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


    /**
     * @inheritdoc
     * @return \rabint\models\query\PublishQuery the active query used by this AR class.
     */
    //public static function find()
    //{
    //    $publishQuery = new \rabint\models\query\PublishQuery(get_called_class());
    //    $publishQuery->statusField="status";
    //    $publishQuery->activeStatusValue=self::STATUS_PUBLISH;
    //    $publishQuery->ownerField="creator_id";
    //    $publishQuery->showNotActiveToOwners=true;
    //    return $publishQuery;
    //}

}
