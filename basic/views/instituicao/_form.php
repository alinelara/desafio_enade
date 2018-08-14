<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-7">
    		<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
		</div>
    </div>

    <div class="row">
    	<div class="col-md-2">
		    <?= $form->field($model, 'sigla')->textInput(['maxlength' => true]) ?>
    	</div>
	    <div class="col-md-2">		    
		    <?= $form->field($model, 'uf_id')->dropdownList(
		               $listUfs,
		               ['prompt' => Yii::t('app', 'Selecione')]); ?>
        </div>
    	<div class="col-md-3">
		    <?= $form->field($model, 'tipo')->radioList($model->getTipoItems()) ?> 
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('Inserir', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
