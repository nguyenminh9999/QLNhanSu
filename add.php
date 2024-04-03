<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin tức mới</title>
</head>
<body>
    <h1>Thêm tin tức mới</h1>

    <?php
    // Kiểm tra xem đã gửi dữ liệu form chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem tiêu đề đã được nhập hay chưa
        if (empty($_POST["tieude"])) {
            echo "Vui lòng nhập tiêu đề.";
        } else {
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

            // Lấy dữ liệu từ form
            $tieude = $_POST["tieude"];
            $noidung = $_POST["noidung"];
            $ngaydang = date("Y-m-d");

            // Thực hiện truy vấn INSERT để thêm tin tức mới vào bảng 'tintuc'
            $sql = "INSERT INTO tintuc (Tieude, Noidung, NgayDang) VALUES ('$tieude', '$noidung', '$ngaydang')";

            if (mysql_query($sql)) {
                echo "Thêm tin tức mới thành công";
                mysql_close($conn);
                header("refresh:2; url=tintuc.php"); // Tự động chuyển hướng sau 2 giây
                exit(); // Dừng script sau khi thực hiện chuyển hướng
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysql_error();
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Tiêu đề: <input type="text" name="tieude"><br>
        Nội dung: <textarea name="noidung"></textarea><br>
        Ngày đăng: <input type="date" name="ngaydang"><br>
        <input type="submit" value="Thêm">
    </form>

    <br>
    <a href="index.php">Quay lại trang chủ</a><br>
    <a href="tintuc.php">Quay lại danh sách tin tức</a>
</body>
</html>
