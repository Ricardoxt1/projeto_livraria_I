<?php
session_start();
include_once('../../config.php');
$connection = connect();



try {

    $smt = $connection->prepare("INSERT INTO costumers (cpf, name, phone_number, address, email) VALUES (:cpf, :name, :phone_number, :address, :email)");
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


    $lastInsertId = $connection->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/pages/register/registerCostumer");
        exit;
    }
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/pages/register/registerCostumer");
        exit;
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
