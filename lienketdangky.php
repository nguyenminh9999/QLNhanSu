<?php
// Mở kết nối tới MySQL
include "ketnoi.inc";

// Kiểm tra phương thức gửi biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Kiểm tra mật khẩu và mật khẩu xác nhận
    if ($password !== $confirmPassword) {
        echo '<div class="error">Mật khẩu xác nhận không khớp</div>';
    } else {
        // Mã hóa mật khẩu
        $hashedPassword = md5($password);

        // Thực hiện truy vấn để thêm người dùng mới vào cơ sở dữ liệu
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";
        if (mysql_query($sql)) {
            echo '<div class="success">Đăng ký thành công</div>';
        } else {
            echo '<div class="error">Đã xảy ra lỗi. Vui lòng thử lại sau.</div>';
        }
    }
}
?>
