<?php
if (isset($_POST['edit_books'])) {

    // Valide os dados aqui, se necessário

    $query_update = "UPDATE books 
    SET 
    titule = :titule,
    page = :page,
    realese_date = :realese_date,
    author_id = :author_id,
    library_id = :library_id,
    publisher_id = :publisher_id
    WHERE id = $id";

    $stmt_update = $connection->prepare($query_update);
    $name = trim($dados['name']);
    $titule = trim($dados['titule']);
    $stmt_update->bindParam(':titule', $titule);
    $stmt_update->bindParam(':page', $page);
    $stmt_update->bindParam(':realese_date', $realese_date);
    $stmt_update->bindParam(':author_id', $author_id);
    $stmt_update->bindParam(':library_id', $library_id);
    $stmt_update->bindParam(':publisher_id', $publisher_id);

    $titule = $_POST['titule'] ? $_POST['titule'] : false;
    $page = $_POST['page'] ? $_POST['page'] : false;
    $realese_date = $_POST['realese_date'] ? $_POST['realese_date'] : false;
    $author_id = $_POST['author_id'] ? $_POST['author_id'] : false;
    $library_id = $_POST['library_id'] ? $_POST['library_id'] : false;
    $publisher_id = $_POST['publisher_id'] ? $_POST['publisher_id'] : false;

    $stmt_update->execute();


    if ($stmt_update->rowCount() > 0) {
        $row_dados = $stmt_update->fetch(PDO::FETCH_ASSOC);
        $titule = $row_dados['titule'];
        $page = $row_dados['page'];
        $realese_date = $row_dados['realese_date'];
        $author_id = $row_dados['author_id'];
        $library_id = $row_dados['library_id'];
        $publisher_id = $row_dados['publisher_id'];
        $_SESSION['msg'] = "<p style='color: #090;'>Livro atualizado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar o livro!</p>";
    }
    header("Location: /front/pages/list/listBooks");
    exit;
}
