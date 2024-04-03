<?php
include("phanquyen.php");
$macb = !(isset($_POST["txtmacb"]))?"":$_POST["txtmacb"];
$hoten = !(isset($_POST["txthoten"]))?"":$_POST["txthoten"];
$ngaysinh = !(isset($_POST["txtngaysinh"]))?"":$_POST["txtngaysinh"];
$gioitinh = !(isset($_POST["txtgioitinh"]))?"":$_POST["txtgioitinh"];
$quoctich = !(isset($_POST["txtquoctich"]))?"":$_POST["txtquoctich"];
$dantoc = !(isset($_POST["txtdantoc"]))?"":$_POST["txtdantoc"];
$tongiao = !(isset($_POST["txttongiao"]))?"":$_POST["txttongiao"];
$quequan = !(isset($_POST["txtquequan"]))?"":$_POST["txtquequan"];
$giaoducphothong = !(isset($_POST["txtgiaoducphothong"]))?"":$_POST["txtgiaoducphothong"];
$chuyenmonnghiepvu = !(isset($_POST["txtchuyenmonnghiepvu"]))?"":$_POST["txtchuyenmonnghiepvu"];
$tuoi = !(isset($_POST["txttuoi"]))?"":$_POST["txttuoi"];
$lyluanchinhtri = !(isset($_POST["txtlyluanchinhtri"]))?"":$_POST["txtlyluanchinhtri"];
$ngoaingu = !(isset($_POST["txtngoaingu"]))?"":$_POST["txtngoaingu"];
$nghenghiepchucvu = !(isset($_POST["txtnghenghiepchucvu"]))?"":$_POST["txtnghenghiepchucvu"];
$noicongtac = !(isset($_POST["txtnoicongtac"]))?"":$_POST["txtnoicongtac"];
$ngayvaodang = !(isset($_POST["txtngayvaodang"]))?"":$_POST["txtngayvaodang"];
$ghichu = !(isset($_POST["txtghichu"]))?"":$_POST["txtghichu"];
$thaotac = !(isset($_POST["txtthaotac"]))?"":$_POST["txtthaotac"];


if(( $macb == "") || ($hoten == ""))
{
	?>
	<script language="javascript">
	confirm(" Cần điền đầy đủ thông tin");
	window.location = "sp_addxaphuhuu.php";
	</script>
	<?php
}
else
{
		include("ketnoi.inc");
		$ketqua_ktra = mysql_query("select MaCB from nhansuxaphuhuu where MaCB = '{$macb}'",$link);
		$num = mysql_num_rows($ketqua_ktra);
		if( $num == 0 ) // Kiểm tra trùng dữ liệu
		{
				$ketqua_them = mysql_query("insert into nhansuxaphuhuu (MaCB,Hoten,Ngaysinh,Gioitinh,Quoctich,Dantoc,Tongiao,Quequan,Giaoducphothong,Chuyenmonnghiepvu,Tuoi,Lyluanchinhtri,Ngoaingu,Nghenghiepchucvu,Noicongtac,Ngayvaodang, Ghichu,Thaotac) values('$macb','$hoten','$ngaysinh','$gioitinh','$quoctich','$dantoc','$tongiao','$quequan','$giaoducphothong','$chuyenmonnghiepvu','$tuoi','$lyluanchinhtri','$ngoaingu','$nghenghiepchucvu','$noicongtac','$ngayvaodang','$ghichu','$thaotac')",$link);
				if($ketqua_them)
				{
					
					header("location:sp_chitietxaphuhuu.php?MaCB='$macb'"); 
				}
				else
				{
					?>
					<script language="javascript">
					window.alert(" Có lỗi! Không thực hiện thêm sản phẩm được <br> Vui lòng thử lại");
					window.location = "sp_addxaphuhuu.php";
					</script>
					<?php
				}
		}
		else
		{
			?>
			<script language="javascript">
			window.alert(" Ðã tồn mã này ");
			window.location = "sp_addxaphuhuu.php";
			</script>
			<?php
		}
	}
?>
