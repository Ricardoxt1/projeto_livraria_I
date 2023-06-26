<?php
include_once('../../config.php');
include_once('../../front/controllers/edit/edit_authors.php');
$pdo = conectar();

try {


    $tabela = 'authors';
    $stmt = $pdo->prepare("UPDATE $tabela SET name = :name WHERE id = :id");
    $stmt->execute(array(
        ':id' => $dados['id'],
        ':name' => $dados['name'],
    ));

    $lastInsertId = $pdo->lastInsertId();

    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Autor editado com sucesso!</p>";
        header("Location: /front/controllers/edit/edit_authors.php");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Editagem não foi realizado!.</p>";
        header("Location: /front/controllers/edit/edit_authors.php");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
