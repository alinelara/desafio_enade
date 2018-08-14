<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "uf".
 *
 * @property int $id Id da UF
 * @property string $nome Nome da UF
 * @property string $sigla Sigla da UF
 */
class Uf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sigla'], 'required'],
            [['nome'], 'string', 'max' => 20],
            [['sigla'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
        	'id' => Yii::t('app', 'ID'),
        	'nome' => Yii::t('app', 'Nome'),
        	'sigla' => Yii::t('app', 'Sigla'),
        ];        
    }

    public function getAllUf()
    {
    	return Uf::find()
    	->select('id, nome')
    	->orderBy('nome')
    	->where('')
    	->all();
    }
    
    public function getAllUfAsArray()
    {
    	return ArrayHelper::map($this->getAllUf(), 'id', 'nome');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicao()
    {
    	return $this->hasMany(Instituicao::className(), ['uf_id' => 'id']);
    }
    
}
