<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Alunoavalia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alunoavalia-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2">
    		<?= $form->field($model, 'ano')->textInput(['maxlength' => true]) ?>
		</div>
        <div class="col-md-2">
		    <?= $form->field($model, 'instituicao_id')->dropdownList(
		               $listInstituicoes,
		               ['prompt' => Yii::t('app', 'Selecione')]); ?>
   		</div>
        <div class="col-md-3">
		    <?= $form->field($model, 'curso_id')->dropdownList(
		               $listCursos,
		               ['prompt' => Yii::t('app', 'Selecione')]); ?>
  		</div>	
	</div>

    <div class="row">
        <div class="col-md-5">
    		<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
		</div>
        <div class="col-md-2">
    		<?= $form->field($model, 'notamedia')->textInput(['maxlength' => true]) ?>
		</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton('Inserir', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
