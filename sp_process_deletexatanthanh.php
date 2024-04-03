<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$MaCB=$_GET["MaCB"];
include("ketnoi.inc");
if(isset($_GET["MaCB"]))
{
$sql="delete from nhansuxatanthanh where MaCB = '{$MaCB}'";
if(mysql_query($sql))
{
	?>
    <script language="javascript">
	window.alert("xoa thanh cong");
	window.location="tv_danhmucxatanthanh.php";
	</script>
    <?php
}
else
{
	?>
	 <script language="javascript">
	window.alert("xoa that bai");
	window.location="tv_danhmucxatanthanh.php";
	</script>
	<?php
}
}
?>
</body>
</html>
