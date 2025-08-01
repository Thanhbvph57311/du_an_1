<?php

require_once "./client/views/layout/header.php"

    ?>


<!-- Slideshow -->
<section class="slideshow">
    <div class="slide fade">
        <img src="./assets/images/slideshow1.png" alt="Slide 1">
    </div>
    <div class="slide fade">
        <img src="./assets/images/slideshow2.png" alt="Slide 2">
    </div>
    <div class="slide fade">
        <img src="./assets/images/slideshow3.png" alt="Slide 3">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</section>

<!-- Thương hiệu nổi bật -->
<section class="brands">
    <h2>THƯƠNG HIỆU NỔI BẬT</h2>
    <div class="brand-list">
        <a class="image box3" href="#"><img src="./assets/images/banner_adidas.jpg" alt="Adidas"></a>
        <a class="image box3" href="#"><img src="./assets/images/banner_puma.jpg" alt="Puma"></a>
        <a class="image box3" href="#"><img src="./assets/images/banner_nike.jpg" alt="Nike"></a>
        <a class="image box3" href="#"><img src="./assets/images/banner_lacoste.jpg" alt="Lacoste"></a>
    </div>
</section>

<!-- Sản phẩm -->
<section class="products">
    <h2>SẢN PHẨM</h2>
    <div class="product-grid">
        <div class="product-card">
            <div class="product-image">
                <img src="./images/product1.jpg" alt="Nike Field General">
                <div class="icons">
                    <span class="wishlist"><i class="fas fa-heart"></i></span>
                    <span class="cart"><i class="fas fa-shopping-cart"></i></span>
                </div>
            </div>
            <p class="product-name">Nike Field General</p>
            <p class="price">1.200.000đ</p>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="./images/product2.jpg" alt="Nike Air Force">
                <div class="icons">
                    <span class="wishlist"><i class="fas fa-heart"></i></span>
                    <span class="cart"><i class="fas fa-shopping-cart"></i></span>
                </div>
            </div>
            <p class="product-name">Nike Air Force</p>
            <p class="price">1.800.000đ</p>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="./images/product3.jpg" alt="Adidas Yeezy">
                <div class="icons">
                    <span class="wishlist"><i class="fas fa-heart"></i></span>
                    <span class="cart"><i class="fas fa-shopping-cart"></i></span>
                </div>
            </div>
            <p class="product-name">Adidas Yeezy</p>
            <p class="price">2.000.000đ</p>
        </div>
    </div>
</section>

<!-- Tin tức -->
<section class="news">
    <h2>TIN TỨC</h2>
    <div class="news-grid">
        <div class="news-card">
            <img src="./images/news1.jpg" alt="Tin tức 1">
            <h3>Puma New Collection</h3>
            <p>Bộ sưu tập Puma mới nhất ra mắt tháng 8...</p>
        </div>
        <div class="news-card">
            <img src="./images/news2.jpg" alt="Tin tức 2">
            <h3>Nike Field General 2025</h3>
            <p>Mẫu giày Nike được yêu thích nhất năm 2025...</p>
        </div>
        <div class="news-card">
            <img src="./images/news3.jpg" alt="Tin tức 3">
            <h3>Adidas siêu nhẹ</h3>
            <p>Adidas ra mắt dòng giày siêu nhẹ phục vụ thể thao...</p>
        </div>
    </div>
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

<?php

require_once "./client/views/layout/footer.php"

    ?>