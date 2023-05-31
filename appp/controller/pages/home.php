<?php

namespace app\controller\pages;

use app\utils\view;


class Home{

    // Metodo responsavel por retornar a home
    
    public static function index()
    {
        return view::render('pages/home');
    }
}