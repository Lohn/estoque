<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
	'options' => [
		'class' => 'form-horizontal'
	]
]); ?>

<?= $form->field($model, 'id_cliente', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->widget(Select2::classname(), [
	'data' => ArrayHelper::map(\app\models\Cliente::find()->select(['id', 'nome'])->all(), 'id', 'nome'),
	'options' => ['placeholder' => 'Selecione o cliente'],
	'pluginOptions' => [
        'allowClear' => true
    ],
	'theme' => Select2::THEME_BOOTSTRAP,
]) ?>

<?= $form->field($model, 'id_produto', [
	'labelOptions' => [
		'class' => 'col-sm-2 control-label no-padding-right'
	],
	'template' => '{label}<div class="col-sm-5">{input}{error}</div>'
])->widget(Select2::classname(), [
	'data' => ArrayHelper::map(\app\models\Produto::find()->select(['id', 'nome'])->all(), 'id', 'nome'),
	'options' => ['placeholder' => 'Selecione o produto'],
	'pluginOptions' => [
        'allowClear' => true
    ],
	'theme' => Select2::THEME_BOOTSTRAP,
]) ?>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar', ['class' => 'btn btn-success']) ?>
		<?= Html::a('Cancelar', ['pedido/index'], ['class' => 'btn btn-default']) ?>	
	</div>
    
</div>

<?php ActiveForm::end(); ?>
