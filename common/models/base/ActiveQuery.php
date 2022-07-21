<?php
/**
 * Created by PhpStorm.
 * User: mojtaba
 * Date: 4/27/19
 * Time: 8:13 AM
 */

namespace common\models\base;


use rabint\models\MysqlToMongoActiveQuery;

//class ActiveQuery extends MysqlToMongoActiveQuery
class ActiveQuery extends \yii\db\ActiveQuery
{

    /**
     * @return yii\db\Query
     */
    public function otherLangs($id, $langGroupId)
    {
        if ((new $this->modelClass)->hasProperty("otherlang")) {
            $model = new $this->modelClass;
            $tableName = $model->tableName();
            $aray_key = array_keys($this->from);
            if (isset($aray_key[0]) && is_string($aray_key[0])) {
                $tableName = $aray_key[0];
            }


            return $this->andWhere(['<>', $tableName .'.id', $id])
                ->andWhere(
                    [
                        'OR',
                        [$tableName .'.otherlang' => $langGroupId],
                        [$tableName .'.id' => $langGroupId],
                    ]
                );
        }
        return $this;
    }


    public function lang($language = null)
    {
        $model = new $this->modelClass;
        if ($model->hasProperty("lang")) {
            if (empty($language)) {
                $language = \Yii::$app->language;
            }
            $tableName = $model->tableName();
            $aray_key = array_keys($this->from);
            if (isset($aray_key[0]) && is_string($aray_key[0])) {
                $tableName = $aray_key[0];
            }
            $this->andWhere([$tableName . '.lang' => $language]);
            return $this;
        }
        return $this;
    }
}