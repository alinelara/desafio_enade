<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicaoavalia */

$this->title = 'Atualiza Instituicao: ' . $model->ano;
$this->params['breadcrumbs'][] = ['label' => 'Instituicoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ano, 'url' => ['view', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instituicaoavalia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'listInstituicoes' => $listInstituicoes,
    ]) ?>

</div>
