<?php
session_start();
include_once('../../config.php');
$connection = connect();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

try {

    $smt = $connection->prepare("INSERT INTO authors (name) VALUES (:name)");
    $smt->bindParam(':name', $name);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $smt->execute();


    $lastInsertId = $connection->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/pages/register/registerAuthor");
        exit;
    } 
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/pages/register/registerAuthor");
        exit;
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
