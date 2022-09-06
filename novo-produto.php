<?php
require_once "config.php";

if (count($_POST) > 0){
    $nome = $_POST['nome'];
    $id_categoria = $_POST['id_categoria'];
    $data_validade = $_POST['data_validade'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos SET nome = :nome, id_categoria = :id_categoria, data_validade= :data_validade, quantidade  = :quantidade";

    $sql = $db->prepare($sql);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":id_categoria", $id_categoria);
    $sql->bindValue(":data_validade", $data_validade);
    $sql->bindValue(":quantidade", $quantidade);
    $sql->execute();
    //print_r($sql->errorInfo());exit;
    if($sql) {
        header("Location: index.php");
    }

}

$categorais = array();

$sql = "SELECT * FROM categorias";
$sql = $db ->prepare($sql);
$sql->execute();

if ($sql->rowCount() > 0) {
    $categorias = $sql->fetchAll();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css"/>
</head>
<body>
<div class="container fundo">
    <<?php require_once "./menu.php" ?>

    <div class="fundo-conteudo">
        
    <div class="container">
        <fieldset>
            <legend>Cadastrar Produtos</legend>
            <form method="POST">
                <label>Nome *</label>
                <input type="text" required class="form-control" name="nome"/>
                <label>id_categoria *</label>
                <select name="categoria" class="form-control">
                    <option value="" disabled selected>Selecione uma categoria</option>
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
                    <?php endforeach; ?>
                </select>

                
                <label>data-validade</label>
                <input type="date" class="form-control" name="data_validade"/>
                <label>quantidade</label>
                <input type="password" class="form-control" name="quantidade"/>
                <br/><a href="index.php" class="btn btn-warning">Voltar</a>
                <button type="submit" class="btn btn-primary"> salvar</button>
            </form>
        </fieldset>
    </div>
</div>
</div>


</body>
</html>