<section class="checkout-form">
    <h2>THÔNG TIN ĐẶT HÀNG</h2>
    <form action="index.php?router=checkout_submit" method="POST">
        <label>Họ tên</label>
        <input type="text" name="name" required>

        <label>Số điện thoại</label>
        <input type="text" name="phone" required>

        <label>Địa chỉ giao hàng</label>
        <textarea name="address" required></textarea>

        <button type="submit">Xác nhận đặt hàng</button>
    </form>
</section>