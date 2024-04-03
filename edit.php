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

// Kiểm tra xem đã nhận được ID của tin tức cần sửa chưa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn dữ liệu từ bảng 'tintuc' để lấy thông tin về tin tức cần sửa
    $result = mysql_query("SELECT id, Tieude, Noidung, Ngaydang FROM tintuc WHERE id = $id");

    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $tieude = $row['Tieude'];
        $noidung = $row['Noidung'];
		$ngaydang = $row['Ngaydang'];
    } else {
        echo "Không tìm thấy tin tức cần sửa";
        exit;
    }
} else {
    echo "ID của tin tức cần sửa không hợp lệ";
    exit;
}

// Kiểm tra xem có gửi dữ liệu form từ trang edit.php hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu được gửi từ form
    $new_tieude = $_POST['tieude'];
    $new_noidung = $_POST['noidung'];
	$new_ngaydang = $_POST['ngaydang'];

    // Cập nhật dữ liệu mới vào cơ sở dữ liệu
    $update_query = "UPDATE tintuc SET Tieude = '$new_tieude', Noidung = '$new_noidung', Ngaydang = '$new_ngaydang' WHERE id = $id";
    $update_result = mysql_query($update_query);

    if ($update_result) {
        echo "Cập nhật tin tức thành công!";
        mysql_close($conn);
        header("refresh:2; url=tintuc.php"); // Tự động chuyển hướng sau 2 giây
        exit(); // Dừng script sau khi thực hiện chuyển hướng
    } else {
        echo "Lỗi khi cập nhật tin tức: " . mysql_error();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa tin tức</title>
</head>
<body>
    <h1>Chỉnh sửa tin tức</h1>
    <form method="post" action="">
    <label for="tieude">Tiêu đề:</label><br>
    <input type="text" id="tieude" name="tieude" value="<?php echo $tieude; ?>"><br><br>
    
    <label for="noidung">Nội dung:</label><br>
    <textarea id="noidung" name="noidung" rows="5" cols="50"><?php echo $noidung; ?></textarea><br><br>
    
    <label for="ngaydang">Ngày đăng:</label><br>
    <input type="date" id="ngaydang" name="ngaydang" value="<?php echo $ngaydang; ?>"><br><br>
    
    <input type="submit" value="Lưu">
</form>

    <br>
    <a href="tintuc.php">Quay lại trang tin tức</a><br>
    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>

<?php
// Đóng kết nối
mysql_close($conn);
?>
