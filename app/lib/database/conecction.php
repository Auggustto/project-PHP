<?php

// Criando uma conexão com DB e travando para não criar diversas conexões
abstract class Connection
{
    private static $conn;

    public static function GetConn()
    {
        // Verifivando se o conn tem dados
        if (self::$conn == null) {

        // Obs quando o atributo for static utilizamos self
        self::$conn = new PDO("mysql:host=localhost;dbname=project", "root", "");
    }
        return self::$conn;
    }
}