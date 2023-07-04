<?php

if (isset($_POST['edit_authors'])) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Valide os dados aqui, se necessário

    $query_update = "UPDATE authors SET name = :name WHERE id = :id";
    $stmt_update = $connection->prepare($query_update);
    $name = trim($dados['name']);
    $stmt_update->bindParam(':name', $name);
    $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_update->execute();

    if ($stmt_update->rowCount() > 0) {
        $row_dados = $stmt_update->fetch(PDO::FETCH_ASSOC);
        $name = $row_dados['name'];
        $_SESSION['msg'] = "<p style='color: #090;'>Autor atualizado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar o autor!</p>";
    }

    header("Location: /front/pages/list/listAuthors");
    exit;
}
