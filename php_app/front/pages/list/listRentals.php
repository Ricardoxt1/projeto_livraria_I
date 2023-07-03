<?php
session_start();
ob_start();
include_once '../../../config.php';
$connection = connect();
?>
<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Um projeto voltado ao sistema de gestão para biblioteca">
    <meta name="Ricardo" content="Sistema de biblioteca">
    <meta name="generator" content="Ricardo">
    <title>Listagem de Alugueis</title>


    <link href="../dashboard/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../bootstrap-5.2.3/dist/css/pages.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="../../../bootstrap-5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

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
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand text-light col-md-3 col-lg-2 me-0 px-3 fs-6">Biblioteca Pedbot</a>
        <button class="navbar-toggler position-center d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../menu/menu">Voltar ao menu</a>
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
                                <span>Listagem de itens</span>
                            </h6>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/listCostumers">
                                <span data-feather="listCostumers" class="align-text-bottom">Usuarios</span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/listBooks">
                                <span data-feather="listBooks" class="align-text-bottom">Livros</span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/listAuthors">
                                <span data-feather="listAuthors" class="align-text-bottom">Autores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/listPublishers">
                                <span data-feather="listPublishers" class="align-text-bottom">Editoras</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/listEmployees">
                                <span data-feather="listEmployees" class="align-text-bottom">Funcionário(a)</span>
                            </a>
                        </li>

                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Opções</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="../register/registerCostumer">
                                <span data-feather="rentals" class="align-text-bottom">Cadastrar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm col-lg-9 px-md-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Listagem de Alugueis</h1>
                </div>
                <div>
                    <?php

                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center table-ls">
                        <thead>
                            <tr>
                                <th scope="col">Consumidor</th>
                                <th scope="col">Livro</th>
                                <th scope="col">Data do aluguel</th>
                                <th scope="col">Previsão de entrega</th>
                                <th scope="col">Funcionário responsável</th>
                            </tr>
                        </thead>

                        <?php
                        $query_rentals = "SELECT rentals.id as rentals_id, rental, delivery, costumers.name as costumers_name, books.titule as books_titule, employees.name as employees_name 
                        FROM rentals 
                        inner join books on books.id = rentals.book_id 
                        inner join employees on employees.id = rentals.employee_id 
                        inner join costumers on costumers.id = rentals.costumer_id";
                        $result_rentals = $connection->prepare($query_rentals);
                        $result_rentals->execute();

                        if (($result_rentals) and ($result_rentals->rowCount() != 0)) {
                            while ($row_rentals = $result_rentals->fetch(PDO::FETCH_ASSOC)) {
                                $id = $row_rentals['rentals_id'];
                                echo "                             
                                        <form action='' method='get'>
                                            <tbody>
                                                <tr>
                                                    <td name='id_costumers_rentals'>$row_rentals[costumers_name]</td>
                                                    <td name='id_book_rentals'>$row_rentals[books_titule]</td>
                                                    <td name='rental'>$row_rentals[rental]</td>
                                                    <td name='delivey'>$row_rentals[delivery]</td>
                                                    <td name='id_employee_rentals'>$row_rentals[employees_name]</td>
                                                    <td name='edit_name'><a href='../edit/editRental.php?id=$id'><svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>
                                                                        </a>
                                                                        <td name='delete_name'>
                                                                            <a href='#' data-toggle='modal' data-target='#confirmDeleteModal$id'>
                                                                                <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z' />
                                                                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z' />
                                                                                </svg>
                                                                            </a>
                        
                                                                            <!-- Modal de confirmação de deleção -->
                                                                            <div class='modal fade' id='confirmDeleteModal$id' tabindex='-1' role='dialog' aria-labelledby='confirmDeleteModalLabel' aria-hidden='true'>
                                                                                <div class='modal-dialog' role='document'>
                                                                                    <div class='modal-content'>
                                                                                        <div class='modal-header'>
                                                                                            <h5 class='modal-title' id='confirmDeleteModalLabel'>Confirmar Deleção</h5>
                                                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                                                <span aria-hidden='true'>&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class='modal-body'>
                                                                                            Tem certeza de que deseja excluir este livro?
                                                                                        </div>
                                                                                        <div class='modal-footer'>
                                                                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                                                            <a href='../../../controllerDB/delete/deleteRental.php?id=$id' class='btn btn-danger'>Excluir</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                         </td>
                                                        
                                                    </td>
                                                </tr>
                
                                            </tbody>
                                        </form>";
                            }
                        } else {
                            echo "<p style='color:red;'>Não foi possível realizar a listagem com sucesso.</p>";
                        };

                        ?>
                    </table>


                </div>

                <footer class="text-muted text-center py-5">
                    <div class="container">
                        <p class="mb-1">© 2023 Biblioteca Pedbot</p>
                    </div>
                </footer>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../../../bootstrap-5.2.3/dist/css/bootstrap.css"></script>
    <script src="../../../bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>

</body>

</html>