<?php
include_once('../../config.php');
$pdo = conectar();


$id = 2;

$sql = "DELETE FROM rentals WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);