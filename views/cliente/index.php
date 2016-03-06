<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">

    <div class="panel-heading">
        <div class="row">
            <div class="col-md-7 col-sm-4 text-left">
                <span class="panel-title"><i class="glyphicon glyphicon-user"></i> <?= Html::encode($this->title) ?></span>
            </div>
            <div class="col-md-5 col-sm-8 pull-right">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>
                <div class="input-group">
                    <?= Html::activeTextInput($searchModel, 'search', ['placeholder' => 'Pesquisar', 'class' => 'form-control search-input', 'data-url' => Url::to(['cliente/index'])]); ?>
                    <span class="input-group-btn">
                        <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-default']) ?>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Cadastrar', ['create'], ['class' => 'btn btn-success']) ?>
                    </span>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'emptyText' => 'No momento não existem clientes cadastrados.',
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'email:email',
            'telefone',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="btn-group btn-group-justified">{update} {delete}</div>',
                'headerOptions' => [
                    'style' => 'width: 100px;'
                ],
                'header' => 'Ações',
                'buttons' => [
                    'update' => function($url){
                        return Html::a('<i class="glyphicon glyphicon-edit"></i>', $url, ['class' => 'btn btn-default btn-xs']);
                    },
                    'delete' => function($url){
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                            'class' => 'btn btn-default btn-xs delete',
                            'title' => 'Excluir cliente',
                            'data-message' => "<div class='alert alert-warning'><strong>ATENÇÂO!</strong> A exclusão deste cliente implica a exclusão de todos os pedidos relacionados a este.</div> Tem a certeza que pretende continuar?"
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>

</div>