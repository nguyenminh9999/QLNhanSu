<?php 
include("ketnoi.inc");
$str = "select distinct * from chucvu";
$kq = mysql_query($str,$link);

// Kiểm tra truy vấn có thành công không
if($kq !== false) {
    $num_row = mysql_num_rows($kq);
    // Sử dụng $num_row mà không gây ra cảnh báo
} else {
    // Xử lý trường hợp truy vấn không thành công
    echo "Có lỗi xảy ra khi thực hiện truy vấn.";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
      <td><?php

	  if(isset($_SESSION["s_user"]))
	  {
	  	if($_SESSION["s_phanquyen"] == "1")
	  	{
	  		//print '<div align="right"><a href="sp_add.php">Thêm cán bộ mới</a></div>';
	 	}
	  	else
	  	{
	  		echo " ";
	  	}
	  }
	  else
	  {
	  	echo "";
	  } 
	  ?>	</td>
    </tr>
    <tr>
      <td colspan="8"> </td>
    </tr>
</table>
<div align="center"><h1>Danh mục chức vụ</h1></div>
<table width="100%" border="1">
    <tr>
      <td width="6%" bordercolor="#0000FF">Mã NV</td>
      <td width="13%" bordercolor="#0000FF">Mã phòng ban</td>
      <td width="9%" bordercolor="#0000FF">Tên phòng ban</td>
      <td width="9%" bordercolor="#0000FF">Mã chức vụ</td>
      <td width="8%" bordercolor="#0000FF">Tên chức vụ</td>
       <td width="8%" bordercolor="#0000FF">Thao tác</td>
    </tr>
	<?php
	$max_row = 5;
	$cur_page = 1;
	if(isset($_GET["cur_page"]))
	{
		if($_GET["cur_page"] == "")
		{
			$cur_page = 1;
		}
		else
		{
			$cur_page = $_GET["cur_page"];
		}
	}
	$start = ($cur_page - 1)*$max_row;
	$end = $start + $max_row;
	$count = 0;
	while($i = mysql_fetch_array($kq))
	{
	$count = $count + 1;
	if(($count > $start)&&($count <= $end))
	{
	?>
    <tr>
      <td height="80"><?php echo $i[0];?></td>
      <td><?php echo $i[1];?></td>
      <td><?php echo $i[2];?></td>
      <td><?php echo $i[3];?></td>
      <td><?php echo $i[4];?></td>
	  <td width="8%">
	  <?php
	  if(isset($_SESSION["s_user"]))
	  {
	  	if($_SESSION["s_phanquyen"] == "1")
	  	{
	  		print '<a href="tv_edit2.php?MaNV='.$i["MaNV"].'">Sửa</a>'; ?>
		
	 <?php
	 	}
	  	else
	  	{
	  		echo " ";
	  	}
	  }
	  else
	  {
	  	echo "";
	  } 
	  ?>	  
	  </td>
    </tr>
	<?php
	}
	}
	?>
</table>
<div align="center">
<?php
if($num_row>$max_row)
	{
		$total_page=ceil($num_row/$max_row);
		for($m=1;$m<=$total_page;$m++)
		{
			if($m!=$cur_page)
			echo "<a href='chucvu.php?cur_page=$m'>$m</a> &nbsp;&nbsp;";
			else
			echo "<span>$m</span> &nbsp;&nbsp;";
		}
	}
?>
</div>
</body>
</html>
