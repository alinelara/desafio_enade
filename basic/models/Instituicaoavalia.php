<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituicaoavalia".
 *
 * @property string $ano Ano da Avaliacao
 * @property int $instituicao_id Id da Instituicao
 * @property string $notageral Nota Geral da Instituicao
 */
class Instituicaoavalia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instituicaoavalia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ano', 'instituicao_id', 'notageral'], 'required'],
            [['instituicao_id'], 'integer'],
            [['notageral'], 'number'],
            [['ano'], 'string', 'max' => 4],
            [['ano', 'instituicao_id'], 'unique', 'targetAttribute' => ['ano', 'instituicao_id']],
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
            'notageral' => 'Nota Geral',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstituicao()
    {
    	return $this->hasOne(Instituicao::className(), ['id' => 'instituicao_id']);
    }
    
}
