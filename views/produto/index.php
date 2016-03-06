<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">

    <div class="panel-heading">
        <div class="row">
            <div class="col-md-7 col-sm-4 text-left">
                <span class="panel-title"><i class="glyphicon glyphicon-barcode"></i> <?= Html::encode($this->title) ?></span>
            </div>
            <div class="col-md-5 col-sm-8 pull-right">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>
                <div class="input-group">
                    <?= Html::activeTextInput($searchModel, 'search', ['placeholder' => 'Pesquisar', 'class' => 'form-control search-input', 'data-url' => Url::to(['produto/index'])]); ?>
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
        'emptyText' => 'No momento não existem produtos cadastrados.',
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'descricao',
            [
                'attribute' => 'preco',
                'value' => function($model, $key, $index, $column){
                    return Yii::$app->formatter->asCurrency($model->preco, 'BRL');
                }
            ],
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
                            'title' => 'Excluir produto',
                            'data-message' => "<div class='alert alert-warning'><strong>ATENÇÂO!</strong> A exclusão deste produto implica a exclusão de todos os pedidos relacionados a este.</div> Tem a certeza que pretende continuar?"
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>

</div>
