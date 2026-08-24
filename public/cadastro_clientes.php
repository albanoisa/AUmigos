<?php

include '../infra/conexao.php';
if (!isset($conn) || $conn === null) {
    die('Erro ao conectar com o banco de dados.');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'ss', $nome, $email);

    if (mysqli_stmt_execute($stmt)) {
        echo "Cliente cadastrado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        mysqli_stmt_close($stmt);
        exit();
    } else {
        echo "Erro ao cadastrar cliente: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
     <h2>Filtrar por Cliente</h2>
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
    </main>

