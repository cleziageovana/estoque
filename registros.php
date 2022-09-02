<?php

require_once "config.php";

global $db;

$sql =  "SELECT * FROM usuarios";
$sql = $db->prepare($sql);
$sql->execute();

$dados = $sql->fetchAll(); //pega todos os resultados da consulta
//$dados = $sql->fetch(); // pega somente 1 resultado


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css"/>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<div class="container fundo">
    <?php require_once "./menu.php"; ?>

    <div class="tituloderegistro">
        <h4>Listrando os Registros</h4>
    </div>

    <div class="fundo-conteudo">
        <div class="mensagem-bem-vindo"></div>
        
        <table class="table">
                <thead>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>id_categoria</th>
                    <th>data_validade</th>
                    <th>quantidade</th>
                    <th>Usuario</th>
                    <th>Opções</th>
                </thead>
            <tbody>
                <?php foreach($dados as $dado): ?>
                    <tr>
                        <td><?php echo $dado['id'] ?></td>
                        <td><?php echo $dado['nome'] ?></td>
                        <td><?php echo $dado['id_categoria'] ?></td>
                        <td><?php echo $dado['data_validade'] ?></td>
                        <td><?php echo $dado['quantidade'] ?></td>
                        <td><?php echo $dado['usuario'] ?></td>
                    <td>
                            <a href="excluir.php?id=<?php echo $dado['id'] ?>" class="btn btn-danger">Excluir</a>
                            <a href="editar.php?id=<?php echo $dado['id'] ?>" class="btn btn-warning">Editar</a>
                    </td>
                <?php endforeach; ?>
            </tbody>

            </table>
        
    </div>   
</body>
</html>