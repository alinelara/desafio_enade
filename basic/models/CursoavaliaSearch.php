<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cursoavalia;

/**
 * CursoavaliaSearch represents the model behind the search form of `app\models\Cursoavalia`.
 */
class CursoavaliaSearch extends Cursoavalia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano'], 'safe'],
            [['instituicao_id', 'curso_id'], 'integer'],
            [['nota'], 'number'],
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
        $query = Cursoavalia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
        		'query' => $query,
        		'pagination' => [ 'pageSize' => 5 ],
        		'sort' => [
        		'defaultOrder' => [
        			'nota' => SORT_DESC,
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
            'instituicao_id' => $this->instituicao_id,
            'curso_id' => $this->curso_id,
            'nota' => $this->nota,
        ]);

        $query->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }
}
