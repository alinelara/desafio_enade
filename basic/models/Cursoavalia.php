<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cursoavalia".
 *
 * @property string $ano Ano de Avaliacao do Curso
 * @property int $instituicao_id Id da Instituicao
 * @property int $curso_id Id do Curso
 * @property string $nota
 */
class Cursoavalia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursoavalia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano', 'instituicao_id', 'curso_id'], 'required'],
            [['instituicao_id', 'curso_id'], 'integer'],
            [['nota'], 'number'],
            [['ano'], 'string', 'max' => 4],
            [['ano', 'instituicao_id', 'curso_id'], 'unique', 'targetAttribute' => ['ano', 'instituicao_id', 'curso_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ano' => 'Ano',
            'instituicao_id' => 'Instituicao',
            'curso_id' => 'Curso',
            'nota' => 'Nota',
        ];
    }
    
    public function getAllCursoavalia()
    {
    	return Curso::find()
    	->JoinWith('cursoavalia')
    	->select('id, nome, ano, instituicao_id, curso_id, nota')
    	->orderBy('nota desc')
    	->where('')
    	->all();
    	 
    }
    
    public function getAllCursoavaliaAsArray()
    {
    	return ArrayHelper::map($this->getAllCursoavalia(), 'id', 'nome');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicao()
    {
    	return $this->hasOne(Instituicao::className(), ['id' => 'instituicao_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
    	return $this->hasOne(Curso::className(), ['id' => 'curso_id']);
    }
    
}
