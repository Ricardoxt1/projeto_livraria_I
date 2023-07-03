<?php
session_start();
ob_start();
include_once('../../config.php');
$connection = connect();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Livro não encontrado!</p>";
    header("Location: /front/pages/list/listBooks");
    exit;
}

$query_books = "SELECT id FROM books WHERE id = $id LIMIT 1";
$result_books = $connection->query($query_books);
$result_books->execute();

if (($result_books) and ($result_books->rowCount() != 0)) {
    $query_del_books = "DELETE FROM books WHERE id = $id";
    $delete_books = $connection->prepare($query_del_books);

    if ($delete_books->execute()) {
        $_SESSION['msg'] = "<p style='color: #090;'>Livro deletado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Livro não deletado com sucesso pois está alugado!</p>";
    }
    header("Location: /front/pages/list/listBooks");
    exit;
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Livro não encontrado!</p>";
    header("Location: /front/pages/list/listBooks");
    exit;
}
