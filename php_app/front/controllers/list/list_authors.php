<?php
include_once '../../../config.php';
$pdo = conectar();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de autores</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" href="../../../bootstrap-5.2.3/dist/css/bootstrap.min.css">


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
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6">Biblioteca Pedbot</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../dashboard/menu.php">Voltar ao menu</a>
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
                            <a class="nav-link" href="../list/list_books.php">
                                <span data-feather="list_books" class="align-text-bottom"> Livros</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/list_costumers.php">
                                <span data-feather="list_costumers" class="align-text-bottom">Usuarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/list_publishers.php">
                                <span data-feather="list_publishers" class="align-text-bottom">Editoras</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list/list_employees.php">
                                <span data-feather="list_employees" class="align-text-bottom">Funcionário(a)</span>
                            </a>
                        </li>

                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Opções</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="../list/list_rentals.php">
                                <span name="name" class="align-text-bottom">Alugueis</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../registers/register_costumers.php">
                                <span data-feather="file-text" class="align-text-bottom">Cadastrar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../edit/edit_costumers.php">
                                <span data-feather="file-text" class="align-text-bottom">Editar itens</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm col-lg-4 start px-md-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Listagem de Autores</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-ls">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>



                        <?php
                        $query_authors = "SELECT name FROM authors ";
                        $result_authors = $pdo->prepare($query_authors);
                        $result_authors->execute();

                        if (($result_authors) and ($result_authors->rowCount() != 0)) {
                            while ($row_authors = $result_authors->fetch(PDO::FETCH_ASSOC)) {

                                echo "                             
                                <form action='../../../pdo/list/list_authors.php' method='get'>
                                    <tbody>
                                        <tr>
                                            <td name='name_authors'>$row_authors[name]</td>
                                            <td name='name_authors'>$row_authors[name]</td>
                                        </tr>
        
                                    </tbody>
                                </form>";
                            }
                        } else {
                            echo "<p style='color:red;'>Não foi realizadar a listagem com sucesso.</p>";
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
</body>

</html>