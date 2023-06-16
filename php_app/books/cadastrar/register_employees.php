<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'employees';

// Inserting costumers into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (name, pis, office, departament, library_id) VALUES (:name, :pis, :office, :departament, :library_id)');
$smt->bindParam(':name', $name);
$smt->bindParam(':pis', $pis);
$smt->bindParam(':office', $office);
$smt->bindParam(':departament', $departament);
$smt->bindParam(':library_id', $library_id);
$name = 'yago martins';
$pis = '383.32145.32-3';
$office = 'vendedor';
$departament = 'vendas' ;
$library_id = null;
$smt->execute();