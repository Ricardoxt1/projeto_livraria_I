<?php
session_start();
include_once('../../config.php');
$pdo = conectar();



try {
    $tabela = 'costumers';

    // Inserting costumers into the database
    $smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (cpf, name, phone_number, address, email) VALUES (:cpf, :name, :phone_number, :address, :email)');
    $smt->bindParam(':cpf', $cpf);
    $smt->bindParam(':name', $name);
    $smt->bindParam(':phone_number', $phone_number);
    $smt->bindParam(':address', $address);
    $smt->bindParam(':email', $email);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $phone_number = $_POST['phone_number'] ? $_POST['phone_number'] : false;
    $email = $_POST['email'] ? $_POST['email'] : false;
    $cpf = $_POST['cpf'] ? $_POST['cpf'] : false;
    $address = $_POST['address'] ? $_POST['address'] : false;
    $smt->execute();


    $lastInsertId = $pdo->lastInsertId();

    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/controllers/registers/register_costumers.php");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/controllers/registers/register_costumers.php");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
