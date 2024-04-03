<?php
include("ketnoi.inc");

if(isset($_GET['MaCB'])) {
    $maCB = $_GET['MaCB'];
    $query = "SELECT * FROM nhansuthitrandaingai WHERE MaCB = '$maCB'";
    $result = mysql_query($query, $link);
    $row = mysql_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chi tiết cán bộ</title>
    <style>
	
	
    /* CSS cho nút in */
.print-button {
    font-size: 1.5em; /* Điều chỉnh kích thước chữ theo ý muốn */
    padding: 10px 20px; /* Kích thước padding của nút */
    border: 2px solid #ccc; /* Độ dày và kiểu đường viền */
    cursor: pointer; /* Con trỏ chuột khi di chuyển qua nút */
    transition: background-color 0.5s, color 0.5s, font-size 0.5s; /* Hiệu ứng chuyển đổi màu nền, màu chữ và kích thước chữ */
    animation: pulse 1.5s infinite; /* Hiệu ứng pulse */
}

/* Hiệu ứng pulse */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

/* Hiệu ứng khi di chuột vào nút in */
.print-button:hover {
	background-color: #00FF33; /* Màu nền khi di chuột vào */
	color: #C60; /* Màu chữ khi di chuột vào */
	font-size: 1.7em; /* Kích thước chữ lớn hơn khi di chuột vào */
	animation: none; /* Ngừng hiệu ứng pulse khi di chuột vào */
}

/* Container chứa nút in */
.print-button-container {
    text-align: left; /* Căn chỉnh nút in vào giữa */
    margin-top: 50px; /* Để tạo khoảng cách giữa nút in và các nội dung khác */
	margin-left: 100px; /* Đặt khoảng cách từ lề trái */
}

/* Định dạng cho các liên kết */
#print-container a {
    font-size: 24px; /* Kích thước chữ cho các liên kết */
    font-weight: bold; /* Độ đậm cho chữ */
    text-decoration: none; /* Loại bỏ gạch chân cho liên kết */
    transition: color 0.5s ease; /* Hiệu ứng màu chữ mềm mại */
}

/* Loại bỏ gạch chân cho các liên kết */
#print-container #home-link,
#print-container #previous-link {
    text-decoration: none;
}

/* Định dạng cho tiêu đề */
.detail-title {
    font-size: 2.5em; /* Kích thước chữ tiêu đề */
    text-align: center; /* Căn giữa tiêu đề */
    position: relative; /* Tạo vị trí tương đối để có thể sử dụng pseudo-elements */
}

/* Hiệu ứng text-shadow phát sáng */
.detail-title::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 5px; /* Bo tròn viền */
    background: linear-gradient(to right, rgba(255, 255, 255, 0.8), transparent); /* Hiệu ứng gradient phát sáng */
    animation: shine 2s infinite; /* Hiệu ứng phát sáng */
}

/* Animation cho hiệu ứng phát sáng */
@keyframes shine {
    0% {
        transform: translateX(-150%);
    }
    50% {
        transform: translateX(150%);
    }
    100% {
        transform: translateX(150%);
    }
}

/* CSS cho các phần không in khi sử dụng media print */
@media print {
    body * {
        visibility: hidden;
    }
    .print-container, .print-container * {
        visibility: visible;
    }
    .print-container {
        position: absolute;
        left: 0;
        top: 0;
    }
    .print-button-container {
        display: none; /* Ẩn container chứa nút in khi in trang */
    }
    .print-info-extra {
        display: none; /* Ẩn các phần không mong muốn khi in */
    }
}

.navigation-link {
    font-size: 1.5em; /* Kích thước chữ */
    transition: color 0.5s, text-shadow 0.5s; /* Hiệu ứng chuyển đổi màu và hào quang */
}

.navigation-link:hover {
    color: red; /* Màu chữ khi di chuột vào */
    text-shadow: 0 0 10px yellow; /* Hiệu ứng hào quang */
}

 @keyframes rainbow {
            0% { color: red; }
            20% { color: orange; }
            40% { color: yellow; }
            60% { color: green; }
            80% { color: blue; }
            100% { color: purple; }
        }

        h1.rainbow-text {
            animation: rainbow 5s infinite; /* Chạy hiệu ứng trong 5 giây và lặp vô hạn */
        }

    </style>
    
</head>
<body>

<table width="100%" border="0">
    <tr>
      <td colspan="8"></td>
    </tr>
    <tr>
      
      <td>
        <a href="index.php" class="navigation-link"><h3>Quay lại trang chủ</h3></a>
            <a href="tv_danhmucthitrandaingai.php" class="navigation-link"><h3>Quay lại trang trước</h3></a>

    </td>
      <td width="3%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>

<div class="print-container">
<h1 class="rainbow-text">Thông tin chi tiết của <?php echo $row['Hoten']; ?></h1>

<table>
    <tr>
        <td>Mã CB:</td>
        <td><?php echo $row['MaCB']; ?></td>
    </tr>
    <tr>
        <td>Họ tên:</td>
        <td><?php echo $row['Hoten']; ?></td>
    </tr>
    <tr>
        <td>Ngày sinh:</td>
        <td><?php echo $row['Ngaysinh']; ?></td>
    </tr>
    <tr>
        <td>Giới tính:</td>
        <td><?php echo $row['Gioitinh']; ?></td>
    </tr>
    <tr>
        <td>Quốc tịch:</td>
        <td><?php echo $row['Quoctich']; ?></td>
    </tr>
    <tr>
        <td>Dân tộc:</td>
        <td><?php echo $row['Dantoc']; ?></td>
    </tr>
    <tr>
        <td>Tôn giáo:</td>
        <td><?php echo $row['Tongiao']; ?></td>
    </tr>
    <tr>
        <td>Quê quán:</td>
        <td><?php echo $row['Quequan']; ?></td>
    </tr>
    <tr>
        <td>Giáo dục phổ thông:</td>
        <td><?php echo $row['Giaoducphothong']; ?></td>
    </tr>
    <tr>
        <td>Chuyên môn nghiệp vụ:</td>
        <td><?php echo $row['Chuyenmonnghiepvu']; ?></td>
    </tr>
    <tr>
        <td>Tuổi:</td>
        <td><?php echo $row['Tuoi']; ?></td>
    </tr>
    <tr>
        <td>Lý luận chính trị:</td>
        <td><?php echo $row['Lyluanchinhtri']; ?></td>
    </tr>
    <tr>
        <td>Ngoại ngữ:</td>
        <td><?php echo $row['Ngoaingu']; ?></td>
    </tr>
    <tr>
        <td>Nghề nghiệp chức vụ:</td>
        <td><?php echo $row['Nghenghiepchucvu']; ?></td>
    </tr>
    <tr>
        <td>Nơi công tác:</td>
        <td><?php echo $row['Noicongtac']; ?></td>
    </tr>
    <tr>
        <td>Ngày vào Đảng:</td>
        <td><?php echo $row['Ngayvaodang']; ?></td>
    </tr>
    <tr>
        <td>Tình trạng:</td>
        <td><?php echo $row['Tinhtrang']; ?></td>
    </tr>
    <tr>
        <td>Ghi chú:</td>
        <td><?php echo $row['Ghichu']; ?></td>
    </tr>
</table>

<br>
<!-- Nút In -->

<div class="print-button-container">
  <input type="button" value="In" onclick="window.print()" class="print-button" id="printButton" />
</div>
<!-- Thêm các nút chỉnh sửa, xóa hoặc các tùy chọn khác ở đây -->




</body>
</html>
