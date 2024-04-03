<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách cấp huyện Long Phú</title>
    <style>
        h3 {
            font-size: 1.5em; /* Kích thước lớn hơn */
            font-family: 'Arial Black', sans-serif; /* Font chữ đậm */
            color: #007bff; /* Màu chữ xanh */
            text-align: left; /* Canh trái */
            text-transform: uppercase; /* Chuyển đổi thành chữ in hoa */
            animation: pulse 2s infinite, glow 2s infinite; /* Hiệu ứng pulse và hiệu ứng glow */
            letter-spacing: 0.1em; /* Khoảng cách giữa các ký tự */
            text-shadow: 0 0 5px rgba(0,123,255,0.5), 0 0 15px rgba(0,123,255,0.5), 0 0 30px rgba(0,123,255,0.5), 0 0 50px rgba(0,123,255,0.5), 0 0 75px rgba(0,123,255,0.5), 0 0 100px rgba(0,123,255,0.5); /* Ánh sáng */
            -webkit-text-stroke: 1px black; /* Viền chữ */
        }

        /* Keyframes cho hiệu ứng pulse */
        @keyframes pulse {
            0% {
                text-shadow: 0 0 5px rgba(0,123,255,0.5), 0 0 15px rgba(0,123,255,0.5), 0 0 30px rgba(0,123,255,0.5), 0 0 50px rgba(0,123,255,0.5), 0 0 75px rgba(0,123,255,0.5), 0 0 100px rgba(0,123,255,0.5); /* Khoảng cách bóng ban đầu */
            }
            50% {
                text-shadow: 0 0 5px rgba(0,123,255,0.5), 0 0 20px rgba(0,123,255,0.5), 0 0 40px rgba(0,123,255,0.5), 0 0 60px rgba(0,123,255,0.5), 0 0 90px rgba(0,123,255,0.5), 0 0 120px rgba(0,123,255,0.5); /* Khoảng cách bóng ở giữa */
            }
            100% {
                text-shadow: 0 0 5px rgba(0,123,255,0.5), 0 0 15px rgba(0,123,255,0.5), 0 0 30px rgba(0,123,255,0.5), 0 0 50px rgba(0,123,255,0.5), 0 0 75px rgba(0,123,255,0.5), 0 0 100px rgba(0,123,255,0.5); /* Khoảng cách bóng cuối cùng */
            }
        }

        /* Keyframes cho hiệu ứng glow */
        @keyframes glow {
            0% { text-shadow: 0 0 5px #007bff; }
            50% { text-shadow: 0 0 20px #007bff; }
            100% { text-shadow: 0 0 5px #007bff; }
        }
		
		/* CSS cho hiệu ứng transition */
        .ten-don-vi {
            transition: transform 0.3s ease, color 0.3s ease; /* Thêm transition cho transform và color */
            display: inline-block; /* Đảm bảo phần tử có thể sử dụng transform */
        }

        /* CSS cho hiệu ứng transform */
        .ten-don-vi:hover {
            transform: scale(1.2); /* Phóng to phần tử khi di chuột vào */
            color: red; /* Đổi màu chữ khi di chuột vào */
        }
    </style>
</head>

<body>
<h3>Danh sách cấp huyện</h3>

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

// Xử lý thêm cấp huyện mới
if (isset($_POST['submit'])) {
    $tendonvi = isset($_POST['tendonvi']) ? $_POST['tendonvi'] : '';
    $madonvi = isset($_POST['madonvi']) ? $_POST['madonvi'] : '';

    if (empty($tendonvi) || empty($madonvi)) {
        echo "<p style='color: red;'>Vui lòng nhập đủ thông tin.</p>";
    } else {
        $query = "INSERT INTO huyen (MaDV, Tendonvi) VALUES ('$madonvi', '$tendonvi')";
        $result = mysql_query($query);
        if ($result) {
            echo "<p id='add-success-message' style='color: green;'>Thêm huyện mới thành công.</p>";

        } else {
            echo "<p style='color: red;'>Lỗi: " . mysql_error() . "</p>";
        }
    }
}


// Xử lý sửa cấp huyện
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    // Hiển thị form chỉnh sửa
    echo "<h2>Chỉnh sửa huyện:</h2>";
    echo '<form method="post" action="">';
    echo 'Mã đơn vị: <input type="text" name="madonvi" value="' . $edit_id . '" readonly><br>';
    echo 'Tên đơn vị: <input type="text" name="tendonvi"><br>';
    echo '<input type="submit" name="update" value="Cập nhật">';
    echo '</form>';

    // Xử lý cập nhật dữ liệu
    if (isset($_POST['update'])) {
        $tendonvi_new = $_POST['tendonvi'];
        if ($tendonvi_new != '') {
            $query_update = "UPDATE huyen SET Tendonvi='$tendonvi_new' WHERE MaDV='$edit_id'";
            $result_update = mysql_query($query_update);
            if ($result_update) {
                echo "<p id='edit-success-message' style='color: green;'>Sửa thông tin huyện thành công.</p>";
            } else {
                echo "<p style='color: red;'>Lỗi: " . mysql_error() . "</p>";
            }
        } else {
            echo "<p style='color: red;'>Vui lòng nhập đủ thông tin.</p>";
        }
    }
}

// Xử lý xóa cấp huyện
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql = "DELETE FROM huyen WHERE MaDV = '$delete_id'";
    $result = mysql_query($sql);
    if ($result) {
       echo "<p id='delete-success-message' style='color: green;'>Xóa huyện thành công.</p>";
    } else {
        echo "<p style='color: red;'>Lỗi: " . mysql_error() . "</p>";
    }
}

// Truy vấn dữ liệu từ bảng 'huyen'
$result = mysql_query("SELECT * FROM huyen");

if (mysql_num_rows($result) > 0) {
    echo "<table border='1'><tr><th>Mã Đơn Vị</th><th>Tên Đơn Vị</th><th>Thao Tác</th></tr>";
    while ($row = mysql_fetch_assoc($result)) {
        // Xác định URL chuyển hướng dựa trên giá trị của "Tendonvi"
        $redirect_url = "";
        switch ($row["Tendonvi"]) {
            case "Cấp huyện Long Phú":
                $redirect_url = "tv_danhmuchuyenlongphu.php?MaDV=";
                break;
            // Thêm các trường hợp khác nếu cần
            default:
                // Mặc định nếu không khớp với các trường hợp trên
                $redirect_url = "tv_danhmuchuyenlongphu.php?MaDV=";
        }
        
        echo "<tr><td>" . $row["MaDV"] . "</td><td><a class='ten-don-vi' href='" . $redirect_url . $row["MaDV"] . "'>" . $row["Tendonvi"] . "</a></td><td><a href='huyenlongphu.php?edit=" . $row["MaDV"] . "'>Sửa</a> | <a href='huyenlongphu.php?delete=" . $row["MaDV"] . "'>Xóa</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu";
}


// Form thêm cấp huyện mới
echo "<h2>Thêm cấp huyện mới:</h2>";
echo '<form method="post" action="">';
echo 'Mã đơn vị: <input type="text" name="madonvi"><br>';
echo 'Tên đơn vị: <input type="text" name="tendonvi"><br>';
echo '<input type="submit" name="submit" value="Thêm">';
echo '<input type="reset" value="Làm lại">';
echo '</form>';

// Đóng kết nối
mysql_close($conn);
?>

<br>
<a href="index.php" id="back-to-home"><h2>Quay lại trang chủ</h2></a>

<script>
// Lấy phần tử "Quay lại trang chủ"
var backToHome = document.getElementById('back-to-home');

// Thêm sự kiện mouseover và mouseout
backToHome.addEventListener('mouseover', function(event) {
    event.target.style.color = 'red'; // Thay đổi màu chữ khi di chuột vào
});

backToHome.addEventListener('mouseout', function(event) {
    event.target.style.color = ''; // Khôi phục màu chữ khi di chuột ra
});


    // Lấy thông báo thành công khi thêm
    var addSuccessMessage = document.getElementById('add-success-message');

    // Kiểm tra nếu thông báo tồn tại
    if (addSuccessMessage) {
        // Ẩn thông báo sau 5 giây
        setTimeout(function() {
            addSuccessMessage.style.display = 'none';
        }, 5000); // Thời gian 5 giây (5000 milliseconds)
    }

    // Lấy thông báo thành công khi sửa
    var editSuccessMessage = document.getElementById('edit-success-message');

    // Kiểm tra nếu thông báo tồn tại
    if (editSuccessMessage) {
        // Ẩn thông báo sau 5 giây
        setTimeout(function() {
            editSuccessMessage.style.display = 'none';
        }, 5000); // Thời gian 5 giây (5000 milliseconds)
    }

    // Lấy thông báo thành công khi xóa
    var deleteSuccessMessage = document.getElementById('delete-success-message');

    // Kiểm tra nếu thông báo tồn tại
    if (deleteSuccessMessage) {
        // Ẩn thông báo sau 5 giây
        setTimeout(function() {
            deleteSuccessMessage.style.display = 'none';
        }, 5000); // Thời gian 5 giây (5000 milliseconds)
    }
	
</script>

</body>

</html>
