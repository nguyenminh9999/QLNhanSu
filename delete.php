<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlnhansu";

// Tạo kết nối đến MySQL
$conn = mysql_connect($servername, $username, $password);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysql_error());
}

// Chọn cơ sở dữ liệu
$db_selected = mysql_select_db($dbname, $conn);
if (!$db_selected) {
    die("Không thể chọn cơ sở dữ liệu: " . mysql_error());
}

// Đặt collation cho kết nối
mysql_set_charset("utf8", $conn);

// Kiểm tra xem id của tin tức đã được truyền qua GET không
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Xóa tin tức từ bảng 'tintuc' dựa trên id
    $delete_query = "DELETE FROM tintuc WHERE id=$id";
    $delete_result = mysql_query($delete_query);

    if ($delete_result) {
        $success_message = "Xóa tin tức thành công!";
    } else {
        $error_message = "Lỗi khi xóa tin tức: " . mysql_error();
    }
} else {
    $error_message = "Thiếu thông tin id của tin tức";
}

// Đóng kết nối
mysql_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa tin tức</title>
</head>
<body>
    <?php
        if (isset($success_message)) {
            echo "<p style='color: green;'>$success_message</p>";
            header("Refresh:2; url=tintuc.php"); // Chuyển hướng sau 2 giây
            exit();
        } elseif (isset($error_message)) {
            echo "<p style='color: red;'>$error_message</p>";
        }
    ?>
</body>
</html>
