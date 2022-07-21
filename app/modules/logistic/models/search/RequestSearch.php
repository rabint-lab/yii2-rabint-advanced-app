<?php

namespace app\modules\logistic\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\logistic\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\modules\logistic\models\Request`.
 */
class RequestSearch extends Request
{

    //var $keyword;
    //var $created_from;
    //var $created_to;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weight', 'allow_rule', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'cellphone', 'src_state', 'src_city', 'dst_state', 'dst_city', 'request_type', 'car_feature', 'packing', 'status', 'note', 'status_note'], 'safe'],
            //[['created_from', 'created_to', 'keyword'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return parent::attributeLabels() + [
             //'created_from' =>  Yii::t('app', 'Created from'),
             //'created_to' =>  Yii::t('app', 'Created to'),
             //'keyword' =>  Yii::t('app', 'Keyword'),
        ];
    }
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param boolean $returnActiveQuery
     *
     * @return ActiveDataProvider | ActiveQuery
     */
    public function search($params,$returnActiveQuery = FALSE)
    {
        $query = Request::find();//->alias('request');

        // add conditions that should always apply here

        $sort = ['id' => SORT_DESC];
        //$query->orderBy($sort);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => $sort]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $returnActiveQuery ? $query : $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'weight' => $this->weight,
            'allow_rule' => $this->allow_rule,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'cellphone', $this->cellphone])
            ->andFilterWhere(['like', 'src_state', $this->src_state])
            ->andFilterWhere(['like', 'src_city', $this->src_city])
            ->andFilterWhere(['like', 'dst_state', $this->dst_state])
            ->andFilterWhere(['like', 'dst_city', $this->dst_city])
            ->andFilterWhere(['like', 'request_type', $this->request_type])
            ->andFilterWhere(['like', 'car_feature', $this->car_feature])
            ->andFilterWhere(['like', 'packing', $this->packing])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'status_note', $this->status_note]);


        // if (!empty($this->creator_id) && is_string($this->creator_id)) {
        //     $exp1 = new \yii\db\Expression(
        //         "creator_id in (SELECT user_id from user_profile  WHERE " .
        //             "firstname like :keyword or  " .
        //             "lastname like :keyword or  " .
        //             "nickname like :keyword )",
        //         ['keyword' => '%' . $this->creator_id . '%']
        //     );
        //     $query->andWhere($exp1);
        // } else {
        //     $query->andFilterWhere([
        //         'contact_id' => $this->creator_id,
        //     ]);
        // }
        
        //if (!empty($this->keyword)) {
        //    $query->andFilterWhere([
        //        'OR',
        //        ['title'=>$this->keyword],
        //        //['decription'=>$this->keyword],
        //    ]);
        //
        //    //$exp1 = new \yii\db\Expression(
        //    //        "id in (SELECT user_id from user_profile  WHERE " .
        //    //        //  "firstname like '%:keyword%' or  ".
        //    //        //  "lastname like '%:keyword%' or  ".
        //    //        "nickname like ':keyword')", 
        //    //     ['keyword' => '%'.$this->keyword.'%']);
        //    //$query->andWhere($exp1);
        //}

        /**
         * date filters:
         */
        //if (!empty($this->created_at)) {
        //    $from = locality::anyToGregorian($this->created_at);
        //    $to = locality::anyToGregorian($this->created_at+86400);
        //    $query->andFilterWhere(['>=', 'created_at', $from]);
        //    $query->andFilterWhere(['<=', 'created_at', $to]);
        //}
        //
        //if (!empty($this->created_from)) {
        //    $this->created_from = locality::anyToGregorian($this->created_from);
        //    $query->andFilterWhere(['>=', 'created_at', $this->created_from]);
        //}
        //if (!empty($this->created_to)) {
        //    $this->calldate_ = locality::anyToGregorian($this->created_to);
        //    $query->andFilterWhere(['<=', 'created_at', $this->created_to]);
        //}
        


        if ($returnActiveQuery) {
            return $query;
        }
        return $returnActiveQuery ? $query : $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param boolean $returnActiveQuery
     *
     * @return ActiveDataProvider | ActiveQuery
     */
    public static function searchFactory($params, $returnActiveQuery = FALSE, $shortParams = true)
    {
        $new = new self();
        if ($shortParams) {
            $modelName = basename(str_replace('\\', '/', self::class));
            $newParams = [$modelName => $params];
        }
        return $new->search($newParams, $returnActiveQuery);
    }
}
