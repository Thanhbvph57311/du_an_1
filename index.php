<?php
session_start();

$router = isset($_GET["router"]) ? $_GET["router"] : null;

// Chỉ require_once 1 lần duy nhất
require_once "./client/controller/homecontroller.php";
require_once "./client/controller/usercontroller.php";

switch ($router) {
    // User
    case 'login':
        (new UserController())->login();
        break;

    case 'login_submit':
        (new UserController())->login_submit();
        break;

    case 'logout':
        (new UserController())->logout();
        break;

    case 'register':
        (new UserController())->register();
        break;

    case 'register_submit':
        (new UserController())->register_submit();
        break;


    case 'update':
        (new UserController())->update();
        break;

    // Product & Cart
    // Thêm giỏ hàng

    case 'add_cart':
        (new HomeController())->add_to_cart();
        break;

    // Cập nhật số lượng giỏ hàng

    case 'update_cart':
        (new HomeController())->update_cart();
        break;

    // Xóa sản phẩm khỏi giỏ hàng

    case 'remove_cart':
        (new HomeController())->remove_cart();
        break;

    case 'checkout':
        $controller->checkout();
        break;

    case 'checkout_submit':
        $controller->checkout_submit();
        break;

    case 'checkout_success':
        echo "<h2>Đặt hàng thành công!</h2>";
        break;



    case 'product':
        (new HomeController())->product();
        break;

    case 'product-detail':
        (new HomeController())->product_detail();
        break;

    default:
        (new HomeController())->home();
        break;
}
?>