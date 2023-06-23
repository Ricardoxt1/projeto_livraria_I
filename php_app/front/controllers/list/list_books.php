<?php
include_once '../../../config.php';
$pdo = conectar();
?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/5.2/examples/album/ -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Um projeto voltado ao sistema de gestão para biblioteca">
    <meta name="Ricardo" content="Sistema de biblioteca">
    <meta name="generator" content="Ricardo">
    <title>Biblioteca Pedbot</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">





    <link href="../../../bootstrap-5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


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

    <header>
        <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Biblioteca Pedbot</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="https://getbootstrap.com/docs/5.2/examples/album/#" class="navbar-brand d-flex align-items-center">

                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg>
                <strong>Livros</strong>
            </a>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="../../controllers/list/list_costumers.php">Voltar a listagem</a>
                </div>
            </div>
        </header>
    </header>



    <main>
        <div class='album py-5 bg-light'>
            <div class='container'>
                <div class='row row-cols-1 row-cols-md-4 g-5 offset-md-1 '>
                    <?php
                    $query_books = "SELECT titule, page, realese_date, author_id, library_id, publisher_id FROM books ";
                    $result_books = $pdo->prepare($query_books);
                    $result_books->execute();

                    if (($result_books) and ($result_books->rowCount() != 0)) {
                        while ($row_book = $result_books->fetch(PDO::FETCH_ASSOC)) {
                            echo "<div class='col'>
                                    <div class='card shadow-sm'>
                                        <svg class='bd-placeholder-img card-img-top' width='100%' height='300' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'>
                                            <title>Placeholder</title>
                                            <rect width='100%' height='100%' fill='#55595c'></rect><text x='50%' y='50%' fill='#eceeef' dy='.3em'>Thumbnail</text>
                                        </svg>
        
                                        <div class='card-body p-4 m-'>
                                            <p class='card-text'>Titulo: " . $row_book['titule'] . "</p>
                                            <p class='card-text'>Páginas: " . $row_book['page'] . "</p>
                                            <p class='card-text'>Lançamento: " . $row_book['realese_date'] . "</p>
                                            <p class='card-text'>Editora: " . $row_book['publisher_id'] . "</p>
                                            <div class='d-flex justify-content-between align-items-center'>
                                                <div class='btn-group m-1'>
                                                    <a class='m-2' href='../edit/edit_books.php'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                                                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                                                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                                                   </svg>
                                                    </a>
                                                    <a class='m-2' href='../delete/delete_books.php'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z' />
                                                                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z' /></svg>
                                                     </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "<p style='color:red;'>Não foi realizada a listagem com sucesso.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="../list/list_books.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
                            <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                        </svg></a>
                </p>
                <p class="mb-1">© 2023 Biblioteca Pedbot</p>
            </div>
        </footer>
    </main>
    <script src="./Album example · Bootstrap v5.2_files/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>