<?php
if (isset($_POST['edit_rentals'])) {

    // Inserting rentals into the database
    $query_update = "UPDATE rentals
    SET 
    rental = :rental, 
    delivery = :delivery, 
    costumer_id = :costumer_id, 
    book_id = :book_id, 
    employee_id = :employee_id 
    WHERE id = $id";
    $smt = $connection->prepare($query_update);
    $smt->bindParam(':rental', $rental);
    $smt->bindParam(':delivery', $delivery);
    $smt->bindParam(':costumer_id', $costumer_id);
    $smt->bindParam(':book_id', $book_id);
    $smt->bindParam(':employee_id', $employee_id);


    $convert_rental = $_POST['rental'] ? $_POST['rental'] : false;
    $convert_delivery = $_POST['delivery'] ? $_POST['delivery'] : false;
    $costumer_id = $_POST['id_costumers_rental'] ? $_POST['id_costumers_rental'] : false;
    $book_id = $_POST['id_book_rental'] ? $_POST['id_book_rental'] : false;
    $employee_id = $_POST['id_employees_rental'] ? $_POST['id_employees_rental'] : false;
    // Convertendo as datas para formato inglês
    $rental = date('Y-m-d', strtotime(str_replace('/', '-', $convert_rental)));
    $delivery = date('Y-m-d', strtotime(str_replace('/', '-', $convert_delivery)));

    $smt->execute();

    if ($smt->rowCount() > 0) {
        $row_dados = $smt->fetch(PDO::FETCH_ASSOC);
        $rental = $row_dados['rental'];
        $delivery = $row_dados['delivery'];
        $costumer_id = $row_dados['costumer_id'];
        $book_id = $row_dados['book_id'];
        $employee_id = $row_dados['employee_id'];
        $_SESSION['msg'] = "<p style='color: #090;'>Aluguel atualizado com sucesso!</p>";
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar o aluguel!</p>";
    }

    header("Location: /front/pages/list/listRentals");
    exit;
}
