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
//$cm->execute();

// Printando
//echo "Dados apagados com sucesso!";

// ------------------------------------ Update ------------------------------------
//$alt = $conn->prepare("UPDATE users SET email = :e WHERE id = :id");

//$alt->bindValue(":e", "leonardoaugusto@gmail.com");
//$alt->bindValue(":id",2);
//$alt->execute();

// ------------------------------------ Select ------------------------------------
$select = $conn->prepare("SELECT * FROM users WHERE id = :id");
$select->bindValue(":id", 2);
$select->execute();

// Transformando as informações em array
// Selecionando um retorno e formatando o retorno
$result = $select->fetch(PDO::FETCH_ASSOC);
// Selecionando diversos registros
//$select->fetchAll();

foreach ($result as $key => $value) {
    echo $key.":".$value."<br>";
}


// ------------------------------------ Select all ------------------------------------

function select_all(){

    global $conn

    $selectall = $conn->prepare("SELECT * FROM users ");
    $selectall->execute();
    // Selecionando todos dados
    $resultall = $selectall->fetchAll(PDO::FETCH_ASSOC);

    // Verificar se a consulta retornou algum resultado
    if (count($resultall)>0) {

        // exibir os dados
        foreach($resultall as $row){

            // imprimir na tela
            echo "- ID:" . $row["id"]. "- Nome:". $row["name"]. "- E-mail:" . $row["email"] . "- Idade:" . $row["age"] . "<br>";}
        } 
    else {
            echo "Nenhum resultado encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn = null;
}