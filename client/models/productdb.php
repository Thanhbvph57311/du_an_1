<?php

// File: client/models/productdb.php
require_once __DIR__ . '/../../config/database.php';

class ProductDb
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}