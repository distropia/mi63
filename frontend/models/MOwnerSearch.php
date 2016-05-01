<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Mowner;

/**
 * MownerSearch represents the model behind the search form about `frontend\models\Mowner`.
 */
class MownerSearch extends Mowner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id'], 'integer'],
            [['owner_name'], 'safe'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Mowner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'owner_id' => $this->owner_id,
        ]);

        $query->andFilterWhere(['like', 'owner_name', $this->owner_name]);

        return $dataProvider;
    }
}
