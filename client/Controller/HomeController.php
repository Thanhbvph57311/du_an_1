<?php
require_once "./client/models/productmodel.php";
require_once "./client/models/productdb.php";

class HomeController
{
    public function home()
    {
        $productModel = new ProductModel();
        $products = $productModel->getAll();

        include "./client/views/layout/header.php";
        include "./client/views/pages/home.php";
        include "./client/views/layout/footer.php";
    }

    public function product()
    {
        $productModel = new ProductModel();

        if (isset($_GET['brand'])) {
            $brand = $_GET['brand'];
            $products = $productModel->getByBrand($brand);
        } else {
            $products = $productModel->getAll();
        }

        include "./client/views/layout/header.php";
        include "./client/views/pages/products.php";
        include "./client/views/layout/footer.php";
    }

    public function product_detail()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?router=product");
            exit;
        }

        $id = $_GET['id'];
        $productDb = new ProductDb();
        $product = $productDb->getProductById($id);

        if (!$product) {
            echo "Sản phẩm không tồn tại!";
            return;
        }

        include "./client/views/layout/header.php";
        include "./client/views/pages/product-detail.php";
        include "./client/views/layout/footer.php";
    }

    public function add_to_cart()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?router=product");
            exit;
        }

        $id = $_GET['id'];
        $size = $_POST['size'] ?? 40;
        $quantity = $_POST['quantity'] ?? 1;

        $productDb = new ProductDb();
        $product = $productDb->getProductById($id);

        if (!$product) {
            echo "Sản phẩm không tồn tại!";
            return;
        }

        $key = $id . '-' . $size;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['quantity'] += intval($quantity);
        } else {
            $_SESSION['cart'][$key] = [
                'name' => $product['name'],
                'image' => $product['image'] ?? './assets/images/default.png',
                'code' => $product['code'] ?? 'MSP' . $id,
                'price' => $product['price'],
                'size' => $size,
                'quantity' => intval($quantity)
            ];
        }

        header("Location: index.php?router=cart");
    }

    public function update_cart()
    {
        $key = $_POST['key'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;

        if ($key && isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['quantity'] = max(1, intval($quantity));
        }

        header("Location: index.php?router=cart");
    }

    public function remove_cart()
    {
        $key = $_GET['key'] ?? null;

        if ($key && isset($_SESSION['cart'][$key])) {
            unset($_SESSION['cart'][$key]);
        }

        header("Location: index.php?router=cart");
    }

    public function cart()
    {
        include "./client/views/layout/header.php";
        include "./client/views/pages/cart.php";
        include "./client/views/layout/footer.php";
    }

    public function checkout()
    {
        include "./client/views/layout/header.php";
        include "./client/views/pages/checkout.php";
        include "./client/views/layout/footer.php";
    }

    public function checkout_submit()
    {
        require_once "./client/models/orderdb.php";

        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $cart = $_SESSION['cart'] ?? [];

        if (empty($cart)) {
            echo "Giỏ hàng trống!";
            return;
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $orderDb = new OrderDb();
        $orderId = $orderDb->createOrder($name, $phone, $address, $total);

        foreach ($cart as $key => $item) {
            $productId = explode('-', $key)[0];
            $orderDb->addOrderItem(
                $orderId,
                $productId,
                $item['name'],
                $item['price'],
                $item['quantity'],
                $item['size']
            );
        }

        unset($_SESSION['cart']);
        header("Location: index.php?router=checkout_success");
    }

}