<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InstituicaoavaliaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avaliar Instituicao';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituicaoavalia-index">

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
      		[
      			'attribute' => 'instituicao_id',
      			'value' => 'instituicao.sigla',
      			'filter' => $listInstituicoes
      		],			
            'notageral',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
