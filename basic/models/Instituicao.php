<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "instituicao".
 *
 * @property int $id Id da Instituicao
 * @property string $nome Nome da Instituicao
 * @property string $sigla Sigla da Instituicao
 * @property string $tipo Tipo da Instituicao: F-Faculdade | U-Universidade
 * @property int $uf_id Id da UF
 */
class Instituicao extends \yii\db\ActiveRecord
{
	CONST TIPO_U = 'U';
	CONST TIPO_F = 'F';
	
	CONST TIPO_U_STRING = 'Universidade';
	CONST TIPO_F_STRING = 'Faculdade';
	
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instituicao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sigla', 'uf_id'], 'required'],
            [['uf_id'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['sigla'], 'string', 'max' => 10],
            [['tipo'], 'string', 'max' => 1],
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
            'sigla' => 'Sigla',
            'tipo' => 'Tipo',
            'uf_id' => 'UF',
        ];
    }
    
    public function getTipoItems()
    {
    	return [
    	self::TIPO_U => self::TIPO_U_STRING,
    	self::TIPO_F => self::TIPO_F_STRING,
    	];
    }
    
    public function getAllInstituicao()
    {
    	return Instituicao::find()
    	->select('id, sigla')
    	->orderBy('sigla')
    	->where('')
    	->all();
    }
    
    public function getAllInstituicaoAsArray()
    {
    	return ArrayHelper::map($this->getAllInstituicao(), 'id', 'sigla');
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUf()
    {
    	return $this->hasOne(Uf::className(), ['id' => 'uf_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlunoavalia()
    {
    	return $this->hasMany(Alunoavalia::className(), ['instituicao_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicaoavalia()
    {
    	return $this->hasMany(Instituicaoavalia::className(), ['instituicao_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoavalia()
    {
    	return $this->hasMany(Cursoavalia::className(), ['instituicao_id' => 'id']);
    }
    
}
