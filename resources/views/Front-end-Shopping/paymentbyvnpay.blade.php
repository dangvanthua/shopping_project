<div class="card-body text-center">
    <p>Phương thức thanh toán: Ví điện tử VN PAY</p>
    <p>Tổng số tiền: 200,000 VND</p>

    <!-- Nút xác nhận thanh toán -->
    <button onclick="redirectVNPay()" class="btn btn-primary">Xác nhận thanh toán bằng VNPAY</button>
</div>

<script>
function redirectVNPay() {
    // URL từ response của API VNPay mà bạn đã tạo
    const vnpayUrl = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html?...";
    window.location.href = vnpayUrl;
}
</script>
