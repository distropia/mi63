<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hurahura;

/**
 * HurahuraSearch represents the model behind the search form about `app\models\Hurahura`.
 */
class HurahuraSearch extends Hurahura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hurahura_id', 'quantity'], 'integer'],
            [['service', 'owner'], 'safe'],
            [['price'], 'number'],
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
        $query = Hurahura::find();

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
            'hurahura_id' => $this->hurahura_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'owner', $this->owner]);

        return $dataProvider;
    }
}
