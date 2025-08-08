<?php
class Database
{
    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=du_an_1;charset=utf8", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }
}