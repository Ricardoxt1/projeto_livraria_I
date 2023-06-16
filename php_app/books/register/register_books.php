<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'books';

// Inserting authors into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (titule, page, realese_date, author_id) VALUES (:titule, :page, :realese_date, :author_id)');
$smt->bindParam(':titule', $titule);
$titule = 'branca de neve';
$smt->bindParam(':page', $page);
$page = '500';
$smt->bindParam(':realese_date', $realese_date);
$realese_date = '2001';
$smt->bindParam(':author_id', $author_id);
$author_id = '2';

$smt->execute();
