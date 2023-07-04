<?php

if (isset($_POST['edit_costumers'])) {
    // Valide os dados aqui, se necessário

    $query_update = "UPDATE costumers 
    SET 
    cpf = :cpf, 
    name = :name, 
    phone_number = :phone_number,
    address = :address,
    email = :email
    WHERE id = $id";

    $stmt_update = $connection->prepare($query_update);
    $name = trim($dados['name']); // Apply filtering, removing whitespace
    $stmt_update->bindParam(':name', $name);
    $stmt_update->bindParam(':phone_number', $phone_number);
    $stmt_update->bindParam(':email', $email);
    $stmt_update->bindParam(':cpf', $cpf);
    $stmt_update->bindParam(':address', $address);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $phone_number = $_POST['phone_number'] ? $_POST['phone_number'] : false;
    $email = $_POST['email'] ? $_POST['email'] : false;
    $cpf = $_POST['cpf'] ? $_POST['cpf'] : false;
    $address = $_POST['address'] ? $_POST['address'] : false;

    // $stmt_update->bindParam(':id', $id);

    $stmt_update->execute();

    if ($stmt_update->rowCount() > 0) {
        $row_dados = $stmt_update->fetch(PDO::FETCH_ASSOC);
        $name = $row_dados['name'];
        $phone_number = $row_dados['phone_number'];
        $email = $row_dados['email'];
        $cpf = $row_dados['cpf'];
        $address = $row_dados['address'];
        $_SESSION['msg'] = "<p style='color: #090;'>Usuario atualizado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar o usuario!</p>";
    }

    header("Location: /front/pages/list/listCostumers");
    exit;
}
