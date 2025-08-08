<?php require_once "./client/views/layout/header.php"; ?>

<section class="product-detail">
    <div class="detail-container">
        <!-- Ảnh sản phẩm -->
        <div class="detail-images">
            <div class="detail-thumbnails">
                <img src="./assets/images/shoe1.png" alt="thumb">
                <img src="./assets/images/shoe2.png" alt="thumb">
                <img src="./assets/images/shoe3.png" alt="thumb">
            </div>
            <div class="detail-main-image">
                <img src="./assets/images/shoe1.png" alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="detail-info">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p class="detail-price"><?= number_format($product['price']) ?>đ</p>
            <p class="detail-stock">Trạng thái:
                <span class="<?= $product['stock'] > 0 ? 'in-stock' : 'out-stock' ?>">
                    <?= $product['stock'] > 0 ? "Còn hàng ({$product['stock']} đôi)" : "Hết hàng" ?>
                </span>
            </p>
            <p class="detail-desc"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

            <!-- Form mua hàng -->
            <form action="index.php?router=add-to-cart&id=<?= $product['id'] ?>" method="POST">
                <!-- Chọn size -->
                <div class="detail-size-select">
                    <p>Chọn size</p>
                    <?php foreach ([38, 39, 40, 41, 42] as $size): ?>
                    <button type="button" class="size-btn<?= $size == 39 ? ' active' : '' ?>" data-size="<?= $size ?>">
                        <?= $size ?>
                    </button>
                    <?php endforeach; ?>
                    <input type="hidden" name="size" id="selected-size" value="39">
                </div>

                <!-- Số lượng -->
                <div class="detail-quantity">
                    <p>Số lượng</p>
                    <button type="button" class="qty-btn" onclick="changeQty(-1)">-</button>
                    <input type="number" name="quantity" id="qty-input" value="1" min="1"
                        max="<?= $product['stock'] ?>">
                    <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                </div>

                <!-- Nút thao tác -->
                <div class="detail-buttons">
                    <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>
                    <a href="index.php?router=checkout" class="buy-now">Mua ngay</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
// Xử lý chọn size
const sizeButtons = document.querySelectorAll(".size-btn");
const sizeInput = document.getElementById("selected-size");

sizeButtons.forEach(btn => {
    btn.addEventListener("click", () => {
        sizeButtons.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");
        sizeInput.value = btn.dataset.size;
    });
});

// Xử lý tăng giảm số lượng
function changeQty(amount) {
    const qtyInput = document.getElementById("qty-input");
    let current = parseInt(qtyInput.value);
    const min = parseInt(qtyInput.min);
    const max = parseInt(qtyInput.max);
    let newQty = current + amount;
    if (newQty >= min && newQty <= max) {
        qtyInput.value = newQty;
    }
}
</script>

<?php require_once "./client/views/layout/footer.php"; ?>