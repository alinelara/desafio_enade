<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cursoavalia */

$this->title = 'Atualiza Curso: ' . $model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ano, 'url' => ['view', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id, 'curso_id' => $model->curso_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursoavalia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'listInstituicoes' => $listInstituicoes,
    	'listCursos' => $listCursos,
	]) ?>

</div>
