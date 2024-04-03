<?php
include("ketnoi.inc");

// Truy vấn danh sách cán bộ từ database
$str = "SELECT distinct MaNV, Hoten, Ngaysinh, Noisinh, Nguyenquan, Quoctich, Dantoc, Tongiao, Tinhtranghonnhan, Tinhtrangsuckhoe, Anh FROM Thongtinnhanvien";
$kq = mysql_query($str, $link);
$num_row = mysql_num_rows($kq);

// Thống kê theo nơi sinh
$thongke_noisinh = array();
while ($row = mysql_fetch_array($kq)) {
    $noisinh = $row['Noisinh'];
    if (!isset($thongke_noisinh[$noisinh])) {
        $thongke_noisinh[$noisinh] = 1;
    } else {
        $thongke_noisinh[$noisinh]++;
    }
}

// Xử lý tìm kiếm
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $str .= " WHERE MaNV LIKE '%$search_term%' OR Hoten LIKE '%$search_term%' OR Noisinh LIKE '%$search_term%'";
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Xử lý hiển thị thông tin theo nơi sinh
if (isset($_GET['noisinh'])) {
    $noisinh_selected = $_GET['noisinh'];
    $str = "SELECT * FROM Thongtinnhanvien WHERE Noisinh = '$noisinh_selected'";
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quản lý danh sách cán bộ</title>
</head>
<body> 
<table width="100%" border="0">
    <tr>
      <td colspan="8"></td>
    </tr>
    <tr>
      <td width="17%"><a href="index.php"><h4>Quay lại trang chủ</h4></a></td>
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
      <td>
        <?php
          // Hiển thị nút thêm cán bộ mới
          echo '<div align="right"><a href="sp_add.php">Thêm cán bộ mới</a></div>';
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="8"> </td>
    </tr>
</table>

<!-- Form tìm kiếm -->
<div align="center">
  <h2>Tìm kiếm</h2>
  <form method="get" action="tv_danhmuc.php">
    <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm" />
    <input type="submit" value="Tìm kiếm" />
  </form>
</div>

<!-- Thống kê theo nơi sinh -->
<div align="center">
  <h2>Thống kê theo nơi sinh:</h2>
  <ul>
    <?php
    foreach ($thongke_noisinh as $noisinh => $soluong) {
      echo "<li><a href='tv_danhmuc.php?noisinh=".urlencode($noisinh)."'>$noisinh ($soluong nhân viên)</a></li>";
    }
    ?>
  </ul>
</div>

<div align="center"><h1>Danh mục các cán bộ</h1></div>
<table width="100%" border="1">
    <tr>
      <td width="6%" bordercolor="#0000FF">Mã NV</td>
      <td width="13%" bordercolor="#0000FF">Họ tên</td>
      <td width="9%" bordercolor="#0000FF">Ngày sinh</td>
      <td width="9%" bordercolor="#0000FF">Nơi sinh</td>
      <td width="8%" bordercolor="#0000FF">Nguyên quán</td>
      <td width="7%" bordercolor="#0000FF">Quốc tịch</td>
      <td width="6%" bordercolor="#0000FF">Dân tộc</td>
      <td width="6%" bordercolor="#0000FF">Tôn giáo</td>
      <td width="6%" bordercolor="#0000FF">Tình trạng hôn nhân</td>
      <td width="6%" bordercolor="#0000FF">Tình trạng sức khỏe</td>
      <td width="16%" bordercolor="#0000FF">Ảnh</td>
      <td width="8%" bordercolor="#0000FF">Thao tác</td>
    </tr>
    <?php
    // Hiển thị danh sách cán bộ
    while($i = mysql_fetch_array($kq)) {
        ?>
        <tr>
    <td height="80"><a href="tv_chitiet.php?MaNV=<?php echo $i[0]; ?>"><?php echo $i[0];?></a></td>
    <td height="80"><a href="tv_chitiet.php?MaNV=<?php echo $i[0]; ?>"><?php echo $i[1];?></a></td>
    <td><a href="tv_chitiet.php?MaNV=<?php echo $i[0]; ?>"><?php echo $i[2];?></a></td>
    <td><?php echo $i[3];?></td>
    <td><?php echo $i[4];?></td>
    <td><?php echo $i[5];?></td>
    <td><?php echo $i[6];?></td>
    <td><?php echo $i[7];?></td>
    <td><?php echo $i[8];?></td>
    <td><?php echo $i[9];?></td>
    <td><img width="148" height="71" src="<?php echo $i[10];?>" /></td>
    <td width="8%">
        <?php
            // Hiển thị nút Sửa và Xóa
            echo '<a href="tv_edit1.php?MaNV='.$i[0].'">Sửa</a>';
            echo ' | ';
            echo '<a href="sp_process_delete.php?MaNV='.$i[0].'" onclick="return confirm(\'Bạn có muốn xóa hay không\');">Xóa</a>';
        ?>     
    </td>
</tr>
        <?php
    }
    ?>
</table>

<!-- Nút in -->
<div align="center">
  <input type="button" value="In" onclick="window.print()" />
</div>

</body>
</html>
