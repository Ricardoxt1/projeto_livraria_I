<?php
session_start();
include_once('../../config.php');
$pdo = conectar();

$tabela = 'books';

try {
    $tabela = 'books';

    $smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (titule, page, realese_date, author_id) VALUES (:titule, :page, :realese_date, :author_id)');
    $smt->bindParam(':titule', $titule);
    $smt->bindParam(':page', $page);
    $smt->bindParam(':realese_date', $realese_date);
    $smt->bindParam(':author_id', $author_id);
    $titule = $_POST['titule'] ? $_POST['titule'] : false;
    $page = $_POST['page'] ? $_POST['page'] : false;
    $realese_date = $_POST['realese_date'] ? $_POST['realese_date'] : false;
    $author_id = $_POST['id_autor_book'] ? $_POST['id_autor_book'] : false;
    $smt->execute();


    $lastInsertId = $pdo->lastInsertId();

    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/controllers/registers/register_books.php");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/controllers/registers/register_books.php");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
