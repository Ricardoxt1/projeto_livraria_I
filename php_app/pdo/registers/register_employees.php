<?php
session_start();
include_once('../../config.php');
$pdo = conectar();

try {

    $tabela = 'employees';

    // Inserting costumers into the database
    $smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (name, pis, office, departament, library_id) VALUES (:name, :pis, :office, :departament, :library_id)');
    $smt->bindParam(':name', $name);
    $smt->bindParam(':pis', $pis);
    $smt->bindParam(':office', $office);
    $smt->bindParam(':departament', $departament);
    $smt->bindParam(':library_id', $library_id);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $pis = $_POST['pis'] ? $_POST['pis'] : false;
    $office = $_POST['office'] ? $_POST['office'] : false;
    $departament = $_POST ['departament'] ? $_POST['departament'] : false;
    $library_id = $_POST ['library_id'] ? $_POST['library_id'] : false;
    $smt->execute();


    $lastInsertId = $pdo->lastInsertId();

    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/controllers/registers/register_employees.php");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/controllers/registers/register_employees.php");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
