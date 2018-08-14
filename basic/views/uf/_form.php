<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uf */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uf-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-5">
    		<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    	</div>
    
    	<div class="col-md-3">
    		<?= $form->field($model, 'sigla')->textInput(['maxlength' => true]) ?>
       	</div>
   </div> 	
    
    <div class="form-group">
        <?= Html::submitButton('Inserir', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
