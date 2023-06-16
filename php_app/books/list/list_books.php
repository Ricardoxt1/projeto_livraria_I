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
$stmtt = $pdo->prepare('SELECT a.name, b.titule, p.name from books as b right join authors as a on a.id = b.author_id left join publishers as p on p.id = b.publisher_id;');
$stmtt->bindValue(':id', $id);
$stmtt->execute();
$resultadoo = $stmtt->fetchAll();

foreach ($resultadoo as $key){
    print_r($key);
}