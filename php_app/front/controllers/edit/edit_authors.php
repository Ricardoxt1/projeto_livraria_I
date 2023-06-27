<?php
session_start();
ob_start();
include_once '../../../config.php';
$pdo = conectar();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Autor não encontrado!</p>";
    header("Location: /front/controllers/list/list_authors.php");
    exit;
}

$query_authors = "SELECT id, name FROM authors WHERE id = $id";
$result_authors = $pdo->prepare($query_authors);
$result_authors->execute();

if (($result_authors) and ($result_authors->rowCount() != 0)) {
    $row_authors = $result_authors->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Autor não encontrado!</p>";
    header("Location: /front/controllers/list/list_authors.php");
    exit;
};

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de autores</title>

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
                                <span>Cadastro</span>
                            </h6>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_costumers.php">
                                <span data-feather="usuario" class="align-text-bottom"></span>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_books.php">
                                <span data-feather="Livros" class="align-text-bottom"></span>
                                Livros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_publishers.php">
                                <span data-feather="Editoras" class="align-text-bottom"></span>
                                Editoras
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_employees.php">
                                <span data-feather="Funcionário(a)" class="align-text-bottom"></span>
                                Funcionário(a)
                            </a>
                        </li>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <span>Opções</span>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/registers/register_rentals.php">
                                    <span name="name" class="align-text-bottom"></span>
                                    Alugar livro
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../list/list_costumers.php">
                                    <span data-feather="file-text" class="align-text-bottom"></span>
                                    Listagem
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../edit/edit_users.php">
                                    <span data-feather="file-text" class="align-text-bottom"></span>
                                    Editar itens
                                </a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </nav>

            <main class="col-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <body class="bg-body-tertiary">

                        <div class="container">
                            <main>
                                <div class="py-5 ml-2">
                                    <h2>Editar Autores</h2>
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
                                        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                                        if (!empty($dados["edit_authors"])) {
                                            var_dump($dados);
                                        }

                                        ?>

                                    </div>
                                    <div class="row g-5 pt-5">
                                        <div class="col-md-7 col-lg-10">
                                            <h5 class="mb-3">Informações revelantes sobre o autor</h5>
                                        </div>
                                    </div>

                                    <form class="needs-validation" action="" method="post" novalidate="">
                                        <div class="row g-3">
                                            <div class="col-sm-7">
                                                <label for="name_author" class="form-label">Nome do autor</label>
                                                <input type="text" class="form-control" name="name" id="name_author" value=<?php
                                                                                                                            if (isset($dados['name'])) {
                                                                                                                                echo $dados['name'];
                                                                                                                            } elseif (isset($row_authors['name'])) {
                                                                                                                                echo $row_authors['name'];
                                                                                                                            } ?> required>

                                                <hr class="my-4">

                                                <input class="w-20 btn btn-primary btn-ls" type="submit" value="Salvar" name="edit_authors">
                                            </div>
                                        </div>
                                    </form>


                                    <!-- <form class="needs-validation" action="../../../pdo/edit/edit_authors.php" method="post" novalidate>
                                        <div class="row g-3">
                                            <div class="col-sm-7">
                                                <label for="name_author" class="form-label">Nome do autor</label>
                                                <input type="text" class="form-control" name="name" id="name_author" value="" required>
                                                <hr class="my-4">

                                                <button class="w-20 btn btn-primary btn-ls" type="submit">Enviar</button>
                                            </div>
                                        </div>
                                    </form> -->
                                </div>
                                <footer class="text-muted py-5">
                                    <div class="container">
                                        <p class="mb-1">© 2023 Biblioteca Pedbot</p>
                                    </div>
                                </footer>
                            </main>
                        </div>

                    </body>

                </div>
            </main>

        </div>
    </div>
</body>

</html>