<?php
session_start();
ob_start();
include_once('../../config.php');
$pdo = conectar();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Aluguel não encontrado!</p>";
    header("Location: /front/controllers/list/list_rentals.php");
    exit;
}

$query_rentals = "SELECT id FROM rentals WHERE id = $id LIMIT 1";
$result_rentals = $pdo->query($query_rentals);
$result_rentals->execute();

if (($result_rentals) and ($result_rentals->rowCount() != 0)) {
    $query_del_rentals = "DELETE FROM rentals WHERE id = $id";
    $delete_rentals = $pdo->prepare($query_del_rentals);

    if ($delete_rentals->execute()) {
        $_SESSION['msg'] = "<p style='color: #090;'>Aluguel deletado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Aluguel não deletado com sucesso!</p>";
    }
    header("Location: /front/controllers/list/list_rentals.php");
    exit;
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Aluguel não encontrado!</p>";
    header("Location: /front/controllers/list/list_rentals.php");
    exit;
}
