<?php
session_start();
include_once('../../config.php');
$connection = connect();

try {

    // Inserting costumers into the database
    $smt = $connection->prepare("INSERT INTO employees (name, pis, office, departament, library_id) VALUES (:name, :pis, :office, :departament, :library_id)");
    $smt->bindParam(':name', $name);
    $smt->bindParam(':pis', $pis);
    $smt->bindParam(':office', $office);
    $smt->bindParam(':departament', $departament);
    $smt->bindParam(':library_id', $library_id);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $pis = $_POST['pis'] ? $_POST['pis'] : false;
    $office = $_POST['office'] ? $_POST['office'] : false;
    $departament = $_POST['departament'] ? $_POST['departament'] : false;
    $library_id = $_POST['library_id'] ? $_POST['library_id'] : false;
    $smt->execute();


    $lastInsertId = $connection->lastInsertId();

    if ($lastInsertId) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/pages/register/registerEmployee");
        exit;
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/pages/register/registerEmployee");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
