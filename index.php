<?php

include '../infra/conexao.php';
$sql = "SELECT * FROM pratos";
$resultado = mysqli_query($conn, $sql);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario'] ?? null;

    if ($usuario_id) {
        $sql = "SELECT * FROM pratos WHERE id_usuario = $usuario_id";
        $resultado = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM pratos";
        $resultado = mysqli_query($conn, $sql);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Pratos</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body> 
    <main>
        <h2>Pet Shop AUmigos</h2>
        <nav>
            <ul>
                <li><a href="cadastro.php">Cadastrar Clientes</a></li>
                <li><a href="listar.php">Listar Clientes</a></li>
                <li><a href="editar_excluir.php">Editar Clientes</a></li>
                <li><a href="excluir.php">Excluir Clientes</a></li>
                <li><a href="visualizar_dados.php">Visualizar dados de Clientes</a></li>
            </ul>
        </nav>
        
        <h3>Filtrar por Cliente</h3>
        <form method="POST" action="">
            <label for="usuario">Digite o nome do Cliente:</label>
            <br> <br>
            <input type="text" name="usuario" id="usuario" placeholder="Nome do Cliente">
            <br> <br>
            <input type="submit" value="Filtrar">
        </form>
               <?php while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) {
                    $selected = (isset($_POST['usuario']) && $_POST['usuario'] == $usuario['id']) ? 'selected' : '';
                    echo;
                }
                ?>
        </form>
  
    </body>