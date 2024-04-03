<?php
include("ketnoi.inc");

if(isset($_GET['MaNV'])) {
    $maNV = $_GET['MaNV'];
    $query = "SELECT * FROM nhansuhuyen WHERE MaNV = '$maNV'";
    $result = mysql_query($query, $link);
    $row = mysql_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chi tiết cán bộ</title>
</head>
<body>

<table width="100%" border="0">
    <tr>
      <td colspan="8"></td>
    </tr>
    <tr>
      <td width="17%"><a href="index.php"><h4>Quay lại trang chủ</h4></a></td><p>
      <td width="17%"><a href="tv_danhmuchuyen.php"><h4>Quay lại trang trước</h4></a></td>
      <td width="3%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="11%">&nbsp;</td>
      <td width="25%"><?php include("phanquyen.php");?></td>
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

<h1>Thông tin chi tiết của <?php echo $row['Hoten']; ?></h1>

<table>
    <tr>
        <td>Mã NV:</td>
        <td><?php echo $row['MaNV']; ?></td>
    </tr>
    <tr>
        <td>Họ tên:</td>
        <td><?php echo $row['Hoten']; ?></td>
    </tr>
    <tr>
        <td>Ngày sinh:</td>
        <td><?php echo $row['Ngaysinh']; ?></td>
    </tr>
    
    <!-- Thêm các trường thông tin khác tương tự -->
</table>

<!-- Nút In -->
<button onclick="print()">In</button>

<!-- Thêm các nút chỉnh sửa, xóa hoặc các tùy chọn khác ở đây -->

</body>
</html>
