<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alunoavalia;

/**
 * AlunoavaliaSearch represents the model behind the search form of `app\models\Alunoavalia`.
 */
class AlunoavaliaSearch extends Alunoavalia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano', 'nome'], 'safe'],
            [['id', 'instituicao_id', 'curso_id'], 'integer'],
            [['notamedia'], 'number'],
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
        $query = Alunoavalia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
        		'query' => $query,
        		'pagination' => [ 'pageSize' => 5 ],
        		'sort' => [
        		'defaultOrder' => [
        			'notamedia' => SORT_DESC,
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
            'notamedia' => $this->notamedia,
            'instituicao_id' => $this->instituicao_id,
            'curso_id' => $this->curso_id,
        ]);

        $query->andFilterWhere(['like', 'ano', $this->ano])
            ->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
