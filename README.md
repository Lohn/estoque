ABRIL Estoque
============================

ABRIL Estoque é um sistema básico de controle de estoque.

O sistema foi desenvolvido utilizando a [framework Yii2](http://www.yiiframework.com/) do PHP organizada no padrão MVC. 
Utilizei também o Bootstrap e o banco de dados em MySQL.

O ambiente de desenvolvimento utilizado foi o WAMP Stack versão 5.6.18-0, da Bitnami com os seguintes componentes
> - Apache 2.4.18
> - MySQL 5.6.28
> - PHP 5.6.18
> - PHPMyAdmin 4.5.4.1

A configuração da conexão com a DB encontra-se no arquivo config/db.php.

Apesar da framework já disponibilizar imensas funcionalidades, os arquivos mais customizados foram as views e os controllers. Foram alterados também os models de pesquisa.

ESTRUTURA DE PASTAS
-------------------

      config/             contém os arquivos de configuração da framework, incluindo a conexão DB 
      controllers/        contém os controllers
      models/             contém os models
      views/              contém as views
      web/                contém os styles e scripts css/js customizados
      db/                 contém o export do SQL utilizado e o arquivo do MySQL Workbench

INSTALAÇÃO
-----------

> - Clonar o repositório num diretório à sua escolha no root do servidor
> - Efetuar um "composer update" nesse diretório
> - Montar o banco de dados com o SQL disponibilizado em db/estoque.sql
> - Configurar a conexão com a DB em config/db.php
> - Dirigir-se a "http://[host]/[repositório]/web" no browser para acessar o sistema

CONTATO
-------

Para mais informações ou dúvidas,
Hugo Caires - hugocaires@hotmail.com
