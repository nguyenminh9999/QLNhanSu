<?php
include("ketnoi.inc");
if( isset($_GET["MaNV"]))
{
	$MaNV=$_GET["MaNV"];
	$kq = mysql_query("select * from chucvu where MaNV = '$MaNV'",$link);
	if($kq)
	{
		$i = mysql_fetch_row($kq);
		$MaNV = $i[0];
		$MaPB = $i[1];
		$TenPB = $i[2];
		$MaCV = $i[3];
		$TenCV = $i[4];
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
      <a href="chucvu.php"><h4>Danh mục chức vụ</h4></a>
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
         <h1> Thông tin chức vụ</h1>
        </center>
        </p>
          <table width="486" height="417" border="1">
            <tr>
              <td width="212">Mã nhân viên</td>
              <td width="245"><?php echo $MaNV;?></td>
            </tr>
            <tr>
              <td>Mã phòng ban</td>
              <td><?php echo $MaPB;?></td>
            </tr>
            <tr>
              <td>Tên phòng ban</td>
              <td><?php echo $TenPB;?></td>
            </tr>
            <tr>
              <td>Mã chức vụ</td>
              <td><?php echo $MaCV;?></td>
            </tr>
            <tr>
              <td>Tên chức vụ</td>
              <td><?php echo $TenCV;?></td>
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
