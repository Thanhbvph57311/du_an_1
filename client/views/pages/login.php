<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./assets/public/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <div class="login-image">
            <img src="./assets/images/login.png" alt="Ig Preview">
        </div>

        <div class="login-form">
            <div class="form-box">
                <h1 class="logo-text">SHOES</h1>

                <form action="index.php?router=login_submit" method="POST" id="loginForm">
                    <input type="text" name="username" id="username" placeholder="Tên đăng nhập">

                    <!-- Ô nhập mật khẩu có icon con mắt -->
                    <div class="password-container">
                        <input type="password" name="password" id="password" placeholder="Mật khẩu">
                        <span class="toggle-password"><i class="fas fa-eye"></i></span>
                    </div>

                    <button type="submit">Đăng nhập</button>
                </form>

                <div class="divider"><span>HOẶC</span></div>

                <button class="facebook-btn">Đăng nhập bằng Facebook</button>
                <p class="forgot">Quên mật khẩu?</p>
            </div>

            <div class="register-box">
                Chưa có tài khoản? <a href="index.php?router=register">Đăng ký</a>
            </div>
        </div>
    </div>

    <script src="./views/layout/site/layout-site.js"></script>
    <script>
        // Toggle password visibility
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>