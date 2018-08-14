<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CursoavaliaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avaliar Curso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoavalia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <p>
        <?= Html::a('Avaliar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ano',
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
            'nota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
