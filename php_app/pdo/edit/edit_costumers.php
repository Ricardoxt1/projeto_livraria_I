<?php
include_once('../../config.php');
$pdo = conectar();

$id = 1;
$cpf = "000.000.000.00";
$name = "dasdddddddd";
$phone_number = "00 00000-0000";
$address = "rua numero 30";

$tabela = 'costumers';

$stmt = $pdo->prepare('UPDATE ' . $tabela . ' SET cpf = :cpf, name = :name, phone_number = :phone_number, address = :address WHERE :id');
$stmt->execute(array(
    ':id' => $id,
    ':cpf' => $cpf,
    ':name' => $name,
    ':phone_number' => $phone_number,
    ':address' => $address,

));
