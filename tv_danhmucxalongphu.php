<?php
include("ketnoi.inc");

// Truy vấn danh sách cán bộ từ database
$str = "SELECT `MaCB`, `Hoten`, `Ngaysinh`, `Gioitinh`, `Quoctich`, `Dantoc`, `Tongiao`, `Quequan`, `Giaoducphothong`, `Chuyenmonnghiepvu`, `Tuoi`, `Lyluanchinhtri`, `Ngoaingu`, `Nghenghiepchucvu`, `Noicongtac`, `Ngayvaodang`, `Tinhtrang`, `Ghichu` FROM nhansuxalongphu"; 
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
	$total_cabo_sophieu = count($thongke_quequan);
}




// Xử lý tìm kiếm
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $str .= " WHERE MaCB LIKE '%$search_term%' OR Hoten LIKE '%$search_term%' OR Quequan LIKE '%$search_term%' OR Gioitinh LIKE '%$search_term%' OR Dantoc LIKE '%$search_term%' OR Tongiao LIKE '%$search_term%' OR Giaoducphothong LIKE '%$search_term%' OR Chuyenmonnghiepvu LIKE '%$search_term%' OR Tuoi LIKE '%$search_term%' OR Lyluanchinhtri LIKE '%$search_term%' OR Ngoaingu LIKE '%$search_term%' OR Nghenghiepchucvu LIKE '%$search_term%' OR Noicongtac LIKE '%$search_term%' OR Tinhtrang LIKE '%$search_term%'";

    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Xử lý hiển thị thông tin theo quê quán
if (isset($_GET['quequan'])) {
    $quequan_selected = $_GET['quequan'];
    if ($quequan_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị theo quê quán được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Quequan = '$quequan_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}


// Hiển thị danh sách cán bộ theo tình trạng
if (isset($_GET['tinhtrang'])) {
    $tinhtrang_selected = $_GET['tinhtrang'];
    if ($tinhtrang_selected == 'all') {
        // Hiển thị tất cả nhân viên
        $str = "SELECT * FROM nhansuxalongphu";
    } elseif ($tinhtrang_selected == 'miennhiem') {
        // Hiển thị những nhân viên có tình trạng là "Miễn nhiệm"
        $str = "SELECT * FROM nhansuxalongphu WHERE Tinhtrang = 'Miễn nhiệm'";
    } elseif ($tinhtrang_selected == 'bainhiem') {
        // Hiển thị những nhân viên có tình trạng là "Bãi nhiệm"
        $str = "SELECT * FROM nhansuxalongphu WHERE Tinhtrang = 'Bãi nhiệm'";
    } else {
        // Hiển thị theo tình trạng được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Tinhtrang = '$tinhtrang_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo dân tộc
if (isset($_GET['dantoc'])) {
    $dantoc_selected = $_GET['dantoc'];
    if ($dantoc_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị cán bộ theo dân tộc được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Dantoc = '$dantoc_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo giới tính
if (isset($_GET['gioitinh'])) {
    $gioitinh_selected = $_GET['gioitinh'];
    if ($gioitinh_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị cán bộ theo giới tính được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Gioitinh = '$gioitinh_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo tôn giáo
if (isset($_GET['tongiao'])) {
    $tongiao_selected = $_GET['tongiao'];
    if ($tongiao_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị cán bộ theo tôn giáo được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Tongiao = '$tongiao_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo trình độ chuyên môn nghiệp vụ
if (isset($_GET['chuyenmon'])) {
    $chuyenmon_selected = $_GET['chuyenmon'];
    if ($chuyenmon_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị cán bộ theo trình độ chuyên môn nghiệp vụ được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Chuyenmonnghiepvu = '$chuyenmon_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo độ tuổi
if (isset($_GET['tuoi'])) {
    $tuoi_selected = $_GET['tuoi'];
    if ($tuoi_selected == '18_70') {
        // Hiển thị cán bộ trong độ tuổi từ 18 đến 70
        $str = "SELECT * FROM nhansuxalongphu WHERE Tuoi BETWEEN 18 AND 70";
    } elseif ($tuoi_selected == '20_35') {
        // Hiển thị cán bộ trong độ tuổi từ 20 đến 35
        $str = "SELECT * FROM nhansuxalongphu WHERE Tuoi BETWEEN 20 AND 35";
    } elseif ($tuoi_selected == '35_45') {
        // Hiển thị cán bộ trong độ tuổi từ trên 35 đến dưới 45
        $str = "SELECT * FROM nhansuxalongphu WHERE Tuoi BETWEEN 35 AND 45";
    } elseif ($tuoi_selected == '45_62') {
        // Hiển thị cán bộ trong độ tuổi từ trên 45 đến dưới 62
        $str = "SELECT * FROM nhansuxalongphu WHERE Tuoi BETWEEN 45 AND 62";
    } elseif ($tuoi_selected == '62_tren') {
        // Hiển thị cán bộ trong độ tuổi từ 62 trở lên
        $str = "SELECT * FROM nhansuxalongphu WHERE Tuoi >= 62";
    } else {
        // Nếu không chọn độ tuổi cụ thể, hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo Lý luận chính trị
if (isset($_GET['lyluanchinhtri'])) {
    $lyluanchinhtri_selected = $_GET['lyluanchinhtri'];
    if ($lyluanchinhtri_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị cán bộ theo Lý luận chính trị được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Lyluanchinhtri = '$lyluanchinhtri_selected'";
    }
    $kq = mysql_query($str, $link);
    $num_row = mysql_num_rows($kq);
}

// Hiển thị danh sách cán bộ theo Ngoại ngữ
if (isset($_GET['ngoaingu'])) {
    $ngoaingu_selected = $_GET['ngoaingu'];
    if ($ngoaingu_selected == 'all') {
        // Hiển thị tất cả cán bộ
        $str = "SELECT * FROM nhansuxalongphu";
    } else {
        // Hiển thị cán bộ theo Ngoại ngữ được chọn
        $str = "SELECT * FROM nhansuxalongphu WHERE Ngoaingu = '$ngoaingu_selected'";
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
<style>
  /* CSS cho nút in */
  .print-button {
    font-size: 1.5em;
    padding: 10px 20px;
    border: 2px solid #ccc;
    cursor: pointer;
    transition: background-color 0.5s, color 0.5s; /* Hiệu ứng chuyển đổi màu */
    animation: pulse 1.5s infinite; /* Hiệu ứng thu hút */
  }

  /* Hiệu ứng pulse */
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
  }

  /* CSS cho hiệu ứng khi đưa chuột vào nút */
  .print-button:hover {
	background-color: #0000FF; /* Màu nền khi đưa chuột vào */
	color: #FFF; /* Màu chữ khi đưa chuột vào */
	animation: none; /* Ngừng hiệu ứng pulse khi đưa chuột vào */
  }
  
  input[type="text"] {
    font-size: 1.2em; /* Kích thước chữ trong ô nhập liệu */
    padding: 10px; /* Kích thước lề bên trong ô nhập liệu */
    width: 300px; /* Chiều rộng của ô nhập liệu */
    border: 2px solid #ccc; /* Đường viền của ô nhập liệu */
  }

  input[type="submit"] {
    font-size: 1.2em; /* Kích thước chữ trong nút "Tìm kiếm" */
    padding: 10px 20px; /* Kích thước lề bên trong nút "Tìm kiếm" (10px trên và dưới, 20px bên trái và phải) */
    border: 2px solid #ccc; /* Đường viền của nút "Tìm kiếm" */
    cursor: pointer; /* Thêm biểu tượng chuột khi di chuyển qua nút "Tìm kiếm" */
  }
  
  .menu-link {
    font-size: 1.2em; /* Điều chỉnh kích thước chữ theo ý muốn */
    transition: color 0.5s; /* Hiệu ứng chuyển đổi màu trong 0.5s */
  }

  .menu-link:hover {
    color: red; /* Màu chữ khi hover */
    font-weight: bold; /* Chữ đậm khi hover */
    text-decoration: underline; /* Gạch chân khi hover */
  }
  
  .elegant-text {
    font-size: 2.5em; /* Kích thước chữ tiêu đề */
    letter-spacing: 2px; /* Khoảng cách giữa các chữ cái */
    transition: color 0.5s ease; /* Hiệu ứng màu chữ mềm mại */
  }
  
  .elegant-text:hover {
    color: #FF69B4; /* Màu chữ khi hover (ví dụ: màu hồng nhạt) */
  }
  
  @keyframes glow {
    0% { text-shadow: 0 0 5px #ff0000; }
    50% { text-shadow: 0 0 20px #ff0000; }
    100% { text-shadow: 0 0 5px #ff0000; }
  }

  .add-new-button a span {
    animation: glow 2s infinite;
  }

  /* CSS để điều chỉnh vị trí của chữ "bộ" */
  .add-new-button a h2 {
    margin: 0; /* Loại bỏ khoảng trắng giữa chữ "Thêm" và "cán bộ mới" */
  }

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  .search-header {
    animation: bounce 1s infinite;
  }
 @keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}

.search-button {
  animation: pulse 1.5s infinite;
}

.search-input {
  font-size: 1.2em; /* Kích thước chữ trong ô nhập liệu */
  padding: 10px; /* Kích thước lề bên trong ô nhập liệu */
  width: 300px; /* Chiều rộng của ô nhập liệu */
  border: 2px solid #ccc; /* Đường viền của ô nhập liệu */
  transition: border-color 0.5s ease; /* Hiệu ứng chuyển đổi màu viền */
}

.search-input:focus {
  border-color: #FF69B4; /* Màu viền khi ô nhập liệu được focus */
}

.navigation-link {
    font-size: 1.5em; /* Kích thước chữ */
    transition: color 0.5s; /* Hiệu ứng chuyển đổi màu */
  }

  .navigation-link:hover {
    color: red; /* Màu chữ khi di chuột vào */
  }

/* CSS cho nút tìm kiếm */
  .search-button {
    font-size: 1.2em;
    padding: 10px 20px;
    border: 2px solid #ccc;
    cursor: pointer;
    animation: changeColor 3s infinite; /* Sử dụng animation để tự đổi màu */
  }

  /* Keyframes để thay đổi màu chữ */
  @keyframes changeColor {
    0% { color: red; } /* Màu đầu tiên */
    33.33% { color: blue; } /* Màu thứ hai */
    66.67% { color: green; } /* Màu thứ ba */
    100% { color: red; } /* Quay lại màu đầu tiên */
  }

  /* CSS cho hiệu ứng khi đưa chuột vào nút */
  .search-button:hover {
    color: red; /* Màu chữ khi đưa chuột vào */
    background-color: #ffcc00; /* Màu nền khi đưa chuột vào */
  }
</style>
</head>
<body> 
<table width="100%" border="0">
    <tr>
      <td colspan="8"></td>
    </tr>
    <td width="50%">
        <a href="index.php" id="back-to-home-button"><h2 class="navigation-link">Quay lại trang chủ</h2></a>
<a href="xathitran.php" id="back-to-previous-page-button"><h2 class="navigation-link">Quay lại trang trước</h2></a>

    </td>
      
      <td width="1%">&nbsp;</td>
      <td width="8%">&nbsp;</td>
      <td width="8%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
      <td width="8%">&nbsp;</td>
      <td width="14%">&nbsp;</td>
      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php
          // Hiển thị nút thêm cán bộ mới
          echo '<div align="right" class="add-new-button">
  <a href="sp_addxalongphu.php"><span><h2>Thêm cán bộ mới</h2></span></a>
</div>';

        ?></td>
      <td width="4%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="8"> </td>
    </tr>
</table>

<!-- Form tìm kiếm -->
<div align="center">
  <h1 class="search-header">Tìm kiếm</h1>
  <form method="get" action="tv_danhmucxalongphu.php">
    <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm" class="search-input" />

   <input type="submit" value="Tìm kiếm" class="search-button" id="searchButton" />
  </form>
</div>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quản lý danh sách cán bộ</title>
<style>
  .menu-link {
    font-size: 1.2em; /* Điều chỉnh kích thước chữ theo ý muốn */
  }
  
  .dynamic-text {
    transition: color 0.5s, transform 0.5s, text-shadow 0.5s; /* Hiệu ứng chuyển đổi màu, kích thước và bóng chữ trong 0.5s */
    cursor: pointer; /* Biến con trỏ thành dấu nhấp chuột khi di chuyển vào */
}

.dynamic-text:hover {
    color: #FF69B4; /* Màu chữ khi hover (ví dụ: màu hồng nhạt) */
    transform: scale(1.1); /* Kích thước chữ lớn hơn khi hover */
    text-shadow: 0 0 10px rgba(255, 105, 180, 0.7); /* Tạo hiệu ứng bóng đổ màu hồng */
}

.center {
    text-align: center;
  }

  .hidden {
    display: none;
  }
  
  #selectBox {
  transition: background-color 0.3s;
}

#selectBox:hover {
  background-color: lightblue;
}


</style>
</head>
<body> 

<select id="selectBox" onchange="showSelected()" onmouseover="changeColor()" onmouseout="restoreColor()">
  <option value="#">Thống kê</option>
  <option value="quequan">Quê quán</option>
  <option value="tinhtrang">Tình trạng</option>
  <option value="dantoc">Dân tộc</option>
  <option value="gioitinh">Giới tính</option>
  <option value="tongiao">Tôn giáo</option>
  <option value="chuyenmonnghiepvu">Trình độ chuyên môn nghiệp vụ</option>
  <option value="tuoi">Độ tuổi</option>
  <option value="lyluanchinhtri">Lý luận chính trị</option>
  <option value="ngoaingu">Ngoại ngữ</option>
</select>


<!-- Thống kê theo quê quán -->
<div id="quequan" class="center hidden">
  <h1 class="elegant-text">Thống kê theo quê quán:</h1>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?quequan=all' class='menu-link' id='quequan_all'>Tất cả (<?php echo $total_cabo_sophieu; ?> cán bộ)</a></li>
    <?php
    foreach ($thongke_quequan as $quequan => $soluong) {
        $menu_link_name = "quequan_" . urlencode($quequan);
        echo "<li><a href='tv_danhmucxalongphu.php?quequan=".urlencode($quequan)."' class='menu-link' id='$menu_link_name'>$quequan ($soluong cán bộ)</a></li>";
    }
    ?>
  </ul>
</div>


<div id="tinhtrang" class="center hidden">
  <h2 class="elegant-text">Thống kê theo tình trạng:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?tinhtrang=all' class="menu-link">Tất cả (<?php echo $num_row; ?> nhân viên)</a></li>
    <li><a href='tv_danhmucxalongphu.php?tinhtrang=Đang hoạt động' class="menu-link">Đang hoạt động</a></li>
    <li><a href='tv_danhmucxalongphu.php?tinhtrang=Miễn nhiệm' class="menu-link">Miễn nhiệm</a></li>
    <li><a href='tv_danhmucxalongphu.php?tinhtrang=Bãi nhiệm' class="menu-link">Bãi nhiệm</a></li>
  </ul>
</div>

<div id="dantoc" class="center hidden">
  <h2 class="elegant-text">Thống kê theo dân tộc:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?dantoc=all' class="menu-link">Tất cả (<?php echo $num_row; ?> cán bộ)</a></li>
    <li><a href='tv_danhmucxalongphu.php?dantoc=Kinh' class="menu-link">Kinh</a></li>
    <li><a href='tv_danhmucxalongphu.php?dantoc=Hoa' class="menu-link">Hoa</a></li>
    <li><a href='tv_danhmucxalongphu.php?dantoc=Khmer' class="menu-link">Khmer</a></li>
    <!-- Thêm các dân tộc khác tương tự như trên -->
  </ul>
</div>

<div id="gioitinh" class="center hidden">
  <h2 class="elegant-text">Thống kê theo giới tính:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?gioitinh=all' class="menu-link">Tất cả (<?php echo $num_row; ?> cán bộ)</a></li>
    <li><a href='tv_danhmucxalongphu.php?gioitinh=Nam' class="menu-link">Nam</a></li>
    <li><a href='tv_danhmucxalongphu.php?gioitinh=Nữ' class="menu-link">Nữ</a></li>
  </ul>
</div>

<div id="tongiao" class="center hidden">
  <h2 class="elegant-text">Thống kê theo tôn giáo:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?tongiao=all' class="menu-link">Tất cả (<?php echo $num_row; ?> cán bộ)</a></li>
    <li><a href='tv_danhmucxalongphu.php?tongiao=Phật giáo' class="menu-link">Phật giáo</a></li>
    <li><a href='tv_danhmucxalongphu.php?tongiao=Cao Đài' class="menu-link">Cao Đài</a></li>
    <li><a href='tv_danhmucxalongphu.php?tongiao=Công giáo' class="menu-link">Công giáo</a></li>
    <li><a href='tv_danhmucxalongphu.php?tongiao=Tin lành' class="menu-link">Tin lành</a></li>
    <li><a href='tv_danhmucxalongphu.php?tongiao=Thiên chúa' class="menu-link">Thiên chúa</a></li>
    <!-- Thêm các tôn giáo khác tương tự như trên -->
    <li><a href='tv_danhmucxalongphu.php?tongiao=Không tôn giáo' class="menu-link">Không tôn giáo</a></li>
  </ul>
</div>

<div id="chuyenmonnghiepvu" class="center hidden">
  <h2 class="elegant-text">Thống kê theo trình độ chuyên môn nghiệp vụ:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?chuyenmon=all' class="menu-link">Tất cả (<?php echo $num_row; ?> cán bộ)</a></li>
    <li><a href='tv_danhmucxalongphu.php?chuyenmon=Thạc sĩ' class="menu-link">Thạc sĩ</a></li>
    <li><a href='tv_danhmucxalongphu.php?chuyenmon=Đại học' class="menu-link">Đại học</a></li>
    <li><a href='tv_danhmucxalongphu.php?chuyenmon=Cao Đẳng' class="menu-link">Cao Đẳng</a></li>
    <li><a href='tv_danhmucxalongphu.php?chuyenmon=Trung Cấp' class="menu-link">Trung Cấp</a></li>
    <li><a href='tv_danhmucxalongphu.php?chuyenmon=Phổ thông' class="menu-link">Phổ thông</a></li>
    <!-- Thêm các trình độ chuyên môn nghiệp vụ khác tương tự như trên -->
  </ul>
</div>

<div id="tuoi" class="center hidden">
  <h2 class="elegant-text">Thống kê theo độ tuổi:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?tuoi=18_70' class="menu-link">Tất cả từ 18 đến 70 tuổi</a></li>
    <li><a href='tv_danhmucxalongphu.php?tuoi=20_35' class="menu-link">Từ 20 đến 35 tuổi</a></li>
    <li><a href='tv_danhmucxalongphu.php?tuoi=35_45' class="menu-link">Từ trên 35 đến dưới 45 tuổi</a></li>
    <li><a href='tv_danhmucxalongphu.php?tuoi=45_62' class="menu-link">Từ trên 45 đến dưới 62 tuổi</a></li>
    <li><a href='tv_danhmucxalongphu.php?tuoi=62_tren' class="menu-link">Từ 62 tuổi trở lên</a></li>
  </ul>
</div>

<div id="lyluanchinhtri" class="center hidden">
  <h2 class="elegant-text">Thống kê theo Lý luận chính trị:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?lyluanchinhtri=all' class="menu-link">Tất cả</a></li>
    <li><a href='tv_danhmucxalongphu.php?lyluanchinhtri=Cao cấp' class="menu-link">Cao cấp</a></li>
    <li><a href='tv_danhmucxalongphu.php?lyluanchinhtri=Trung cấp' class="menu-link">Trung cấp</a></li>
    <!-- Thêm các mức độ Lý luận chính trị khác tương tự như trên -->
  </ul>
</div>

<div id="ngoaingu" class="center hidden">
  <h2 class="elegant-text">Thống kê theo Ngoại ngữ:</h2>
  <ul>
    <li><a href='tv_danhmucxalongphu.php?ngoaingu=all' class="menu-link">Tất cả (<?php echo $num_row; ?> cán bộ)</a></li>
    <li><a href='tv_danhmucxalongphu.php?ngoaingu=Tiếng Anh' class="menu-link">Tiếng Anh</a></li>
    <li><a href='tv_danhmucxalongphu.php?ngoaingu=Tiếng Đức' class="menu-link">Tiếng Đức</a></li>
    <!-- Thêm các ngôn ngữ khác tương tự như trên -->
  </ul>
</div>


<div align="center">
  <h1 class="elegant-text">Danh mục các cán bộ</h1>
</div>
<table width="100%" border="1">
    <tr>
      <td width="6%" bordercolor="#0000FF">Mã cán bộ</td>
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
    <td height="80" class="dynamic-text">
      <a href="tv_chitietxalongphu.php?MaCB=<?php echo $i[0]; ?>"><?php echo $i[0];?></a>
    </td>
    <td height="80" class="dynamic-text">
      <a href="tv_chitietxalongphu.php?MaCB=<?php echo $i[0]; ?>"><?php echo $i[1];?></a>
    </td>
    <td><?php echo $i[2];?></td>
    <td><?php echo $i[3];?></td>
    <td><?php echo $i[4];?></td>
    <td><?php echo $i[5];?></td>
    <td><?php echo $i[6];?></td>
    <td height="80" class="dynamic-text">
      <a href="tv_chitietxalongphu.php?MaCB=<?php echo $i[0]; ?>"><?php echo $i[7];?></a>
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
            echo '<a href="tv_edit1xalongphu.php?MaCB='.$i[0].'">Sửa</a>';
            echo ' | ';
            echo '<a href="sp_process_deletexalongphu.php?MaCB='.$i[0].'" onclick="return confirm(\'Bạn có muốn xóa hay không\');">Xóa</a>';
        ?>     
    </td>
</tr>
        <?php
    }
    ?>
</table>
<br>
<!-- Nút in -->
<div align="center">
  <input type="button" value="In" onclick="window.print()" class="print-button" id="printButton" />
</div>



<script>
  // Lấy danh sách các liên kết "Quay lại trang chủ" và "Quay lại trang trước"
  var backButton = document.getElementById('back-to-home-button');
  var previousPageButton = document.getElementById('back-to-previous-page-button');

  // Thêm sự kiện mouseover và mouseout cho liên kết "Quay lại trang chủ"
  backButton.addEventListener('mouseover', function(event) {
    event.target.style.color = 'red'; // Thay đổi màu chữ khi di chuột vào
  });
  backButton.addEventListener('mouseout', function(event) {
    event.target.style.color = ''; // Khôi phục màu chữ khi di chuột ra
  });

  // Thêm sự kiện mouseover và mouseout cho liên kết "Quay lại trang trước"
  previousPageButton.addEventListener('mouseover', function(event) {
    event.target.style.color = 'red'; // Thay đổi màu chữ khi di chuột vào
  });
  previousPageButton.addEventListener('mouseout', function(event) {
    event.target.style.color = ''; // Khôi phục màu chữ khi di chuột ra
  });

  function showSelected() {
    var selectedValue = document.getElementById("selectBox").value;
    var elements = document.getElementsByClassName("center");

    // Ẩn tất cả các phần tử
    for (var i = 0; i < elements.length; i++) {
      elements[i].classList.add("hidden");
    }

    // Hiển thị phần tử được chọn
    document.getElementById(selectedValue).classList.remove("hidden");
  }
</script>


</body>
</html>
