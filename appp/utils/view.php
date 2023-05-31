<?php

namespace app\utils;

class view {

    // Metodo responsavel por retornar o conteudo de uma view
    private static function getView($view){
        $file = __DIR__.'/../../resource/view/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    // Metodo responsavel por retornar o conteudo renderizado de uma view
    public static function render($view){
        // Conteudo da view
        $contentView = self::getView($view);

        // Retorna o conteudo renderizado 
        return $contentView;
    }
}

