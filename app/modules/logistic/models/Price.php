<?php

namespace app\modules\logistic\models;

use rabint\services\sms\webservice\ghasedak;
use Yii;
use rabint\services\sms\sms;
/**
 * This is the model class for table "lgst_price".
 *
 * @property integer $id
 * @property string $src_state
 * @property string $src_city
 * @property string $dst_state
 * @property string $dst_city
 * @property integer $vanet
 * @property integer $khavar
 * @property integer $b911
 * @property integer $tak
 * @property integer $joft
 * @property integer $tereily
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Price extends \common\models\base\ActiveRecord     /* \yii\db\ActiveRecord */
{

    public $price_type;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lgst_price';
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
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /* ====================================================================== */
    public static function types()
    {
        return [
            'vanet' => ['title' => Yii::t('app', 'وانت یا نیسان'),'sms_price_template'=>'Amintarabarvanet',],
            'khavar' => ['title' => Yii::t('app', 'خاور'),'sms_price_template'=>'Amintarabarkhavar',],
            'b911' => ['title' => Yii::t('app', 'کامیون 911'),'sms_price_template'=>'Amintarabarkhavar911',],
            'tak' => ['title' => Yii::t('app', 'کامیون تک(شش چرخ)'),'sms_price_template'=>'Amintarabartak',],
            'joft' => ['title' => Yii::t('app', 'کامیون جفت(ده چرخ)'),'sms_price_template'=>'Amintarabarjoft',],
            'tereily' => ['title' => Yii::t('app', 'تریلی'),'sms_price_template'=>'Amintarabartrilly',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['src_state', 'src_city', 'dst_state', 'dst_city', 'b911', 'khavar', 'tak', 'joft', 'tereily'], 'required'],
            [['vanet', 'khavar','b911', 'tak', 'joft', 'tereily', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['src_state', 'src_city', 'dst_state', 'dst_city'], 'string', 'max' => 190],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'src_state' => Yii::t('app', 'استان مبدا'),
            'src_city' => Yii::t('app', 'شهر مبدا'),
            'dst_state' => Yii::t('app', 'استان مقصد'),
            'dst_city' => Yii::t('app', 'شهر مقصد'),
            'vanet' => Yii::t('app', 'وانت ، نیسان'),
            'khavar' => Yii::t('app', 'خاور'),
            'b911' => Yii::t('app', 'کامیون 911'),
            'tak' => Yii::t('app', 'کامیون تک(شش چرخ)'),
            'joft' => Yii::t('app', 'کامیون جفت(ده چرخ)'),
            'tereily' => Yii::t('app', 'تریلی'),
            'price_type' => Yii::t('app', 'نوع وسیله نقلیه'),
            'created_at' => Yii::t('app', 'ایجاد در'),
            'updated_at' => Yii::t('app', 'بروزرسانی در'),
            'created_by' => Yii::t('app', 'ایجاد توسط'),
            'updated_by' => Yii::t('app', 'بروزرسانی توسط'),
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

    public static function sendSmsPrice($type,$cell,$sms_papram){
        $typeTemplate = self::types()[$type]['sms_price_template']??'default';
        if($typeTemplate=='default'){
            return false;
        }
        $last = PriceLog::find()->where(['cellphone'=>$cell])->select('created_at')->orderBy(['created_at'=>SORT_DESC])->scalar();
        if($last+300 >= time()){
            return false;
        }

        $service = sms::getService();
        $service->verifyTemplete= $typeTemplate;
        try {
            return $service->sendVerifySms($cell, $sms_papram);
        } catch (\Exception $ex) {
//            var_dump($ex);
            return FALSE;
        }
    }


}
