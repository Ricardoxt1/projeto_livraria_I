<?php

function connect()
{

    $server = "mysql";
    $user = "root";
    $password = "root";
    $dbname = "library";

    try {
        $connection = new PDO("mysql:host=$server; dbname=$dbname", $user, $password);
        $connection->exec("SET CHARACTER SET utf8");
    } catch (\Throwable $th) {
        return $th;
    }

    return $connection;
}
