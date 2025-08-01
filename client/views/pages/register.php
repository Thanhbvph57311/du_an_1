<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - SHOES</title>
    <link rel="stylesheet" href="./assets/public/register.css">
</head>

<body>
    <div class="container">
        <h2>SHOES</h2>

        <button class="facebook-btn">Đăng nhập bằng Facebook</button>

        <div class="divider"><span>Hoặc</span></div>

        <form action="index.php?router=register_submit" method="POST" id="registerForm">
            <input type="text" name="email_phone" placeholder="Số điện thoại hoặc email">
            <input type="password" name="password" placeholder="Mật khẩu">
            <input type="text" name="fullname" placeholder="Tên đầy đủ">
            <input type="text" name="username" placeholder="Tên người dùng">

            <p class="policy">
                Những người dùng dịch vụ của chúng tôi có thể đã tải thông tin liên hệ của bạn lên Shoes.
                <a href="#">Tìm hiểu thêm</a><br><br>
                Bằng cách đăng ký, bạn đồng ý với <a href="#">Điều khoản</a>,
                <a href="#">Chính sách quyền riêng tư</a> và
                <a href="#">Chính sách cookie</a> của chúng tôi.
            </p>

            <button type="submit">Đăng ký</button>
        </form>
    </div>

    <div class="bottom-box">
        Bạn đã có tài khoản? <a href="index.php?router=login">Đăng nhập</a>
    </div>

    <script src="./client/assets/js/register-validate.js"></script>
</body>

</html>