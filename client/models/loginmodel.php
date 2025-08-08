<?php
class UserModel
{
    private $conn;

    public function __construct()
    {
        require_once __DIR__ . '/../../config/database.php';
        $this->conn = Database::getConnection();
    }

    public function checkLogin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password  // Nếu có hash thì dùng password_verify
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}