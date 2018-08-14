<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlunoavaliaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avaliar Aluno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alunoavalia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Avaliar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ano',
            'nome',
            'notamedia',
      		[
      			'attribute' => 'instituicao_id',
      			'value' => 'instituicao.sigla',
      			'filter' => $listInstituicoes
      		],			
      		[
      			'attribute' => 'curso_id',
      			'value' => 'curso.nome',
      			'filter' => $listCursos
      		],			
      		
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
