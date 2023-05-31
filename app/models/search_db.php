<?php

class search
{
    public static function select_all()
    {
        $con = Connection::GetConn();
        
        // Selecionando todos os dados do DB
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $sql = $con->prepare($sql);
        $sql->execute();
        var_dump($sql->fetchAll());
        
    }
}
