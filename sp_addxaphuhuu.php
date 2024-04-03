<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  @keyframes moveRect {
    0% {
      transform: translateX(0) scale(1);
    }
    25% {
      transform: translateX(50px) scale(1.1);
    }
    50% {
      transform: translateX(100px) scale(1);
    }
    75% {
      transform: translateX(50px) scale(1.1);
    }
    100% {
      transform: translateX(0) scale(1);
    }
  }

  .blink {
    display: inline-block;
    animation: moveRect 4s linear infinite;
  }
  
  /* Màu chữ khi di chuột vào */
  .blink:hover {
	  
    color: red;
	text-shadow: 0 0 10px #ff8c00; /* Tạo hiệu ứng nổi lên */
  }
  
  /* Màu chữ khi hover cho các liên kết */
  .blink-link:hover {
    color: red;
	text-shadow: 0 0 10px #ff8c00; /* Tạo hiệu ứng nổi lên */
  }
  
  @keyframes blinkColor {
    0% {
      color: #ff0000; /* Màu đỏ */
    }
    50% {
      color: #00ff00; /* Màu xanh lá cây */
    }
    100% {
      color: #0000ff; /* Màu xanh dương */
    }
  }

  @keyframes blinkEffect {
    0% {
      opacity: 1; /* Độ trong suốt 100% */
    }
    50% {
      opacity: 0.5; /* Độ trong suốt 50% */
    }
    100% {
      opacity: 1; /* Độ trong suốt 100% */
    }
  }

  /* Hiệu ứng text-shadow khi hover cho nút */
  button:hover {
    text-shadow: 0 0 5px rgba(255,255,255,0.7); /* Màu và độ trong suốt của shadow */
  }

  /* Hiệu ứng khi hover cho button */
  button:hover {
    transform: translateY(-3px); /* Di chuyển nút lên trên khi hover */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); /* Hiệu ứng shadow */
    animation: blinkEffect 1s linear infinite alternate; /* Hiệu ứng hào quang */
  }

  /* Áp dụng hiệu ứng chớp chớp (blinking) cho nút */
  .blinking {
    animation: blinkColor 3s linear infinite; /* Hiệu ứng đổi màu */
  }
</style>

</head>

<body>
<center>
<table width="100%" border="0">
    <tr>
      <td colspan="8"></td>
    </tr>
    <td>
        <a href="index.php" class="blink-link"><h3>Quay lại trang chủ</h3></a>
        <a href="tv_danhmucxaphuhuu.php" class="blink-link"><h3>Quay lại trang trước</h3></a>
    </td>
      <td width="2%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      
    </tr>
    <tr>
      <td colspan="8"> </td>
    </tr>
</table>
<div>
  <h1 class="blink">Thêm mới cán bộ</h1>
</div>
            
  
<form id="form1" name="form1" method="post" action="sp_process_addxaphuhuu.php">
  <table width="36%" border="0">
    <tr>
      <td width="42%"><div align="left">Mã cán bộ</div></td>
      <td width="58%"><label>
        <div align="left">
          <input name="txtmacb" type="text" id="txtmacb" size="10" maxlength="10" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Họ tên</div></td>
      <td><label>
        <div align="left">
          <input name="txthoten" type="text" id="txthoten" size="30" maxlength="100" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Ngày sinh</div></td>
      <td><label>
        <div align="left">
          <input name="txtngaysinh" type="text" id="txtngaysinh" size="10" maxlength="10" />
          YYYY-MM-DD      </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Giới sinh</div></td>
      <td><label>
        <div align="left">
          <input name="txtgioitinh" type="text" id="txtgioitinh" size="30" maxlength="100" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Quốc tịch</div></td>
      <td><div align="left">
        <input name="txtquoctich" type="text" id="txtquoctich" size="30" maxlength="100" />
      </div></td>
    </tr>
    <tr>
      <td><div align="left">Dân tộc</div></td>
      <td><label>
        <div align="left">
          <input name="txtdantoc" type="text" id="txtdantoc" size="30" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Tôn giáo</div></td>
      <td><label>
        <div align="left">
          <input name="txttongiao" type="text" id="txttongiao" size="30" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Quê quán</div></td>
      <td><label>
        <div align="left">
          <input name="txtquequan" type="text" id="txtquequan" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Giáo dục phổ thông</div></td>
      <td><label>
        <div align="left">
          <input name="txtgiaoducphothong" type="text" id="txtgiaoducphothong" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Chuyên môn nghiệp vụ</div></td>
      <td><label>
        <div align="left">
          <input name="txtchuyenmonnghiepvu" type="text" id="txtchuyenmonnghiepvu" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Quê quán</div></td>
      <td><label>
        <div align="left">
          <input name="txtquequan" type="text" id="txtquequan" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Giáo dục phổ thông</div></td>
      <td><label>
        <div align="left">
          <input name="txtgiaoducphothong" type="text" id="txtgiaoducphothong" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Chuyên môn nghiệp vụ</div></td>
      <td><label>
        <div align="left">
          <input name="txtchuyenmonnghiepvu" type="text" id="txtchuyenmonnghiepvu" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Tuổi</div></td>
      <td><label>
        <div align="left">
          <input name="txttuoi" type="text" id="txttuoi" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Lý luận chính trị</div></td>
      <td><label>
        <div align="left">
          <input name="txtlyluanchinhtri" type="text" id="txtlyluanchinhtri" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Ngoại ngữ</div></td>
      <td><label>
        <div align="left">
          <input name="txtngoaingu" type="text" id="txtngoaingu" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Nghề nghiệp chức vụ</div></td>
      <td><label>
        <div align="left">
          <input name="txtnghenghiepchucvu" type="text" id="txtnghenghiepchucvu" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Nơi công tác</div></td>
      <td><label>
        <div align="left">
          <input name="txtnoicongtac" type="text" id="txtnoicongtac" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Ngày vào Đảng</div></td>
      <td><label>
        <div align="left">
          <input name="txtngayvaodang" type="text" id="txtngayvaodang" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Ghi chú</div></td>
      <td><label>
        <div align="left">
          <input name="txtghichu" type="text" id="txtghichu" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Thao tác</div></td>
      <td><label>
        <div align="left">
          <input name="txtthaotac" type="text" id="txtthaotac" />
        </div>
      </label></td>
    </tr>
   
    <tr>
  <td colspan="2">&nbsp;</td> <!-- Dòng trống -->
</tr>
  <td colspan="2">
    <label>
      <div align="center">
        <button name="btnok" type="submit" id="btnok" class="blinking" style="font-size: 18px;">Thêm</button> 
        &nbsp;
        <button name="btnreset" type="reset" id="btnreset" class="blinking" style="font-size: 18px;">Làm lại</button>
      </div>
    </label>
  </td>
</tr>

  </table>
</form>
</center>
</body>
</html>
