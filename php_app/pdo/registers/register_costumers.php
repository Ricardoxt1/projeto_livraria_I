<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'costumers';

// Inserting costumers into the database
$smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (cpf, name, phone_number, address) VALUES (:cpf, :name, :phone_number, :address)');
$smt->bindParam(':cpf', $cpf);
$smt->bindParam(':name', $name);
$smt->bindParam(':phone_number', $phone_number);
$smt->bindParam(':address', $address);
$cpf = '47583811864' ;
$name = 'ricardo alexandre';
$phone_number = '14998309985' ;
$address = 'manoel ribeiro, 211' ;
$smt->execute();