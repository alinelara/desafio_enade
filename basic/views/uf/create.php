<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uf */

$this->title = 'Cadastra Estado';
$this->params['breadcrumbs'][] = ['label' => 'Ufs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
