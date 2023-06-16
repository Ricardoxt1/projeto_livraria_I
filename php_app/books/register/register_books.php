<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'books';

// Inserting authors into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (titule, page, realese_date, author_id) VALUES (:titule, :page, :realese_date, :author_id)');
$smt->bindParam(':titule', $titule);
$smt->bindParam(':page', $page);
$smt->bindParam(':realese_date', $realese_date);
$smt->bindParam(':author_id', $author_id);
$titule = 'branca de neve';
$page = '500';
$realese_date = '2001';
$author_id = null;

$smt->execute();
