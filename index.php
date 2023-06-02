<?php

require_once 'app/core/core.php';
require_once 'app/controller/Homecontroller.php';
require_once 'app/controller/ErroController.php';
require_once 'app/lib/database/conecction.php';
//require_once 'vendor/autoload.php';

require_once 'app/models/search_db.php';

$template = file_get_contents('app/view/home.html');

// Pegando o retorno do navegador armazenando em uma vareavel
ob_start();

    // Pegando a pagina que o usuario esta tentando acessar
    $core = new core;
    $core->core_star($_GET);

    // Armazenando o retorno do navegador
    $saida = ob_get_contents();

// Encerrando a função
ob_end_clean();

// Carregando template que tem o conteudo GTML
$tplPronto = str_replace('area_dinamica', $saida, $template);
echo $tplPronto;