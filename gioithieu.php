<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu về tổ chức</title>
    <style>
        #description {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <h1>Giới thiệu về cơ quan</h1>

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

    // Xử lý thêm cơ quan mới
    if (isset($_POST['submit'])) {
        $tencoquan = $_POST['tencoquan'];
        $mota = $_POST['mota'];

        if (empty($tencoquan) || empty($mota)) {
            echo "<p style='color: red;'>Vui lòng nhập đủ thông tin.</p>";
        } else {
            $query = "INSERT INTO gioithieu (Tencoquan, Mota) VALUES ('$tencoquan', '$mota')";
            $result = mysql_query($query);
            if ($result) {
                echo "<p>Thêm cơ quan mới thành công.</p>";
            } else {
                echo "Lỗi: " . mysql_error();
            }
        }
    }

    // Xử lý sửa cơ quan
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        // Hiển thị form chỉnh sửa
        echo "<h2>Chỉnh sửa cơ quan:</h2>";
        echo '<form method="post" action="">';
        echo 'Tên cơ quan: <input type="text" name="tencoquan"><br>';
        echo 'Mô tả: <textarea name="mota"></textarea><br>';
        echo '<input type="submit" name="update" value="Cập nhật">';
        echo '</form>';

        // Xử lý cập nhật dữ liệu
        if (isset($_POST['update'])) {
            $tencoquan_new = $_POST['tencoquan'];
            $mota_new = $_POST['mota'];
            if ($tencoquan_new != '' && $mota_new != '') {
                $query_update = "UPDATE gioithieu SET Tencoquan='$tencoquan_new', Mota='$mota_new' WHERE id='$edit_id'";
                $result_update = mysql_query($query_update);
                if ($result_update) {
                    echo "<p>Cập nhật cơ quan thành công.</p>";
                } else {
                    echo "Lỗi: " . mysql_error();
                }
            } else {
                echo "<p style='color: red;'>Vui lòng nhập đủ thông tin.</p>";
            }
        }
    }

    // Xử lý xóa cơ quan
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $sql = "DELETE FROM gioithieu WHERE id = '$delete_id'";
        $result = mysql_query($sql);
        if ($result) {
            echo "<p>Xóa cơ quan thành công.</p>";
        } else {
            echo "Lỗi: " . mysql_error();
        }
    }

    // Truy vấn dữ liệu từ bảng 'gioithieu'
    $result = mysql_query("SELECT id, Tencoquan, Mota FROM gioithieu");

    // Kiểm tra và hiển thị dữ liệu
    if (mysql_num_rows($result) > 0) {
        echo "<table border='1'><tr><th>Tên Cơ quan</th><th>Hành động</th></tr>";
        while ($row = mysql_fetch_assoc($result)) {
            $id = $row["id"];
            $tencoquan = $row["Tencoquan"];
            $mota = $row["Mota"];
            echo "<tr><td><a href='#' onclick='showDescription(\"" . addslashes($mota) . "\")'>$tencoquan</a></td><td><a href='?edit=$id'>Sửa</a> | <a href='?delete=$id'>Xóa</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu";
    }

    // Form thêm cơ quan mới
    echo "<h2>Thêm cơ quan mới:</h2>";
    echo '<form method="post" action="">';
    echo 'Tên cơ quan: <input type="text" name="tencoquan"><br>';
    echo 'Mô tả: <textarea name="mota"></textarea><br>';
    echo '<input type="submit" name="submit" value="Thêm">';
    echo '</form>';

    // Đóng kết nối
    mysql_close($conn);
    ?>

    <div id="description"></div>

    <script>
    // Hàm hiển thị mô tả khi nhấn vào tên cơ quan
    function showDescription(description) {
        document.getElementById("description").innerHTML = "<h2>Mô tả:</h2><p>" + description + "</p>";
    }
    </script>
    <br>
    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>
