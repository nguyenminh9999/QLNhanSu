<?php
session_start();

include 'ketnoi.inc'; // Kết nối tới CSDL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manv = $_POST['txtmanv'];
    $username = $_POST['txtuser'];
    $password = $_POST['txtpass'];
    $quyen = $_POST['txtquyen'];
    $ghichu = $_POST['txtghichu'];

    // Mã hóa mật khẩu trước khi lưu vào CSDL
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Thực hiện truy vấn để thêm người dùng mới vào CSDL
    $sql = "INSERT INTO `user` (`MaNV`, `username`, `password`, `quyen`, `ghichu`) 
            VALUES ('$manv', '$username', '$hashed_password', '$quyen', '$ghichu')";

    $result = mysql_query($sql);

    if ($result) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . mysql_error();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>

<body>
<td width="50%">
        <a href="index.php"><h2>Quay lại trang chủ</h2></a>
    </td>
    <h2>Đăng ký tài khoản mới</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="txtmanv">Mã nhân viên:</label>
        <input type="text" id="txtmanv" name="txtmanv" required><br><br>

        <label for="txtuser">Username:</label>
        <input type="text" id="txtuser" name="txtuser" required><br><br>

        <label for="txtpass">Password:</label>
        <input type="password" id="txtpass" name="txtpass" required><br><br>

        <label for="txtquyen">Quyền:</label>
        <input type="number" id="txtquyen" name="txtquyen" required><br><br>

        <label for="txtghichu">Ghi chú:</label><br>
        <textarea id="txtghichu" name="txtghichu" rows="4" cols="50"></textarea><br><br>

        <input type="submit" name="submit" value="Đăng ký">
    </form>
</body>
</html>
