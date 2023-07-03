<?php

function conectar()
{

    $servidor = "mysql";
    $usuario = "root";
    $senha = "root";
    $dbname = "library";

    try {
        $pdo = new PDO("mysql:host=$servidor; dbname=$dbname", $usuario, $senha);
        $pdo->exec("SET CHARACTER SET utf8");
    } catch (\Throwable $th) {
        return $th;
        die;
    }

    return $pdo;
}