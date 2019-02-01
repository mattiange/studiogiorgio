<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VoceMenu;

/**
 * VoceMenuSearch represents the model behind the search form about `app\models\VoceMenu`.
 */
class VoceMenuSearch extends VoceMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idVoceMeu', 'menu_id'], 'integer'],
            [['voce'], 'safe'],
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
        $query = VoceMenu::find();

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
            'idVoceMeu' => $this->idVoceMeu,
            'menu_id' => $this->menu_id,
        ]);

        $query->andFilterWhere(['like', 'voce', $this->voce]);

        return $dataProvider;
    }
}
