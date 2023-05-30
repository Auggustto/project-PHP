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
function insert_user($name, $email, $tel){

    global $conn;

    $res = $conn->prepare("INSERT INTO users(name, email, telephone) VALUES (:name, :email, :tel)");

    // Valores de insert 
    $res->bindValue(":name","Leonardo");
    $res->bindValue(":email","leo@gmail.com");
    $res->bindValue(":tel","25");

    // Executando inserção
    $res->execute();

    echo "Dados inseridos com sucesso.";
}


// ------------------------------------ Delete ------------------------------------
function delet_user($id){
    
    global $conn;

    $cm = $conn->prepare("DELETE FROM users WHERE id = :id");
    $id = 3;

    // Passando o valor da vareavel para id
    $cm->bindValue(":id", $id);
    // Executando delete
    $cm->execute();

    // Printando
    echo "Dados apagados com sucesso!";
}
// ------------------------------------ Update ------------------------------------
function update_user($id, $email){
    
    global $conn;

    $alt = $conn->prepare("UPDATE users SET email = :e WHERE id = :id");

    // Dados a serem alterados
    $alt->bindValue(":e", $email);

    // Passando o valor da vareavel para id
    $alt->bindValue(":id",$id);

    // Executando update
    $alt->execute();
}



// ------------------------------------ Select ------------------------------------

function select_user($id){

    global $conn;

    $select = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $select->bindValue(":id",$id);
    $select->execute();

    // Transformando as informações em array
    // Selecionando um retorno e formatando o retorno
    $result = $select->fetch(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        echo $key.":".$value."<br>";
    }
}

select_user(4);


// ------------------------------------ Select all ------------------------------------

function select_all(){

    global $conn;

    $selectall = $conn->prepare("SELECT * FROM users ");
    $selectall->execute();
    // Selecionando todos dados
    $resultall = $selectall->fetchAll(PDO::FETCH_ASSOC);

    // Verificar se a consulta retornou algum resultado
    if (count($resultall)>0) {

        // exibir os dados
        foreach($resultall as $row){

            // imprimir na tela
            echo "- ID:" . $row["id"]. "- Nome:". $row["name"]. "- E-mail:" . $row["email"] . "- Telefone:" . $row["telephone"] . "<br>";}
        } 
    else {
            return "Nenhum resultado encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn = null;
}

select_all();





// try {
//             $this->pdo = new PDO("mysqli:dbname=" .$dbname .";host=" .$host, $user, $password);
//         } 
//         catch (PDOException $e) {
//             echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
//             // Caso de erro para o codigo
//             exit();
//         }
//         catch (Exception $e) {
//             echo "Erro generico: " . $e->getMessage();
//             // Caso de erro para o codigo
//             exit();
//         }