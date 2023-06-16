<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'libraries';

//busca de dados sobre a empresa

$id = 1;
$stmt = $pdo->prepare('SELECT * FROM ' . $tabela . ' WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$resultado = $stmt->fetchAll();


foreach ($resultado as $key) {
    print_r('Nome da empresa: ' . $key['name']);
}
