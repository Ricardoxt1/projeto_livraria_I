<?php
include_once('../../config.php');
$pdo = conectar();


$id = 4;

$sql = "DELETE FROM authors WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);
