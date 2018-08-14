<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alunoavalia */

$this->title = $model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alunoavalia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'ano' => $model->ano, 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'ano' => $model->ano, 'id' => $model->id], [
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
            'nome',
            'notamedia',
            [
                'attribute' => 'instituicao_id',
                'value' => $model->instituicao->sigla,
            ],
            [
                'attribute' => 'curso_id',
                'value' => $model->curso->nome,
            ],
        ],
    ]) ?>

</div>
