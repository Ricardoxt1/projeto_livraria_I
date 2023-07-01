<?php
session_start();
include_once('../../config.php');
$pdo = conectar();

try {

    $smt = $pdo->prepare("INSERT INTO books (titule, page, realese_date, author_id, library_id, publisher_id) VALUES (:titule, :page, :realese_date, :author_id, :library_id, :publisher_id)");

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
    
    $lastInsertId = $pdo->lastInsertId();


    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/controllers/registers/register_books");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/controllers/registers/register_books");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
