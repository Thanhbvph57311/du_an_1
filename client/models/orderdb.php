<?php
require_once "./config/database.php";

class OrderDb
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function createOrder($name, $phone, $address, $totalPrice)
    {
        $stmt = $this->pdo->prepare("INSERT INTO orders (customer_name, customer_phone, customer_address, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $phone, $address, $totalPrice]);
        return $this->pdo->lastInsertId(); // Trả về ID đơn hàng vừa tạo
    }

    public function addOrderItem($orderId, $productId, $productName, $price, $quantity, $size)
    {
        $stmt = $this->pdo->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity, size) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$orderId, $productId, $productName, $price, $quantity, $size]);
    }
}