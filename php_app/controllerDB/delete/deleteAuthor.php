<?php
session_start();
ob_start();
include_once('../../config.php');
$connection = connect();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
var_dump($id);

if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Autor não encontrado!</p>";
    header("Location: /front/pages/list/listAuthors");
    exit;
}

$query_authors = "SELECT id FROM authors WHERE id = $id LIMIT 1";
$result_authors = $connection->query($query_authors);
$result_authors->execute();

if (($result_authors) and ($result_authors->rowCount() != 0)) {
    $query_del_authors = "DELETE FROM authors WHERE id = $id";
    $delete_authors = $connection->prepare($query_del_authors);

    if ($delete_authors->execute()) {
        $_SESSION['msg'] = "<p style='color: #090;'>Autor deletado com sucesso!</p>";
        header("Location: /front/pages/list/listAuthors");
    } 
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Autor não deletado com sucesso por pertencer a um livro cadastrado!</p>";
        header("Location: /front/pages/list/listAuthors");
        exit;
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Autor não encontrado!</p>";
    header("Location: /front/pages/list/listAuthors");
    exit;
}
