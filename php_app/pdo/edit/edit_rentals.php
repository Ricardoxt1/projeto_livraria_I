<?php
include_once('../../config.php');
$pdo = conectar();

$id = 1;
$rental = "2000/01/03";
$delivery = "2000/01/02";
$costumer_id = 1;
$book_id = 1;
$employee_id = 1;

$tabela = 'rentals';

$stmt = $pdo->prepare('UPDATE ' . $tabela . ' SET rental = :rental, delivery = :delivery, costumer_id = :costumer_id , book_id = :book_id, employee_id = :employee_id WHERE :id');
$stmt->execute(array(
    ':id' => $id,
    ':rental' => $rental,
    ':delivery' => $delivery,
    ':costumer_id' => $costumer_id,
    ':book_id' => $book_id,
    ':employee_id' => $employee_id,

));
