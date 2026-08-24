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
            
                <a href="cadastro_clientes.php">Cadastrar Clientes</a>
                <a href="listar_clientes.php">Listar Clientes</a>
                <a href="editar_clientes.php">Editar Clientes</a>
                <br> <br>
                <a href="excluir_clientes.php">Excluir Clientes</a>
                <a href="visualizar_dados_clientes.php">Visualizar dados de Clientes</a>
        </nav>
        
  
    </body>