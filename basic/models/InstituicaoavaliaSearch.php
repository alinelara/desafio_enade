<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instituicaoavalia;

/**
 * InstituicaoavaliaSearch represents the model behind the search form of `app\models\Instituicaoavalia`.
 */
class InstituicaoavaliaSearch extends Instituicaoavalia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano'], 'safe'],
            [['instituicao_id'], 'integer'],
            [['notageral'], 'number'],
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
        $query = Instituicaoavalia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
        		'query' => $query,
        		'pagination' => [ 'pageSize' => 5 ],
        		'sort' => [
        		'defaultOrder' => [
        			'notageral' => SORT_DESC,
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
            'notageral' => $this->notageral,
        ]);

        $query->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchAll($params)
    {
    	$query = Instituicaoavalia::find()
    	->leftJoin('cursoavalia', '`instituicaoavalia`.`instituicao_id` = `cursoavalia`.`instituicao_id`')
    	->select('instituicaoavalia.ano, cursoavalia.instituicao_id, 
    			cursoavalia.curso_id, cursoavalia.nota, instituicaoavalia.notageral')
    	->orderBy('cursoavalia.nota desc')
    	->where('')
    	->all();
    	// add conditions that should always apply here
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			'pagination' => [ 'pageSize' => 5 ],
    			'sort' => [
    			'defaultOrder' => [
    			'notageral' => SORT_DESC,
    			]
    			],
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	return $dataProvider;
    }
    
}
