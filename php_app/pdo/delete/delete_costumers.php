<?php
include_once('../../config.php');
$pdo = conectar();


$id = 1;

$sql = "DELETE FROM costumers WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$id]);