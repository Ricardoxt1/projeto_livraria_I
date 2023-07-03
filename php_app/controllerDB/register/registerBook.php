<?php
session_start();
include_once('../../config.php');
$connection = connect();

try {

    $smt = $connection->prepare("INSERT INTO books (titule, page, realese_date, author_id, library_id, publisher_id) VALUES (:titule, :page, :realese_date, :author_id, :library_id, :publisher_id)");
    $titule = $_POST['titule'] ? $_POST['titule'] : false;
    $page = $_POST['page'] ? $_POST['page'] : false;
    $realese_date = $_POST['realese_date'] ? $_POST['realese_date'] : false;
    $author_id = $_POST['id_author'] ? $_POST['id_author'] : false;
    $library_id = $_POST['library_id'] ? $_POST['library_id'] : false;
    $publisher_id = $_POST['id_publishers'] ? $_POST['id_publishers'] : false;
    $smt->execute(array(
        ':titule' => $titule,
        ':page' => $page,
        ':realese_date' => $realese_date,
        ':author_id' => $author_id,
        ':library_id' => $library_id,
        ':publisher_id' => $publisher_id,
    ));

    $lastInsertId = $connection->lastInsertId();


    if ($lastInsertId) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/pages/register/registerBook");
        exit;
    } 
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/pages/register/registerBook");
        exit;
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
