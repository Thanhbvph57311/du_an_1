<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./assets/public/login.css">
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
                    <input type="password" name="password" id="password" placeholder="Mật khẩu">
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

    <script src="./client/assets/js/login-validate.js"></script>
</body>

</html>