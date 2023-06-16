<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'costumers';

//busca de dados sobre os livros

$id = 1;
$stmt = $pdo->prepare('SELECT * FROM ' . $tabela . ' WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$resultado = $stmt->fetchAll();


foreach ($resultado as $key) {
    print_r('Nome: ' . $key['name']);
    print_r('Nome: ' . $key['name']);
    print_r('<hr>PIS: ' . $key['pis']);
    print_r('<hr>Cargo: ' . $key['office']);
    print_r('<hr>Setor: ' . $key['departament']);
    print_r('<hr>Empresa: ' . $key['library_id']);
}
