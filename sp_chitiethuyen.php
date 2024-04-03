<?php 
include("ketnoi.inc");
if(isset($_GET['MaNV']))
{
$manv = $_GET['MaNV'];
$str = "select * from nhansuhuyen where MaNV='{$manv}'";
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
		header("location:tv_danhmuchuyen.php");
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
    <td width="42%" height="40"><div align="center">Mã nhân viên :<?php echo isset($i[0]) ? $i[0] : ''; ?></div></td>
    <td width="58%">&nbsp;</td>
  </tr>
  <tr>
    <td height="43">Họ và tên:<?php echo isset($i[1]) ? $i[1] : ''; ?> </td>
  </tr>
  <tr>
        <td height="35"><p>Ngày sinh:<?php echo isset($i[2]) ? $i[2] : ''; ?> </p></td>
    </tr>
    <tr>
        <td height="35">Giới tính:<?php echo isset($i[3]) ? $i[3] : ''; ?> </td>
    </tr>
    <tr>
        <td height="40">Quốc tịch: <?php echo isset($i[4]) ? $i[4] : ''; ?> </td>
    </tr>
    <tr>
        <td height="32">Dân tộc: <?php echo isset($i[5]) ? $i[5] : ''; ?> </td>
    </tr>
    <tr>
        <td height="35">Tôn giáo: <?php echo isset($i[6]) ? $i[6] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Quê quán: <?php echo isset($i[7]) ? $i[7] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Giáo dục phổ thông: <?php echo isset($i[8]) ? $i[8] : ''; ?></td>
    </tr>
    <tr>
        <td height="35">Chuyên môn nghiệp vụ:<?php echo isset($i[9]) ? $i[9] : ''; ?> </td>
    </tr>
    <tr>
        <td height="40">Tuổi: <?php echo isset($i[10]) ? $i[10] : ''; ?> </td>
    </tr>
    <tr>
        <td height="32">Lý luận chính trị: <?php echo isset($i[11]) ? $i[11] : ''; ?> </td>
    </tr>
    <tr>
        <td height="35">Ngoại ngữ: <?php echo isset($i[12]) ? $i[12] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Nghề nghiệp chức vụ: <?php echo isset($i[13]) ? $i[13] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Nơi công tác: <?php echo isset($i[14]) ? $i[14] : ''; ?></td>
    </tr>
    <tr>
        <td height="35">Ngoại ngữ: <?php echo isset($i[15]) ? $i[15] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Ngày vào Đảng: <?php echo isset($i[16]) ? $i[16] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Ghi chú: <?php echo isset($i[17]) ? $i[17] : ''; ?></td>
    </tr>
    <tr>
        <td height="44">&nbsp;</td>
        <td>Thao tác: <?php echo isset($i[18]) ? $i[18] : ''; ?></td>
    </tr>
</table>
</body>
</html>
