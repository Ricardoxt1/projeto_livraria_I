<?php

if (isset($_POST['edit_employees'])) {


    $query_update = "UPDATE employees 
    SET name = :name,
    pis = :pis,
    office = :office,
    departament = :departament,
    library_id = :library_id
    WHERE id = $id";
    $stmt_update = $connection->prepare($query_update);
    $name = trim($dados['name']);
    $stmt_update->bindParam(':name', $name);
    $stmt_update->bindParam(':pis', $pis);
    $stmt_update->bindParam(':office', $office);
    $stmt_update->bindParam(':departament', $departament);
    $stmt_update->bindParam(':library_id', $library_id);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $pis = $_POST['pis'] ? $_POST['pis'] : false;
    $office = $_POST['office'] ? $_POST['office'] : false;
    $departament = $_POST['departament'] ? $_POST['departament'] : false;
    $library_id = $_POST['library_id'] ? $_POST['library_id'] : false;
    $stmt_update->execute();

    if ($stmt_update->rowCount() > 0) {
        $row_dados = $stmt_update->fetch(PDO::FETCH_ASSOC);
        $name = $row_dados['name'];
        $_SESSION['msg'] = "<p style='color: #090;'>Funcionário(a) atualizado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar o funcionário(a)!</p>";
    }

    header("Location: /front/pages/list/listEmployees");
    exit;
}
