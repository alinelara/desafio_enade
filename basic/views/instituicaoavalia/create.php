<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Instituicaoavalia */

$this->title = 'Avalia Instituicao';
$this->params['breadcrumbs'][] = ['label' => 'Avaliacao', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituicaoavalia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'listInstituicoes' => $listInstituicoes,
    ]) ?>

</div>
