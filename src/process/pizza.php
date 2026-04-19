<?php

    $method = $_SERVER["REQUEST_METHOD"];

    //Resgate dos dados, montagem do pedido
    if($method === "GET") {
        //Consulta no banco de todas as bordas
        $bordasQuery = $conn->query("SELECT * FROM bordas");
        $bordas = $bordasQuery->fetchAll();
        //Consulta no banco de todas as massas
        $massasQuery = $conn->query("SELECT * FROM massas");
        $massas = $massasQuery->fetchAll();
        //Consulta no banco de todos os sabores
        $saboresQuery = $conn->query("SELECT * FROM sabores");
        $sabores = $saboresQuery->fetchAll();
    //Envio de dados, criação do pedido
    } else if($method === "POST") {
    
    }
?>