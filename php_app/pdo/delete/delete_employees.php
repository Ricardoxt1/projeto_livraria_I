<?php
session_start();
ob_start();
include_once('../../config.php');
$pdo = conectar();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Funcionario(a) não encontrado!</p>";
    header("Location: /front/controllers/list/list_employees");
    exit;
}

$query_employees = "SELECT id FROM employees WHERE id = $id LIMIT 1";
$result_employees = $pdo->query($query_employees);
$result_employees->execute();

if (($result_employees) and ($result_employees->rowCount() != 0)) {
    $query_del_employees = "DELETE FROM employees WHERE id = $id";
    $delete_employees = $pdo->prepare($query_del_employees);

    if($delete_employees->execute()) {
        $_SESSION['msg'] = "<p style='color: #090;'>Funcionario(a) deletado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Funcionario(a) não deletado com sucesso pois pertence a um alguel!</p>";
    }
    header("Location: /front/controllers/list/list_employees");
    exit;

} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Funcionario(a) não encontrado!</p>";
    header("Location: /front/controllers/list/list_employees");
    exit;
}



