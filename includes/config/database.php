<?php

function conectarDB () : mysqli {

    $servername = $_ENV['DB_HOST'];
    $database = $_ENV['DB_BD'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];


    $db = new mysqli($servername, $username, $password, $database);


    if(!$db) {

        die("Conexión fallida: " . mysqli_connect_error());
    }

    return $db;

    mysqli_close($db);

}