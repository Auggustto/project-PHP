<?php

//require_once 'search.php';
set_include_path('search.php');

//$p = new user("users", "localhost", "root", "");
$u = new user_all("users", "localhost", "root", "");

?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>CRUD de Clientes</title>
</head>

<body>
    <div class="container">
        <h1>CRUD de Clientes</h1>

        <!-- Formulário para adicionar/alterar clientes -->
        <form id="clientForm" method="post">
            <input type="hidden" id="clientId">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" id="cancelBtn">Cancelar</button>
        </form>
        <section id="section_list">
        <table class="table mt-4">

            <?php
            $data = $p->search_values();
            var_dump($data)
            ?>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody id="clientTableBody">

                <!-- Aqui serão adicionadas as linhas da tabela dinamicamente -->

            </tbody>
        </table>
        </section>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>