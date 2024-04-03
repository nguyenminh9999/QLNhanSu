<?php
include("ketnoi.inc");

// Truy vấn danh sách cán bộ từ database
$str = "SELECT `MaNV`, `Hoten`, `Ngaysinh`, `Gioitinh`, `Quoctich`, `Dantoc`, `Tongiao`, `Quequan`, `Giaoducphothong`, `Chuyenmonnghiepvu`, `Tuoi`, `Lyluanchinhtri`, `Ngoaingu`, `Nghenghiepchucvu`, `Noicongtac`, `Ngayvaodang`, `Tinhtrang`, `Ghichu` FROM nhansuhuyen"; 
$kq = mysql_query($str, $link);
$num_row = mysql_num_rows($kq);

// Thống kê theo quê quán
$thongke_quequan = array();
while ($row = mysql_fetch_array($kq)) {
    $quequan = $row['Quequan'];
    if (!isset($thongke_quequan[$quequan])) {
        $thongke_quequan[$quequan] = 1;
    } else {
        $thongke_quequan[$quequan]++;
    }
}

// Xử lý tìm kiếm
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $str .= " WHERE MaNV LIKE '%$search_term%' OR Hoten LIKE '%$search_term%' OR Quequan LIKE '%$search_term%'";
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Xử lý hiển thị thông tin theo quê quán
if (isset($_GET['quequan'])) {
    $quequan_selected = $_GET['quequan'];
    $str = "SELECT * FROM nhansuhuyen WHERE Quequan = '$quequan_selected'"; 
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo tình trạng
if (isset($_GET['tinhtrang'])) {
    $tinhtrang_selected = $_GET['tinhtrang'];
    if ($tinhtrang_selected == 'all') {
        // Hiển thị những nhân viên có tình trạng là "Đang hoạt động"
        $str = "SELECT * FROM nhansuhuyen WHERE Tinhtrang = 'Đang hoạt động'";
    } else {
        // Hiển thị theo tình trạng được chọn
        $str = "SELECT * FROM nhansuhuyen WHERE Tinhtrang = '$tinhtrang_selected'";
    }
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
          echo '<div align="right"><a href="sp_addhuyen.php">Thêm cán bộ mới</a></div>';
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
  <form method="get" action="tv_danhmuchuyen.php">
    <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm" />
    <input type="submit" value="Tìm kiếm" />
  </form>
</div>

<!-- Thống kê theo quê quán -->
<div align="center">
  <h2>Thống kê theo quê quán:</h2>
  <ul>
    <?php
    foreach ($thongke_quequan as $quequan => $soluong) {
      echo "<li><a href='tv_danhmuchuyen.php?quequan=".urlencode($quequan)."'>$quequan ($soluong nhân viên)</a></li>";
    }
    ?>
  </ul>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quản lý danh sách cán bộ</title>
</head>
<body> 
<!-- ... (Phần header giữ nguyên) ... -->

<!-- Thêm mục thống kê theo tình trạng -->
<div align="center">
  <h2>Thống kê theo tình trạng:</h2>
  <ul>
    <li><a href='tv_danhmuchuyen.php?tinhtrang=all'>Tất cả (<?php echo $num_row; ?> nhân viên)</a></li>
    <li><a href='tv_danhmuchuyen.php?tinhtrang=Đang hoạt động'>Đang hoạt động</a></li>
    <li><a href='tv_danhmuchuyen.php?tinhtrang=Miễn nhiệm'>Miễn nhiệm</a></li>
    <li><a href='tv_danhmuchuyen.php?tinhtrang=Bãi nhiệm'>Bãi nhiệm</a></li>
  </ul>
</div>


<div align="center"><h1>Danh mục các cán bộ</h1></div>
<table width="100%" border="1">
    <tr>
      <td width="6%" bordercolor="#0000FF">Mã NV</td>
        <td width="13%" bordercolor="#0000FF">Họ tên</td>
        <td width="9%" bordercolor="#0000FF">Ngày sinh</td>
        <td width="9%" bordercolor="#0000FF">Giới tính</td>
        <td width="8%" bordercolor="#0000FF">Quốc tịch</td>
        <td width="7%" bordercolor="#0000FF">Dân tộc</td>
        <td width="6%" bordercolor="#0000FF">Tôn giáo</td>
        <td width="9%" bordercolor="#0000FF">Quê quán</td>
        <td width="9%" bordercolor="#0000FF">Giáo dục phổ thông</td>
        <td width="9%" bordercolor="#0000FF">Chuyên môn nghiệp vụ</td>
        <td width="5%" bordercolor="#0000FF">Tuổi</td>
        <td width="9%" bordercolor="#0000FF">Lý luận chính trị</td>
        <td width="7%" bordercolor="#0000FF">Ngoại ngữ</td>
        <td width="11%" bordercolor="#0000FF">Nghề nghiệp/chức vụ</td>
        <td width="9%" bordercolor="#0000FF">Nơi công tác</td>
        <td width="9%" bordercolor="#0000FF">Ngày vào Đảng</td>
        <td width="9%" bordercolor="#0000FF">Tình trạng</td>
        <td width="9%" bordercolor="#0000FF">Ghi chú</td>
      <td width="8%" bordercolor="#0000FF">Thao tác</td>
    </tr>
    <?php
    // Hiển thị danh sách cán bộ
    while($i = mysql_fetch_array($kq)) {
        ?>
        <tr>
    <td height="80"><a href="tv_chitiethuyen.php?MaNV=<?php echo $i[0]; ?>"><?php echo $i[0];?></a></td>
    <td height="80"><a href="tv_chitiethuyen.php?MaNV=<?php echo $i[0]; ?>"><?php echo $i[1];?></a></td>
    <td><?php echo $i[2];?></td>
    <td><?php echo $i[3];?></td>
    <td><?php echo $i[4];?></td>
    <td><?php echo $i[5];?></td>
    <td><?php echo $i[6];?></td>
    <td height="80"><a href="tv_chitiethuyen.php?MaNV=<?php echo $i[0]; ?>"><?php echo $i[7];?></a></td>
    <td><?php echo $i[8];?></td>
    <td><?php echo $i[9];?></td>
    <td><?php echo $i[10];?></td>
    <td><?php echo $i[11];?></td>
    <td><?php echo $i[12];?></td>
    <td><?php echo $i[13];?></td>
    <td><?php echo $i[14];?></td>
    <td><?php echo $i[15];?></td>
    <td><?php echo $i[16];?></td>
    <td><?php echo $i[17];?></td>
    <td width="8%">
        <?php
            // Hiển thị nút Sửa và Xóa
            echo '<a href="tv_edit1huyen.php?MaNV='.$i[0].'">Sửa</a>';
            echo ' | ';
            echo '<a href="sp_process_deletehuyen.php?MaNV='.$i[0].'" onclick="return confirm(\'Bạn có muốn xóa hay không\');">Xóa</a>';
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
