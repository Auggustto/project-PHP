<?php

class core 
{
    public function core_star($urlGet) 
    {   
        // Armazenado o nome do metodo
        $acao = 'index';

        // Defindo um controller caso o usuario não passe o parametro da url 
        if (isset($urlGet['pagina']))
        {
            // Tratando a URL 
            $controller = ucfirst($urlGet['pagina'] . 'Controller');
        } else {
            $controller = 'Homecontroller';
        }
        
        // Validando se o controlle que está sendo acessado existe
        if (!class_exists($controller))
        {
            // Caso não existir vai exibir essa mensagem
            $controller = 'ErroController';
        }
        // Função para chamar funções de forma dinamica
        call_user_func_array(array(new $controller, $acao), array());
    }
}