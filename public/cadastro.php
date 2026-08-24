<?php

include '../infra/connect.php';
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

