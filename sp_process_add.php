<?php
include("phanquyen.php");
$manv = !(isset($_POST["txtmanv"]))?"":$_POST["txtmanv"];
$hoten = !(isset($_POST["txthoten"]))?"":$_POST["txthoten"];
$ngaysinh = !(isset($_POST["txtngaysinh"]))?"":$_POST["txtngaysinh"];
$noisinh = !(isset($_POST["txtnoisinh"]))?"":$_POST["txtnoisinh"];
$ngquan = !(isset($_POST["txtngquan"]))?"":$_POST["txtngquan"];
$qtich = !(isset($_POST["txtqtich"]))?"":$_POST["txtqtich"];
$dantoc = !(isset($_POST["txtdantoc"]))?"":$_POST["txtdantoc"];
$tongiao = !(isset($_POST["txttongiao"]))?"":$_POST["txttongiao"];
$tthonnhan = !(isset($_POST["txttthonnhan"]))?"":$_POST["txttthonnhan"];
$ttsuckhoe = !(isset($_POST["txtsuckhoe"]))?"":$_POST["txtsuckhoe"];
$anh = !(isset($_POST["txtanh"]))?"":$_POST["txtanh"];

if(( $manv == "") || ($hoten == ""))
{
	?>
	<script language="javascript">
	confirm(" Cần điền đầy đủ thông tin");
	window.location = "sp_add.php";
	</script>
	<?php
}
else
{
		include("ketnoi.inc");
		$ketqua_ktra = mysql_query("select MaNV from thongtinnhanvien where MaNV = '{$manv}'",$link);
		$num = mysql_num_rows($ketqua_ktra);
		if( $num == 0 ) // Kiểm tra trùng dữ liệu
		{
				$ketqua_them = mysql_query("insert into thongtinnhanvien (MaNV,Hoten,Ngaysinh,Noisinh,Nguyenquan,Quoctich,Dantoc,Tongiao,Tinhtranghonnhan,Tinhtrangsuckhoe,Anh) values('$manv','$hoten','$ngaysinh','$noisinh','$ngquan','$qtich','$dantoc','$tongiao','$tthonnhan','$ttsuckhoe','$anh')",$link);
				if($ketqua_them)
				{
					
					header("location:sp_chitiet.php?MaNV='$manv'"); 
				}
				else
				{
					?>
					<script language="javascript">
					window.alert(" Có lỗi! Không thực hiện thêm sản phẩm được <br> Vui lòng thử lại");
					window.location = "sp_add.php";
					</script>
					<?php
				}
		}
		else
		{
			?>
			<script language="javascript">
			window.alert(" Ðã tồn mã này ");
			window.location = "sp_add.php";
			</script>
			<?php
		}
	}
?>
