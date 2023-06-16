<?php

include_once('../../config.php');
$pdo = conectar();

$tabela = 'rentals';

//busca de dados sobre as locações

$id = 2;
$stmt = $pdo->prepare('SELECT * FROM ' . $tabela . ' WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();

$resultado = $stmt->fetchAll();


foreach ($resultado as $key) {
    print_r('Data da retirada: ' . $key['rental']);
    print_r('<hr>Data de entrega: ' . $key['delivery']);
    print_r('<hr>Id do consumidor: ' . $key['costumer_id']);
    print_r('<hr>Id do livro: ' . $key['book_id']);
    print_r('<hr>Id do funcionário: ' . $key['employee_id']);
}
