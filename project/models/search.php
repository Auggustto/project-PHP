<?php

class user_all{

    private $pdo;

    // Conexão com o banco de dados OBS: Tudo que está dentro do function __construct(), será executado primeiro.
    public function __construct($dbname, $host, $user, $password)
    {
        try {
            $this->pdo = new PDO("mysqli:dbname=".$dbname .
            ":host=".$host,$user,$password); 
        }    
        catch (PDOException $e) {
            echo "Erro ao conectar com o banco de dados: ".$e->getMessage();
            // Caso de erro para o codigo
            exit();
        }
        catch (Exception $e) {
            echo "Erro generico: ".$e->getMessage();
            // Caso de erro para o codigo
            exit();
        }
    }

    // Metodo para buscar todos os dados
    public function search_values(){
        
        global $pdo;

        // Caso o db esteja vazio, a var res vai retornar um array vazio
        $res = array();

        $select_all = $this -> $pdo ->prepare("SELECT * FROM users");
        $res = $select_all->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }
}
?>