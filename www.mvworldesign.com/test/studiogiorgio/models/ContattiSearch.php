<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contatti;

/**
 * ContattiSearch represents the model behind the search form of `app\models\Contatti`.
 */
class ContattiSearch extends Contatti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idContatto'], 'integer'],
            [['voce', 'visualizzare', 'icona', 'campo', 'callToAction'], 'safe'],
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
        $query = Contatti::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idContatto' => $this->idContatto,
        ]);

        $query->andFilterWhere(['like', 'voce', $this->voce])
            ->andFilterWhere(['like', 'visualizzare', $this->visualizzare])
            ->andFilterWhere(['like', 'icona', $this->icona])
            ->andFilterWhere(['like', 'campo', $this->campo])
            ->andFilterWhere(['like', 'callToAction', $this->callToAction]);

        return $dataProvider;
    }
}
