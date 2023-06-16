<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'authors';

// Inserting authors into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (name) VALUES (:name)');
$smt->bindParam(':name', $name);
$name = 'j.r.r. tolkein';
$smt->execute();

