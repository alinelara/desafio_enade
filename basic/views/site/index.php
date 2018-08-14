<?php

/* @var $this yii\web\View */
use \yii\grid\GridView;
use \yii\widgets\LinkPager;
use \yii\widgets\Pjax;
use \yii\helpers\ArrayHelper;
use \app\models\Instituicao;
use \app\models\Instituicaoavalia;
use \app\models\InstituicaoSearch;

$this->title = 'Ranking Enade Anual';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Ranking Enade</h1>

        <p class="lead">Classificacao das Instituicoes segundo a nota do Enade</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProviderInstituicao,
                    'filterModel' => $searchModelInstituicao,
                    'columns' => [
			            'ano',
                    	[
                       		'attribute' => 'instituicao.id',
                       		'label' => 'Instituicao',
                       		'value' => 'instituicao.sigla',
			      			'filter' => $listInstituicoes
						],						
                    						
						'notageral',
                    ],
                ]);?>
			                
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
