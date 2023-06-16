<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'publishers';

// Inserting libraries into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (name) VALUES (:name)');
$smt->bindParam(':name', $name);
$name = 'none';
$smt->execute();