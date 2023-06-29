<?php
session_start();
include_once('../../config.php');
$pdo = conectar();

try {
    $tabela = 'publishers';

    // Inserting costumers into the database
    // Inserting libraries into the database
    $smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (name) VALUES (:name)');
    $smt->bindParam(':name', $name);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $smt->execute();


    $lastInsertId = $pdo->lastInsertId();

    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/controllers/registers/register_publishers.php");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/controllers/registers/register_publishers.php");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
