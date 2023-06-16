<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'rentals';

// Inserting rentals into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (rental, delivery, costumer_id, book_id, employee_id) VALUES (:rental, :delivery, :costumer_id, :book_id, :employee_id)');
$smt->bindParam(':rental', $rental);
$smt->bindParam(':delivery', $delivery);
$smt->bindParam(':costumer_id', $costumer_id);
$smt->bindParam(':book_id', $book_id);
$smt->bindParam(':employee_id', $employee_id);
$rental = '2023-02-02';
$delivery = '2023-05-10';
$costumer_id = '1';
$book_id = '1';
$employee_id = '1';
$smt->execute();
