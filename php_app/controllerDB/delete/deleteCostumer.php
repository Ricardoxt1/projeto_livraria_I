<?php
session_start();
ob_start();
include_once('../../config.php');
$connection = connect();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuario não encontrado!</p>";
    header("Location: /front/pages/list/listCostumers");
    exit;
}

$query_costumers = "SELECT id FROM costumers WHERE id = $id LIMIT 1";
$result_costumers = $connection->query($query_costumers);
$result_costumers->execute();

if (($result_costumers) and ($result_costumers->rowCount() != 0)) {
    $query_del_costumers = "DELETE FROM costumers WHERE id = $id";
    $delete_costumers = $connection->prepare($query_del_costumers);

    if ($delete_costumers->execute()) {
        $_SESSION['msg'] = "<p style='color: #090;'>Usuario deletado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuario não deletado com sucesso pois há um alguel em seu nome!</p>";
    }
    header("Location: /front/pages/list/listCostumers");
    exit;
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuario não encontrado!</p>";
    header("Location: /front/pages/list/listCostumers");
    exit;
}
