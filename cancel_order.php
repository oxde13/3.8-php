<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $reason = $_POST['reason'];

    $pdo = new PDO('mysql:host=localhost;dbname=cancel_order', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO orders (order_id, cancel_reason) VALUES (:order_id, :cancelason)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['order_id' => $order_id, 'cancelason' => $reason]);
    echo "Заказ #$order_id успешно отменен!";
} else {
    echo "Неправильный метод запроса.";
}
