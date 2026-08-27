<?php

namespace app\modules\account\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Application;
use Yii;

/**
 * AccountSearch represents the model behind the search form of `app\models\Application`.
 */
class AccountSearch extends Application
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'user_id'], 'integer'],
            [['name', 'email', 'phone', 'branch', 'date_str', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Application::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'attributes' => ['created_at'],
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_str' => $this->date_str,
            'created_at' => $this->created_at,
            'status_id' => $this->status_id,
            'user_id' => Yii::$app->user->id,
            //'user_id' => Yii::$app->user->id,
        ]);

        //$query//->andFilterWhere(['like', 'name', $this->name])
            //->andFilterWhere(['like', 'email', $this->email])
            //->andFilterWhere(['like', 'phone', $this->phone])
            //->andFilterWhere(['like', 'branch', $this->branch]);

        return $dataProvider;
    }
}
