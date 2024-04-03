<?php
include("ketnoi.inc");
if( isset($_GET["MaNV"]))
{
	$MaNV=$_GET["MaNV"];
	$kq = mysql_query("select * from thongtinnhanvien where MaNV = '$MaNV'",$link);
	if($kq)
	{
		$i = mysql_fetch_row($kq);
		$MaNV = $i[0];
		$Hoten = $i[1];
		$Ngaysinh = $i[2];
		$Noisinh = $i[3];
		$Nguyenquan = $i[4];
		$Quoctich = $i[5];
		$Dantoc = $i[6];
		$Tongiao = $i[7];
		$Tinhtranghonnhan = $i[8];
		$Tinhtrangsuckhoe = $i[9];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<center>
  <table width="100%" border="0">
    <tr>
      <td colspan="5"></td>
    </tr>
    <tr>
      <td><a href="index.php"><h4>Trang chủ</h4></a>
      <a href="tv_danhmuc.php"><h4>Danh mục thành viên</h4></a>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <form id="form1" name="form1" method="post" action="">
    <table width="492" border="0">
      <tr>
        <td width="476" height="527"><p><center>
         <h1> Thông tin cá nhân        </h1>
        </center>
        </p>
          <table width="486" height="417" border="1">
            <tr>
              <td width="212">Mã NV</td>
              <td width="245"><?php echo $MaNV;?></td>
            </tr>
            <tr>
              <td>Họ tên</td>
              <td><?php echo $Hoten;?></td>
            </tr>
            <tr>
              <td>Ngày sinh:</td>
              <td><?php echo $Ngaysinh;?></td>
            </tr>
            <tr>
              <td>Nơi sinh</td>
              <td><?php echo $Noisinh;?></td>
            </tr>
            <tr>
              <td>Nguyên quán</td>
              <td><?php echo $Nguyenquan;?></td>
            </tr>
            <tr>
              <td>Quốc tịch</td>
              <td><?php echo $Quoctich;?></td>
            </tr>
            <tr>
              <td>Dân tộc</td>
              <td><?php echo $Dantoc;?></td>
            </tr>
            <tr>
              <td>Tôn giáo</td>
              <td><?php echo $Tongiao;?></td>
            </tr>
            <tr>
              <td>Tình trạng hôn nhân</td>
              <td><?php echo $Tinhtranghonnhan;?></td>
            </tr>
            <tr>
              <td>Tình trạng sức khỏe</td>
              <td><?php echo $Tinhtrangsuckhoe;?></td>
            </tr>
          </table>
        <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="143"><label></label></td>
      </tr>
    </table>
  </form>
</center>
</body>
</html>
