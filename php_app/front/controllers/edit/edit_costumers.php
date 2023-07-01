<?php
session_start();
ob_start();
include_once '../../../config.php';
$pdo = conectar();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$query_costumers = "SELECT * FROM costumers WHERE id = $id";
$result_costumers = $pdo->prepare($query_costumers);
$result_costumers->execute();

if (($result_costumers) and ($result_costumers->rowCount() != 0)) {
    $row_costumers = $result_costumers->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuario não encontrado!</p>";
    header("Location: /front/controllers/list/list_costumers");
    exit;
};
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Um projeto voltado ao sistema de gestão para biblioteca">
    <meta name="Ricardo" content="Sistema de biblioteca">
    <meta name="generator" content="Ricardo">
    <title>Edição de Usuarios</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="../../../bootstrap-5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../dashboard/dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Biblioteca Pedbot</a>
        <button class="navbar-toggler position-center d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../controllers/list/list_costumers">Voltar a listagem</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Editar</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/list/list_authors">
                                <span data-feather="edit_authors" class="align-text-bottom">Autores</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/list/list_books">
                                <span data-feather="edit_books" class="align-text-bottom">Livros</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/list/list_publishers">
                                <span data-feather="edit_publishers" class="align-text-bottom">Editoras</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/list/list_employees">
                                <span data-feather="edit_employees" class="align-text-bottom">Funcionário(a)</span>
                            </a>
                        </li>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <span>Opções</span>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/list/list_rentals">
                                    <span name="edit_rentals" class="align-text-bottom">Alugar livro</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../list/list_costumers">
                                    <span data-feather="edit_rentals" class="align-text-bottom">Listagem</span>

                                </a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <body class="bg-body-tertiary">

                        <div class="container">
                            <main>
                                <div class="py-5">
                                    <h2 class="text-center pb-5">Edição de Usuarios</h2>
                                    <div>
                                        <?php
                                        if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <?php

                                        if (isset($_POST['edit_costumers'])) {
                                            // Valide os dados aqui, se necessário

                                            $query_update = "UPDATE costumers 
                                            SET 
                                            cpf = :cpf, 
                                            name = :name, 
                                            phone_number = :phone_number,
                                            address = :address,
                                            email = :email
                                            WHERE id = $id";

                                            $stmt_update = $pdo->prepare($query_update);
                                            $name = trim($dados['name']); // Apply filtering, removing whitespace
                                            $stmt_update->bindParam(':name', $name);
                                            $stmt_update->bindParam(':phone_number', $phone_number);
                                            $stmt_update->bindParam(':email', $email);
                                            $stmt_update->bindParam(':cpf', $cpf);
                                            $stmt_update->bindParam(':address', $address);
                                            $name = $_POST['name'] ? $_POST['name'] : false;
                                            $phone_number = $_POST['phone_number'] ? $_POST['phone_number'] : false;
                                            $email = $_POST['email'] ? $_POST['email'] : false;
                                            $cpf = $_POST['cpf'] ? $_POST['cpf'] : false;
                                            $address = $_POST['address'] ? $_POST['address'] : false;

                                            // $stmt_update->bindParam(':id', $id);

                                            $stmt_update->execute();

                                            if ($stmt_update->rowCount() > 0) {
                                                $row_dados = $stmt_update->fetch(PDO::FETCH_ASSOC);
                                                $name = $row_dados['name'];
                                                $phone_number = $row_dados['phone_number'];
                                                $email = $row_dados['email'];
                                                $cpf = $row_dados['cpf'];
                                                $address = $row_dados['address'];
                                                $_SESSION['msg'] = "<p style='color: #090;'>Usuario atualizado com sucesso!</p>";
                                            } else {
                                                $_SESSION['msg'] = "<p style='color: #f00;'>Erro ao atualizar o usuario!</p>";
                                            }

                                            header("Location: /front/controllers/list/list_costumers");
                                            exit;
                                        }
                                        ?>

                                        <div class="row g-5">

                                            <div class="col-md-7 col-lg-12">
                                                <h4 class="mb-3">Registro dados pessoais</h4>
                                                <form class="needs-validation" action="" method="post" novalidate="">
                                                    <div class="row g-3">
                                                        <div class="col-sm-7">
                                                            <label for="nome_costumer" class="form-label">Nome completo</label>
                                                            <input type="text" class="form-control" name="name" id="nome_costumer" placeholder="fulano da silva " value="<?php
                                                                                                                                                                            if (isset($row_costumers['name']))
                                                                                                                                                                                echo $row_costumers['name'];
                                                                                                                                                                            ?>">
                                                            <div class="invalid-feedback">
                                                                É necessario digitar o seu nome.
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5">
                                                            <label for="numero_costumer" class="form-label">Telefone</label>
                                                            <input type="number" class="form-control" name="phone_number" id="numero_costumer" placeholder="(00) 0000-0000" value="<?php
                                                                                                                                                                                    if (isset($row_costumers['phone_number']))
                                                                                                                                                                                        echo $row_costumers['phone_number'];
                                                                                                                                                                                    ?>">
                                                            <div class="invalid-feedback">
                                                                É necessario digitar o seu telefone.
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <label for="email_costumer" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                                                            <input type="email" class="form-control" name="email" id="email_costumer" placeholder="you@example.com" value="<?php
                                                                                                                                                                            if (isset($row_costumers['email']))
                                                                                                                                                                                echo $row_costumers['email'];
                                                                                                                                                                            ?>">
                                                            <div class="invalid-feedback">
                                                                Por favor, entre com um email valido.
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-5">
                                                            <label for="cpf_costumer" class="form-label">CPF</label>
                                                            <input type="number" class="form-control" name="cpf" id="cpf_costumer" placeholder="123.456.789-09" min="1" max="14" value="<?php
                                                                                                                                                                                        if (isset($row_costumers['cpf']))
                                                                                                                                                                                            echo $row_costumers['cpf'];
                                                                                                                                                                                        ?>">
                                                            <div class="invalid-feedback">
                                                                É necessario digitar o cpf.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="address_costumer" class="form-label">Endereço</label>
                                                            <input type="text" class="form-control" name="address" id="address_costumer" placeholder="Main ST 1234" value="<?php
                                                                                                                                                                            if (isset($row_costumers['address']))
                                                                                                                                                                                echo $row_costumers['address'];
                                                                                                                                                                            ?>">
                                                            <div class="invalid-feedback">
                                                                Por favor, entre com endereço valido.
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <hr class="my-4">

                                                    <input class="w-20 btn btn-primary btn-ls" type="submit" value="Salvar" name="edit_costumers">

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </main>
                        </div>

                    </body>
                </div>
            </main>
            <footer class="text-muted py-5">
                <div class="container">
                    <p class="mb-1">© 2023 Biblioteca Pedbot</p>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../../bootstrap-5.2.3/dist/css/bootstrap.css"></script>
    <script src="../../../bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>