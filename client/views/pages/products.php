<section class="shop-page">
    <div class="shop-container">
        <!-- Sidebar thương hiệu -->
        <aside class="shop-sidebar">
            <h3>Thương hiệu</h3>
            <ul>
                <li><a href="?router=product&brand=Lacoste">Lacoste</a></li>
                <li><a href="?router=product&brand=Adidas">Adidas</a></li>
                <li><a href="?router=product&brand=Nike">Nike</a></li>
                <li><a href="?router=product&brand=Puma">Puma</a></li>
            </ul>
        </aside>

        <!-- Danh sách sản phẩm -->
        <div class="shop-content">
            <h2>Tất cả sản phẩm</h2>
            <div class="shop-grid">
                <?php foreach ($products as $product): ?>
                <div class="shop-card">
                    <a href="?router=product_detail&id=<?= $product['id'] ?>">
                        <img src="./assets/images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </a>
                    <h4><a href="?router=product_detail&id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h4>
                    <p><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>