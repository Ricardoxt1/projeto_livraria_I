<?php
if (isset($_POST['edit_publishers'])) {

    // Valide os dados aqui, se necessário

    $query_update = "UPDATE publishers SET name = :name WHERE id = $id";
    $stmt_update = $connection->prepare($query_update);
    $name = trim($dados['name']);
    $stmt_update->bindParam(':name', $name);
    $name = $_POST['name'] ? $_POST['name'] : false;
    $stmt_update->execute();

    if ($stmt_update->rowCount() > 0) {
        $row_dados = $stmt_update->fetch(PDO::FETCH_ASSOC);
        $name = $row_dados['name'];
        $_SESSION['msg'] = "<p style='color: #090;'>Editora atualizada com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar a editora!</p>";
    }
    header("Location: /front/pages/list/listPublishers");
    exit;
}
