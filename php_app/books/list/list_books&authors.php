<?php

include_once('../../config.php');
$pdo = conectar();


// Busca de dados sobre os livros

$id = 1;

$stmt = $pdo->prepare('SELECT authors.name, books.titule FROM books RIGHT JOIN authors ON authors.id = books.author_id WHERE authors.id = :author_id');
$stmt->bindValue(':author_id', $id);
$stmt->execute();
$resultado = $stmt->fetchAll();


foreach ($resultado as $key) {
    print_r('Titulo: ' . $key['titule']);
    print_r('<hr> Nome do author: ' . $key['name']);
}
