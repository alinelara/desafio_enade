<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alunoavalia".
 *
 * @property string $ano Ano de Avaliacao do Aluno
 * @property int $id Id do Aluno
 * @property string $nome Nome do Aluno
 * @property string $notamedia Nota Media do Aluno
 * @property int $instituicao_id Id da Instituicao
 * @property int $curso_id Id do Curso
 */
class Alunoavalia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alunoavalia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano', 'nome', 'instituicao_id', 'curso_id'], 'required'],
            [['notamedia'], 'number'],
            [['instituicao_id', 'curso_id'], 'integer'],
            [['ano'], 'string', 'max' => 4],
            [['nome'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ano' => 'Ano',
            'id' => 'Id',
            'nome' => 'Nome',
            'notamedia' => 'Nota Media',
            'instituicao_id' => 'Instituicao',
            'curso_id' => 'Curso',
        ];
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
