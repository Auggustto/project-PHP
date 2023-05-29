
<?php

// Configurando conexão com DB
$hostname = "localhost";
$database = "project";
$user = "root";
$password = "";

// Criando uma vareavel (Sintaxe para criar um objeto: (new mysqli($hostname,$user,$password,$database).)
$mysql = new mysqli($hostname,$user,$password,$database);
if ($mysql->connect_errno){
    echo "Falha ao conectar com o banco de dados: (". $mysql->connect_errno .")". $mysql->connect_errno;
} else 
    echo "Conectado!"
?>
