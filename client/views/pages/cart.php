<?php require_once "./client/views/layout/header.php"; ?>
<section class="cart-container">
    <h2>GIỎ HÀNG CỦA BẠN</h2>
    <table class="cart-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if (!empty($_SESSION['cart'])):
                foreach ($_SESSION['cart'] as $index => $item):
                    $item_total = $item['quantity'] * $item['price'];
                    $total += $item_total;
                    ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><img src="<?= $item['image'] ?>" width="70"></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['size']) ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($item_total) ?>đ</td>
                <td><a href="index.php?router=remove-from-cart&index=<?= $index ?>">Xóa</a></td>
            </tr>
            <?php endforeach; else: ?>
            <tr>
                <td colspan="7">Giỏ hàng trống</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if (!empty($_SESSION['cart'])): ?>
    <div class="cart-footer">
        <p class="total-price">Tổng tiền: <?= number_format($total) ?>đ</p>
        <a href="index.php?router=checkout" class="cart-checkout-all">Thanh toán tất cả</a>
    </div>
    <?php endif; ?>
</section>
<?php require_once "./client/views/layout/footer.php"; ?>