<?php

class HomeController 
{
    // Exibindo a mengasem HOME
    public function index()
    {
        try 
        {
            // Chamando o metodo search_db
            $dataAll = search::select_all();
            var_dump($dataAll);
        } 
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}