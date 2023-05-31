<?php

class HomeController 
{
    // Exibindo a mengasem HOME
    public function index()
    {
        // Chamando o metodo search_db
        search::select_all();
    }
}