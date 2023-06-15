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


echo ("o livro se chama: " . $key['titule'] . ", possui " . $key['page'] . "e seu ano de fabrição é " . $key['realese_date']);
