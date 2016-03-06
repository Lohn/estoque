<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Cadastro Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
  	<div class="panel-heading">
    	<h3 class="panel-title">
    		<i class="glyphicon glyphicon-plus"></i> <?= Html::encode($this->title) ?>
    	</h3>
  	</div>
  	<div class="panel-body">
    	<?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
  	</div>
</div>