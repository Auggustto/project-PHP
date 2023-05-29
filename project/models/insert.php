<?php

// Importando o metodo 
include("conexao_db.php");

// Inserindo dados
$res = $conn->prepare("INSERT INTO users(name, email, age) VALUES (:name, :email, :age)");

// Valores de insert 
$res->bindValue(":name","Leonardo");
$res->bindValue(":email","leo@gmail.com");
$res->bindValue(":age","25");

// Executando inserção
$res->execute();

echo "Dados inseridos com sucesso.";
echo "huiuhnj";
?>