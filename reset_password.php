<?php
session_start();

include 'ketnoi.inc'; // Kết nối tới CSDL

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy tên người dùng từ session
    $username = $_SESSION['valid_username'];

    // Lấy mật khẩu mới và xác nhận mật khẩu từ form
    $password = $_POST['txtpassword'];
    $confirm_password = $_POST['txtconfirm'];

    // Kiểm tra xác nhận mật khẩu
    if ($password === $confirm_password) {
        // Mã hóa mật khẩu mới trước khi lưu vào CSDL
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Cập nhật mật khẩu mới vào CSDL
        $sql = "UPDATE `user` SET `password` = '$hashed_password' WHERE `username` = '$username'";
        $result = mysql_query($sql);

        if ($result) {
            echo "Mật khẩu đã được cập nhật thành công.";
        } else {
            echo "Có lỗi xảy ra. Vui lòng thử lại sau.";
        }
    } else {
        echo "Mật khẩu không khớp. Vui lòng nhập lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
 <td width="50%">
        <a href="index.php"><h2>Quay lại trang chủ</h2></a>
        <a href="quenmatkhau.php.php"><h2>Quay lại trang trước</h2></a>
    </td>
    <h2>Đặt lại mật khẩu</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="txtpassword">Mật khẩu mới:</label>
        <input type="password" id="txtpassword" name="txtpassword" required><br><br>
        <label for="txtconfirm">Xác nhận mật khẩu:</label>
        <input type="password" id="txtconfirm" name="txtconfirm" required><br><br>
        <input type="submit" name="submit" value="Cập nhật mật khẩu">
    </form>
</body>
</html>
