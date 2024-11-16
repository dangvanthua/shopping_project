<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VnPayController extends Controller
{
    //
    public function createPayment(Request $request)
    {
        $vnp_TmnCode = config('vnpay.vnp_TmnCode');
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $vnp_Url = config('vnpay.vnp_Url');
        $vnp_ReturnUrl = config('vnpay.vnp_ReturnUrl');

        $vnp_TxnRef = time(); // Mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 2000 * 100; // Số tiền (VND)
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        // Sắp xếp tham số theo thứ tự từ điển
        ksort($inputData);

        // Log tham số đầu vào
        Log::info("Input Data for VNPay: ", $inputData);

        // Tạo chuỗi hash
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= '&' . $key . '=' . $value;
        }
        $hashData = ltrim($hashData, '&');

        // Log chuỗi hash
        Log::info("Hash Data: " . $hashData);

        // Tính chữ ký
        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashData);

        // Log chữ ký
        Log::info("Generated Secure Hash: " . $vnpSecureHash);

        // Tạo URL
        $query = '';
        foreach ($inputData as $key => $value) {
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url .= "?" . $query . "vnp_SecureHashType=SHA256&vnp_SecureHash=" . $vnpSecureHash;

        // Log toàn bộ URL
        Log::info("VNPay URL: " . $vnp_Url);

        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $inputData = $request->all();

        // Loại bỏ các tham số không cần thiết
        unset($inputData['vnp_SecureHashType']);
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        // Sắp xếp lại các tham số theo thứ tự từ điển
        ksort($inputData);

        // Tạo chuỗi hash
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= '&' . $key . '=' . $value;
        }
        $hashData = ltrim($hashData, '&');

        // Log chuỗi hash trả về
        Log::info("Hash Data Returned: " . $hashData);

        // Tính chữ ký
        $secureHash = hash('sha256', $vnp_HashSecret . $hashData);

        // Log chữ ký trả về
        Log::info("Secure Hash Returned: " . $secureHash);

        // So sánh chữ ký
        if ($secureHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] === '00') {
                Log::info("Payment Success: ", $inputData);
                return view('payment_success'); // Thanh toán thành công
            } else {
                Log::warning("Payment Failed: ", $inputData);
                return view('payment_failed'); // Thanh toán không thành công
            }
        } else {
            Log::error("Invalid Signature: ", $inputData);
            return view('payment_failed'); // Sai chữ ký
        }
    }
}
