<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
    <style>
        #content {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <h1>Danh sách tin tức</h1>

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

    // Truy vấn dữ liệu từ bảng 'tintuc'
    $result = mysql_query("SELECT id, Tieude, Noidung, NgayDang FROM tintuc");

    // Kiểm tra và hiển thị dữ liệu
    if (mysql_num_rows($result) > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Tiêu Đề</th><th>Ngày Đăng</th><th>Hành Động</th></tr>";
        while ($row = mysql_fetch_assoc($result)) {
            $id = htmlspecialchars($row["id"]);
            $tieude = htmlspecialchars($row["Tieude"]);
            $noidung = htmlspecialchars($row["Noidung"]);
            $ngaydang = htmlspecialchars($row["NgayDang"]);
            echo "<tr><td>$id</td><td><a href='#' onclick='showContent(\"" . addslashes($noidung) . "\")'>$tieude</a></td><td>$ngaydang</td><td><a href='edit.php?id=$id'>Sửa</a> | <a href='delete.php?id=$id'>Xóa</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu";
    }

    // Đóng kết nối
    mysql_close($conn);
    ?>

    <div id="content"></div>

    <br>
    <a href="add.php">Thêm tin tức</a>

    <script>
    // Hàm hiển thị nội dung khi nhấn vào tiêu đề
    function showContent(content) {
        document.getElementById("content").innerHTML = "<h2>Nội dung:</h2><p>" + content + "</p>";
    }
    </script>

    <br>
    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>
