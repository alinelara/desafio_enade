<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id Id do Curso
 * @property string $nome Nome do Curso
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'nome' => 'Nome',
        ];
    }
    
    public function getAllCurso()
    {
    	return Curso::find()
    	->select('id, nome')
    	->orderBy('nome')
    	->where('')
    	->all();
    }
    
    public function getAllCursoAsArray()
    {
    	return ArrayHelper::map($this->getAllCurso(), 'id', 'nome');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoavalia()
    {
    	return $this->hasMany(Alunoavalia::className(), ['curso_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoavalia()
    {
    	return $this->hasMany(Cursoavalia::className(), ['curso_id' => 'id']);
    }
    
    
}
