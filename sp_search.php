<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-size: 36px}
.style2 {font-size: 24px}
-->
</style>
</head>

<body>
<?php
include("phanquyen.php");
?>
<br />
<a href="index.php"><h1>Trang chủ</h1></a>
<center> 
  <p><span class="style1">Tìm kiếm cán bộ</span><br />
  </p>
  <form id="form1" name="form1" method="post" action="sp_search.php?id=">
    <table width="365" border="1">

      <tr>
        <td>Từ tìm kiếm </td>
        <td><label>
          <input name="txttukhoa" type="text" id="txttukhoa" size="30" maxlength="30" />
        </label></td>
      </tr>
    </table>
    <p>
      <label>
      <input name="btntimkiem" type="submit" id="btntimkiem" value="   Tìm kiếm   " />
      </label>
    &nbsp;</p> 
  </form>

<?php
if(isset($_POST["txttukhoa"]))  
{
include("ketnoi.inc");
$tukhoa = $_POST["txttukhoa"];
$str = "select * from thongtinnhanvien where Hoten like '%".$tukhoa."%'";
$kq = mysql_query($str);
if($kq)
{
	?>
	<table width="100%" border="1">
      <tr>
      	<td width="15%">Mã nhân viên</td>
        <td width="15%">Họ tên</td>
        <td width="36%">Hình ảnh</td>
        <td width="12%">Ngày sinh</td>
        <td width="12%">Nơi sinh</td>
        <td width="10%">Thao tác:</td>
      </tr>
	  <?php
	  while($i = mysql_fetch_array($kq))
	  {
	  ?>
      <tr>
      	<td><?php echo $i["MaNV"];?></td>
        <td><?php echo $i["Hoten"];?></td>
        <td><img src="<?php echo $i["Anh"];?>" height="150" width="150" /></td>
        <td><?php echo $i["Ngaysinh"];?></td>
        <td><?php echo $i["Noisinh"];?></td>
        <td>
		<?php
if(isset($_SESSION["s_user"]) && isset($s_phanquyen) && $s_phanquyen == "1") {
    print '<a href="tv_edit1.php?MaNV='.$i[0].'">Sửa</a>'; 
    print ' | ';
    ?>
    <a href="sp_process_delete.php?MaNV=<?php echo $i[0];?>" onclick="return confirm('Bạn có muốn xóa hay không');">Xóa</a>
<?php
} else {
    echo " ";
}
?>

		</td>
      </tr>
	  <?php
	  }
	  ?>
    </table>
  <?php
}
else
{
	echo " Không tìm thấy";
}
}
else //chưa ấn vào tìm kiếm
{
include("ketnoi.inc");
$str = "select  MaNV,Hoten,Anh,Ngaysinh,Noisinh from thongtinnhanvien ";
$kq = mysql_query($str);
if($kq)
{
	?>
	<table width="100%" border="1">
      <tr><td width="15%">Mã nhân viên</td>
        <td width="15%">Họ tên</td>
        <td width="36%">Hình ảnh</td>      
        <td width="12%">Ngày sinh</td>
        <td width="12%">Nơi sinh</td>
        <td width="10%">Thao tác:</td>
      </tr>
      
	  <?php
	  while($i = mysql_fetch_array($kq))
	  {
	  ?>
      <tr><td><?php echo $i["MaNV"];?></td>
        <td><?php echo $i["Hoten"];?></td>
        <td><img src="<?php echo $i["Anh"];?>" height="150" width="150" /></td>
        <td><?php echo $i["Ngaysinh"];?></td>
        <td><?php echo $i["Noisinh"];?></td>
       
        <td>
		<?php
	  	if(isset($_SESSION["s_user"]))
	  {
	  	if($_SESSION["s_phanquyen"] == "1")
	  	{
	  		print '<a href="tv_edit1.php?MaNV='.$i[0].'">Sửa</a>'; 
			print ' | ';?>
          <a href="sp_process_delete.php?MaNV=<?php echo $i[0];?>" onclick="return confirm('Bạn có muốn xoa hay không');">Xóa</a>
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
	  ?>
    </table>
  <?php
}
}

?>


</body>
</html>
