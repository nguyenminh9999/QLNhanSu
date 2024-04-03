<?php
include("ketnoi.inc");
if( isset($_GET["MaCB"]))
{
	$MaCB=$_GET["MaCB"];
	$kq = mysql_query("select * from nhansuxaphuhuu where MaCB = '$MaCB'",$link);
	if($kq)
	{
		$i = mysql_fetch_row($kq);
		$MaCB = $i[0];
        $Hoten = $i[1];
        $Ngaysinh = $i[2];
        $Gioitinh = $i[3];
        $Quoctich = $i[4];
        $Dantoc = $i[5];
        $Tongiao = $i[6];
        $Quequan = $i[7];
        $Giaoducphothong = $i[8];
        $Chuyenmonnghiepvu = $i[9];
        $Tuoi = $i[10];
        $Lyluanchinhtri = $i[11];
        $Ngoaingu = $i[12];
        $Nghenghiep = $i[13];
        $Noicongtac = $i[14];
        $Ngayvaodang = $i[15];
        $Ghichu = $i[16];
        $Thaotac = $i[17];
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
      <a href="tv_danhmucxaphuhuu.php"><h4>Danh mục thành viên</h4></a>
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
              <td width="245"><?php echo $MaCB;?></td>
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
              <td>Giới tính</td>
              <td><?php echo $Gioitinh;?></td>
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
              <td>Quê quán</td>
              <td><?php echo $Quequan;?></td>
            </tr>
            <tr>
              <td>Giáo dục phổ thông</td>
              <td><?php echo $Giaoducphothong;?></td>
            </tr>
            <tr>
              <td>Chuyên môn nghiệp vụ</td>
              <td><?php echo $Chuyenmonnghiepvu;?></td>
            </tr>
            <tr>
              <td>Tuổi</td>
              <td><?php echo $Tuoi;?></td>
            </tr>
            <tr>
              <td>Lý luận chính trị</td>
              <td><?php echo $Lyluanchinhtri;?></td>
            </tr>
            <tr>
              <td>Ngoại ngữ</td>
              <td><?php echo $Ngoaingu;?></td>
            </tr>
            <tr>
              <td>Nghề nghiệp/chức vụ</td>
              <td><?php echo $Nghenghiepchucvu;?></td>
            </tr>
            <tr>
              <td>Nơi công tác</td>
              <td><?php echo $Noicongtac;?></td>
            </tr>
            <tr>
              <td>Ngày vào Đảng</td>
              <td><?php echo $Ngayvaodang;?></td>
            </tr>
            <tr>
              <td>Ghi chú</td>
              <td><?php echo $Ghichu;?></td>
            </tr>
            <tr>
              <td>Thao tác</td>
              <td><?php echo $Thaotac;?></td>
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
