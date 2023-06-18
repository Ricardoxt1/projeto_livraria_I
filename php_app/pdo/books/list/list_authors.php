<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'authors';

//busca de dados sobre os autores

$id = 1;
$stmt = $pdo->prepare('SELECT * FROM ' . $tabela . ' WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$resultado = $stmt->fetchAll();


foreach ($resultado as $key) {
    print_r('Nome do autor: ' . $key['name']);
    
}