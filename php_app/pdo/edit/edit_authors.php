<?php
include_once('../../config.php');
$pdo = conectar();

$id = 1;
$name = "Sarah J Maas";
$tabela = 'authors';

$stmt = $pdo->prepare('UPDATE ' . $tabela . ' SET name = :name WHERE id = :id');
$stmt->execute(array(
    ':id' => $id,
    ':name' => $name
));
