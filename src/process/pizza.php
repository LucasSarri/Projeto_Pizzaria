<?php
    require_once("conn.php");

    $method = $_SERVER["REQUEST_METHOD"];

    if($method === "GET") {
        $bordasQuery = $conn->query("SELECT * FROM bordas");
        $bordas = $bordasQuery->fetchAll();
        $massasQuery = $conn->query("SELECT * FROM massas");
        $massas = $massasQuery->fetchAll();
        $saboresQuery = $conn->query("SELECT * FROM sabores");
        $sabores = $saboresQuery->fetchAll();
    } else if($method === "POST") {
        $data = $_POST;

        $borda = $data["borda"] ?? null;
        $massa = $data["massa"] ?? null;
        $sabores = $data["sabores"] ?? [];

        if (count($sabores) > 3) {
            $_SESSION["msg"] = "Selecione no máximo 3 sabores!";
            $_SESSION["status"] = "warning";
        } else {
            $conn->beginTransaction();

            $stmt = $conn->prepare("INSERT INTO pizzas (borda_id, massa_id) VALUES (:borda, :massa )");
            $stmt->bindParam(":borda", $borda, PDO::PARAM_INT);
            $stmt->bindParam(":massa", $massa, PDO::PARAM_INT);
            $stmt->execute();

            $pizzaID = $conn->lastInsertId();
            $stmt = $conn->prepare("INSERT INTO pizza_sabor (pizza_id, sabor_id) VALUES (:pizza, :sabor)");
            foreach($sabores as $sabor) {
                $stmt->bindParam(":pizza", $pizzaID, PDO::PARAM_INT);
                $stmt->bindParam(":sabor", $sabor, PDO::PARAM_INT);
                $stmt->execute();
            }

            $stmt = $conn->prepare("INSERT INTO pedidos (pizza_id, status_id) VALUES (:pizza, :status)");
            $statusID = 1;
            $stmt->bindParam(":pizza", $pizzaID, PDO::PARAM_INT);
            $stmt->bindParam(":status", $statusID, PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();

            $_SESSION["msg"] = "Pedido realizado com sucesso!";
            $_SESSION["status"] = "success";
        }

        header("Location: /index.php");
        exit;
    }
?>