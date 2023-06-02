<?php

//use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class HomeController
{
    // Exibindo a mengasem HOME
    public function index()
    {
        try {
            //$loader = new FilesystemLoader('/app/view/home');
            //$twig = new \Twig\Environment($loader);

            // Chamando o metodo search_db
            $dataAll = search::select_all();
            var_dump($dataAll);
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
