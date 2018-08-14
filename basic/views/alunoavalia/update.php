<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alunoavalia */

$this->title = 'Atualiza Aluno: ' . $model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ano, 'url' => ['view', 'ano' => $model->ano, 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alunoavalia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'listInstituicoes' => $listInstituicoes,
    	'listCursos' => $listCursos,
    ]) ?>

</div>
