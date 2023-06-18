<?php
include_once('../../config.php');
$pdo = conectar();

$id = 1;
$titule = "dasdddddddd";
$page = 220;
$realese_date = '2003';
$author_id = null;
$library_id = null;
$publisher_id = null;

$tabela = 'books';

$stmt = $pdo->prepare('UPDATE ' . $tabela . ' SET titule = :titule, page = :page, realese_date = :realese_date, author_id = :author_id, library_id = :library_id, publisher_id = :publisher_id  WHERE :id');
$stmt->execute(array(
    ':id' => $id,
    ':titule' => $titule,
    ':page' => $page,
    ':realese_date' => $realese_date,
    ':author_id' => $author_id,
    ':library_id' => $library_id,
    ':publisher_id' => $publisher_id,

));
