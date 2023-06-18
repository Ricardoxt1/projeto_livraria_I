<?php
include_once('../../config.php');
$pdo = conectar();

$id = 1;
$name = "dasdddddddd";
$pis = "000.000.000.00";
$office = "xxxxx";
$departament = "dddddddddddd";
$library_id = 1;

$tabela = 'employees';

$stmt = $pdo->prepare('UPDATE ' . $tabela . ' SET name = :name, pis = :pis, office = :office , departament = :departament, library_id = :library_id WHERE :id');
$stmt->execute(array(
    ':id' => $id,
    ':name' => $name,
    ':pis' => $pis,
    ':office' => $office,
    ':departament' => $departament,
    ':library_id' => $library_id,

));
