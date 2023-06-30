<?php
session_start();
ob_start();
include_once('../../config.php');
$pdo = conectar();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Editora não encontrada!</p>";
    header("Location: /front/controllers/list/list_publishers.php");
    exit;
}

$query_publishers = "SELECT id FROM publishers WHERE id = $id LIMIT 1";
$result_publishers = $pdo->query($query_publishers);
$result_publishers->execute();

if (($result_publishers) and ($result_publishers->rowCount() != 0)) {
    $query_del_publishers = "DELETE FROM publishers WHERE id = $id";
    $delete_publishers = $pdo->prepare($query_del_publishers);

    if($delete_publishers->execute()) {
        $_SESSION['msg'] = "<p style='color: #090;'>Editora deletada com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Editora não deletada com sucesso pois pertence a um alguel!</p>";
    }
    header("Location: /front/controllers/list/list_publishers.php");
    exit;

} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Editora não encontrado!</p>";
    header("Location: /front/controllers/list/list_publishers.php");
    exit;
}



