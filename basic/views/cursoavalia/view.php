<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cursoavalia */

$this->title = $model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoavalia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id, 'curso_id' => $model->curso_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id, 'curso_id' => $model->curso_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ano',
            [
                'attribute' => 'instituicao_id',
                'value' => $model->instituicao->sigla,
            ],
            [
                'attribute' => 'curso_id',
                'value' => $model->curso->nome,
            ],
            'nota',
        ],
    ]) ?>

</div>
