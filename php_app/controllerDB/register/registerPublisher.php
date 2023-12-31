<?php
session_start();
include_once('../../config.php');
$connection = connect();

try {

    $smt = $connection->prepare("INSERT INTO publishers (name) VALUES (:name)");
    $smt->bindParam(':name', $name);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $smt->execute();


    $lastInsertId = $connection->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/pages/register/registerPublisher");
        exit;
    }
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/pages/register/registerPublisher");
        exit;
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
