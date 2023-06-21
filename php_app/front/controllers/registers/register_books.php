<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Um projeto voltado ao sistema de gestão para biblioteca">
    <meta name="Ricardo" content="Sistema de biblioteca">
    <meta name="generator" content="Ricardo">
    <title>Cadastro de livros</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="../../bootstrap-5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
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
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Cadastro</span>
                            </h6>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_costumers.php">
                                <span data-feather="usuarios" class="align-text-bottom"></span>
                                Usuarios
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_authors.php">
                                <span data-feather="autores" class="align-text-bottom"></span>
                                Autores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_publishers.php">
                                <span data-feather="editoras" class="align-text-bottom"></span>
                                Editoras
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/registers/register_employees.php">
                                <span data-feather="funcionários" class="align-text-bottom"></span>
                                Funcionário(a)
                            </a>
                        </li>

                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
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
                            <a class="nav-link" href="../list/list_users.html">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Listagem
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../edit/edit_users.html">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Editar itens
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <body class="bg-body-tertiary">

                        <div class="container ">
                            <main>
                                <div class="py-5 ml-2 text-center">
                                    <h2>Cadastro de Livros</h2>
                                </div>

                                <div class="row g-5 px-5 mx-3 ">

                                    <div class="col-md-7 col-lg-10">
                                        <h5 class="mb-3">Informações revelantes sobre o livro</h5>
                                        <form class="needs-validation"
                                            action="../../../pdo/registers/register_books.php" method="post"
                                            novalidate="">
                                            <div class="row g-3">
                                                <div class="col-sm-7">
                                                    <label for="titule_book" class="form-label">Titulo</label>
                                                    <input type="text" class="form-control" name="titule"
                                                        id="titule_book" placeholder="A bela e a fera " value=""
                                                        required="">
                                                    <div class="invalid-feedback">
                                                        É necessario digitar o titulo do livro.
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for="paginas_book" class="form-label">Número de
                                                        páginas</label>
                                                    <input type="number" class="form-control" name="page"
                                                        id="paginas_book" placeholder="123" value="" required="">
                                                    <div class="invalid-feedback">
                                                        É necessario digitar quantidade de páginas do livro.
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="realese_book" class="form-label">Data de
                                                        lançamento</label>
                                                    <input type="number" min="1900" max="2099" step="1"
                                                        class="form-control" name="realese_date" id="realese_book"
                                                        placeholder="1999" value="" required="">
                                                    <div class="invalid-feedback">
                                                        É necessario digitar o ano de lançamento do livro.
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="id_author" class="form-label">Id do autor </label>
                                                    <input type="number" class="form-control" name="id_autor_book"
                                                        id="id_author" placeholder="1">
                                                    <div class="invalid-feedback">
                                                        Por favor, entre com um id de autor existente.
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="id_libraries" class="form-label">Id da
                                                        biblioteca</label>
                                                    <input type="number" class="form-control" name="id_libraries_book"
                                                        id="id_libraries" placeholder="1">
                                                    <div class="invalid-feedback">
                                                        Por favor, entre com um id de biblioteca existente.
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for="id_publishers" class="form-label">Id da
                                                        editora</label>
                                                    <input type="number" class="form-control" name="id_publishers_book"
                                                        id="id_publishers" placeholder="1">
                                                    <div class="invalid-feedback">
                                                        Por favor, entre com um id de biblioteca existente.
                                                    </div>
                                                </div>

                                            </div>

                                            <hr class="my-4">

                                            <button class="w-20 btn btn-primary btn-ls" type="submit">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </main>

                            <footer class="text-muted py-5">
                                <div class="container">
                                    <p class="mb-1">© 2023 Biblioteca Pedbot</p>
                                </div>
                            </footer>
                        </div>

                    </body>
                </div>
            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>