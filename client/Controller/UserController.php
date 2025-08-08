<?php
require_once __DIR__ . '/../models/userdb.php'; // Tên file viết thường

class UserController
{
    public function login()
    {
        $userModel = new UserDb(); // Bạn đã gọi ở đây nên phải require file model
        require_once "./client/views/pages/login.php";
    }

    public function register()
    {
        require_once "./client/views/pages/register.php"; // không nên load login
    }

    public function update()
    {
        // tạm thời để trống
    }

    public function login_submit()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserDb();
        $user = $userModel->checkLogin($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: index.php?router=home');
            exit();
        } else {
            echo "<script>alert('Sai tài khoản hoặc mật khẩu'); window.history.back();</script>";
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: index.php?router=login');
        exit();
    }

    public function register_submit()
    {
        // Lấy dữ liệu từ form
        $email_phone = $_POST['email_phone'] ?? '';
        $password = $_POST['password'] ?? '';
        $fullname = $_POST['fullname'] ?? '';
        $username = $_POST['username'] ?? '';

        // Validate đơn giản
        if (empty($email_phone) || empty($password) || empty($fullname) || empty($username)) {
            echo "Vui lòng điền đầy đủ thông tin.";
            return;
        }

        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Gọi model
        require_once './client/models/userdb.php';
        $userDb = new UserDb();

        // Kiểm tra username đã tồn tại chưa
        if ($userDb->isUsernameExists($username)) {
            echo "Tên người dùng đã tồn tại.";
            return;
        }

        // Thêm người dùng mới
        $userDb->registerUser($email_phone, $hashedPassword, $fullname, $username);

        // Redirect sau khi đăng ký thành công
        header("Location: index.php?router=login");
        exit;
    }

}
?>