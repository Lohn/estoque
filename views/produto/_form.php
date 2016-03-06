<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
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

<?= $form->field($model, 'descricao', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->textarea(['rows' => 5]) ?>

<?= $form->field($model, 'preco', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->widget(MaskMoney::classname(), [
	'pluginOptions' => [
        'prefix' => 'R$ ',
        'allowNegative' => false,
        'allowZero' => false,
        'decimal' => '.',
    	'precision' => 2
    ]
]) ?>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar', ['class' => 'btn btn-success']) ?>
		<?= Html::a('Cancelar', ['produto/index'], ['class' => 'btn btn-default']) ?>	
	</div>
</div>

<?php ActiveForm::end(); ?>

