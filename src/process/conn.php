<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
 
    $user = "user";
    $pass = "Pizz4ria@99";
    $db = "pizzaria_db";
    $host = "db";

    try {
        $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        die("Erro na conexão com banco");
    }