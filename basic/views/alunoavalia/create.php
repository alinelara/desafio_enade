<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Alunoavalia */

$this->title = 'Avalia Aluno';
$this->params['breadcrumbs'][] = ['label' => 'Avaliacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alunoavalia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'listInstituicoes' => $listInstituicoes,
    	'listCursos' => $listCursos,
]) ?>

</div>
