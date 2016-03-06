<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'ABRIL Estoque';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>ABRIL Estoque</h1>

        <p class="lead">Sistema de controle de estoque</p>

        <p>
	        <a class="btn btn-sm btn-success" href="<?=Url::to(['pedido/index'])?>"><i class="glyphicon glyphicon-shopping-cart"></i> Pedidos</a>
	        <a class="btn btn-sm btn-success" href="<?=Url::to(['produto/index'])?>"><i class="glyphicon glyphicon-barcode"></i> Produtos</a>
	        <a class="btn btn-sm btn-success" href="<?=Url::to(['cliente/index'])?>"><i class="glyphicon glyphicon-user"></i> Clientes</a>
        </p>

    </div>
    
</div>
