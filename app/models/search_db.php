<?php

class search
{
    public static function select_all()
    {
        $con = Connection::GetConn();
        
        // Selecionando todos os dados do DB
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        // Pegando os registros do banco e convertendo em um objeto
        while ($row = $sql->fetchObject('search'))
        {
            // Armazenando todos os registros
            $resultado[] = $row;
        }
        // Validando se o array resultado tem dados
        if (!$resultado)
        {   
            // Plotando mensagem de exeção caso estiver vazio
            throw new Exception("Não Foi encontrado nenhum registro!");
        }
        return $resultado;
    }
}
