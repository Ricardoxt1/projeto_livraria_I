<?php
include_once('../../config.php');
$pdo = conectar();

$id = 1;
$name = "ffffffff";

$tabela = 'publishers';

$stmt = $pdo->prepare('UPDATE ' . $tabela . ' SET name = :name WHERE id = :id');
$stmt->execute(array(
    ':id' => $id,
    ':name' => $name
));
