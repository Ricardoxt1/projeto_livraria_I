<?php
session_start();
include_once('../../config.php');
$pdo = conectar();

try {
    $tabela = 'rentals';

    // Inserting rentals into the database
    $smt = $pdo->prepare('INSERT INTO ' . $tabela . ' (rental, delivery, costumer_id, book_id, employee_id) VALUES (:rental, :delivery, :costumer_id, :book_id, :employee_id)');
    $smt->bindParam(':rental', $rental);
    $smt->bindParam(':delivery', $delivery);
    $smt->bindParam(':costumer_id', $costumer_id);
    $smt->bindParam(':book_id', $book_id);
    $smt->bindParam(':employee_id', $employee_id);

    
    $costumer_id = $_POST['id_costumers_rental'] ? $_POST['id_costumers_rental'] : false;
    $book_id = $_POST['id_book_rental'] ? $_POST['id_book_rental'] : false;
    $employee_id = $_POST['id_employees_rental'] ? $_POST['id_employees_rental'] : false;
    $convert_rental = $_POST['rental'] ? $_POST['rental'] : false;
    $convert_delivery = $_POST['delivery'] ? $_POST['delivery'] : false;
    // Convertendo as datas para formato inglês
    $rental = date('Y-m-d', strtotime(str_replace('/', '-', $convert_rental)));
    $delivery = date('Y-m-d', strtotime(str_replace('/', '-', $convert_delivery)));
    
    $smt->execute();

    $lastInsertId = $pdo->lastInsertId();

    if ($lastInsertId) {
        session_start();
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header("Location: /front/controllers/registers/register_rentals.php");
        exit;
    } else {
        session_start();
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi realizado com sucesso.</p>";
        header("Location: /front/controllers/registers/register_rentals.php");
        exit;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
