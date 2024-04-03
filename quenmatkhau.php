<?php
session_start();

include 'ketnoi.inc'; // Kết nối tới CSDL

// Biến để kiểm tra trạng thái đã nhập đúng tên người dùng hay chưa
$username_valid = false;

// Biến để lưu trữ tên người dùng đã nhập đúng
$valid_username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['txtusername'];

    // Kiểm tra xem username có tồn tại trong CSDL không
    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        // Người dùng tồn tại
        $username_valid = true;
        $valid_username = $username;
        $_SESSION['valid_username'] = $username; // Lưu tên người dùng vào session
    } else {
        echo "Tên người dùng không tồn tại.";
    }
}

// Kiểm tra trạng thái đã nhập đúng tên người dùng hay chưa để hiển thị mẫu mật khẩu mới
if ($username_valid) {
    // Hiển thị form nhập mật khẩu mới
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quên mật khẩu</title>
    </head>
    <body>
     <td width="50%">
        <a href="index.php"><h2>Quay lại trang chủ</h2></a>
        <a href="xathitran.php"><h2>Quay lại trang trước</h2></a>
    </td>
        <h2>Quên mật khẩu</h2>
        <form method="post" action="reset_password.php">
            <input type="hidden" name="txtusername" value="<?php echo $valid_username; ?>">
            <label for="txtpassword">Mật khẩu mới:</label>
            <input type="password" id="txtpassword" name="txtpassword" required><br><br>
            <label for="txtconfirm">Xác nhận mật khẩu:</label>
            <input type="password" id="txtconfirm" name="txtconfirm" required><br><br>
            <input type="submit" name="submit" value="Gửi yêu cầu">
        </form>
    </body>
    </html>
    <?php
} else {
    // Hiển thị form nhập tên người dùng
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quên mật khẩu</title>
    </head>
    <body>
     <td width="50%">
        <a href="index.php"><h2>Quay lại trang chủ</h2></a>
    </td>
        <h2>Quên mật khẩu</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="txtusername">Tên người dùng:</label>
            <input type="text" id="txtusername" name="txtusername" required><br><br>
            <input type="submit" name="submit" value="Gửi yêu cầu">
        </form>
    </body>
    </html>
    <?php
}
?>
