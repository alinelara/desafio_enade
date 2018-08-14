<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cursoavalia */

$this->title = 'Avalia Curso';
$this->params['breadcrumbs'][] = ['label' => 'Avaliacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoavalia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'listInstituicoes' => $listInstituicoes,
    	'listCursos' => $listCursos,    		
    ]) ?>

</div>
