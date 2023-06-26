<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'books';

//busca de dados sobre os livros

$id = 1;
$stmt = $pdo->prepare('SELECT * FROM ' . $tabela . ' WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$resultado = $stmt->fetchAll();


foreach ($resultado as $key) {
    print_r('Titulo: ' . $key['titule']);
    print_r('<hr> Paginas: ' . $key['page']);
    print_r('<hr> Ano de lançamento: ' . $key['realese_date']);
    echo ('<hr>');
}

$id = 1;
$stmtt = $pdo->prepare('SELECT authors.name, books.titule publishers.name FROM books RIGHT JOIN authors ON authors.id = books.author_id WHERE authors.id = :author_id JOIN publishers on publishers.id = books.publisher_id WHERE publishers.id = :publisher_id');
$stmtt->bindValue(':author_id', $id);
$stmtt->bindValue(':publisher_id', $id);
$stmtt->bindValue(':id', $id);
$stmtt->execute();
$resultadoo = $stmtt->fetchAll();

foreach ($resultadoo as $key) {
    print_r($key);
}
