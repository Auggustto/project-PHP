<?php
// Criando uma conexão com banco de dados PDO
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão estabelecida com sucesso.";
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

// ------------------------------------Inserção de dados ------------------------------------
$res = $conn->prepare("INSERT INTO users(name, email, age) VALUES (:name, :email, :age)");

// Valores de insert 
//$res->bindValue(":name","Leonardo");
//$res->bindValue(":email","leo@gmail.com");
//$res->bindValue(":age","25");

// Executando inserção
//$res->execute();

//echo "Dados inseridos com sucesso.";

// ------------------------------------ Delete ------------------------------------
$cm = $conn->prepare("DELETE FROM users WHERE id = :id");
$id = 3;

// Passando o valor da vareavel para id
$cm->bindValue(":id", $id);
// Executando delete
$cm->execute();

// Printando
echo "Dados apagados com sucesso!";

// ------------------------------------ Update ------------------------------------

?>

