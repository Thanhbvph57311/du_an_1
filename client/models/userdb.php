<?php
require_once __DIR__ . '/../../config/database.php';

class UserDb
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection(); // Đảm bảo class Database có tồn tại
    }

    public function checkLogin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function isUsernameExists($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch() ? true : false;
    }

    public function registerUser($email_phone, $password, $fullname, $username)
    {
        $sql = "INSERT INTO users (email, password, fullname, username) 
            VALUES (:email, :password, :fullname, :username)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email_phone,
            ':password' => $password,
            ':fullname' => $fullname,
            ':username' => $username
        ]);
    }

}
?>