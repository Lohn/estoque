<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
	'options' => [
		'class' => 'form-horizontal'
	]
]); ?>

<?= $form->field($model, 'nome', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->textInput() ?>

<?= $form->field($model, 'email', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->widget(MaskedInput::className(), [
	'clientOptions' => [
		'alias' => 'email'
	],
]) ?>

<?= $form->field($model, 'telefone', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->widget(MaskedInput::className(), [
	'mask' => '(99) 9999-9999',
]) ?>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
    	<?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar', ['class' => 'btn btn-success']) ?>
		<?= Html::a('Cancelar', ['cliente/index'], ['class' => 'btn btn-default']) ?>	
	</div>
</div>

<?php ActiveForm::end(); ?>

