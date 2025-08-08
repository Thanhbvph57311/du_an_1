<!-- Slideshow -->
<section class="slideshow">
    <!-- Slideshow ảnh... -->
</section>

<!-- Thương hiệu nổi bật -->
<section class="brands">
    <!-- Thương hiệu nổi bật... -->
</section>

<!-- Sản phẩm -->
<section class="products">
    <h2>SẢN PHẨM</h2>
    <div class="product-grid">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
            <div class="product-image">
                <a href="index.php?router=product-detail&id=<?= $product['id'] ?>">
                    <img src="./assets/images/<?= htmlspecialchars($product['image']) ?>"
                        alt="<?= htmlspecialchars($product['name']) ?>">
                </a>
                <div class="icons">
                    <span class="wishlist"><i class="fas fa-heart"></i></span>
                    <span class="cart"><i class="fas fa-shopping-cart"></i></span>
                </div>
            </div>
            <p class="product-name">
                <a
                    href="index.php?router=product-detail&id=<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></a>
            </p>
            <p class="product-name">Giày Nam</p>
            <p class="price"><?= number_format($product['price'], 0, ',', '.') ?>đ</p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Tin tức -->
<section class="news">
    <!-- Tin tức tĩnh... -->
</section>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000);
}
</script>