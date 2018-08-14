<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituicoes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituicao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cadastrar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'sigla',
            [
                'attribute' => 'tipo',
                'value' => 'tipo',
                'filter' => [
                     $searchModel::TIPO_U => $searchModel::TIPO_U_STRING , 
                     $searchModel::TIPO_F => $searchModel::TIPO_F_STRING
                ],
      		],
      		[
      			'attribute' => 'uf_id',
      			'value' => 'uf.nome',
      			'filter' => $listUfs
      		],			

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
