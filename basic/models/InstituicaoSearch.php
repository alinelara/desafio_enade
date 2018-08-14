<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instituicao;

/**
 * InstituicaoSearch represents the model behind the search form of `app\models\Instituicao`.
 */
class InstituicaoSearch extends Instituicao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'uf_id'], 'integer'],
            [['nome', 'sigla', 'tipo'], 'safe'],
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
        $query = Instituicao::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => [ 'pageSize' => 5 ],
        	'sort' => [
        		'defaultOrder' => [
        			'nome' => SORT_ASC,
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
            'uf_id' => $this->uf_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sigla', $this->sigla])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
