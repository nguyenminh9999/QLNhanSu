<?php 
include("ketnoi.inc");
if(isset($_GET['MaNV']))
{
$manv = $_GET['MaNV'];
$str = "select * from thongtinnhanvien where MaNV='{$manv}'";
$kq = mysql_query($str,$link);
	if($kq)
	{
		$i = mysql_fetch_row($kq);
	}
	else
	{
		?>
		<script language="javascript">
		window.alert(" Lỗi! Không xem thông tin được");
		</script>
		<?php
		header("location:tv_danhmuc.php");
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
<table width="100%" border="0">
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php include("phanquyen.php");?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="42%" height="40"><div align="center">Mã nhân viên :<?php echo $i[0];?></div></td>
    <td width="58%">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="7"><img src="<?php echo $i[10];?>" width="440" height="265" /></td>
    <td height="43">Họ và tên:<?php echo $i[1];?> </td>
  </tr>
  <tr>
    <td height="35"><p>Ngày sinh:<?php echo $i[2];?> </p></td>
  </tr>
  <tr>
    <td height="35">Nơi sinh:<?php echo $i[3];?> </td>
  </tr>
  <tr>
    <td height="36">Nguyên quán: <?php echo $i[4];?></td>
  </tr>
  <tr>
    <td height="40">Quốc tịch: <?php echo $i[5];?> </td>
  </tr>
  <tr>
    <td height="32">Dân tộc: <?php echo $i[6];?> </td>
  </tr>
  <tr>
    <td height="35">Tôn giáo: <?php echo $i[7];?></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td>Tình trạng hôn nhân: <?php echo $i[8];?></td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td>Tình trạng sức khỏe: <?php echo $i[9];?></td>
  </tr>
</table>
</body>
</html>
