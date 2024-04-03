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
      <td colspan="8"></td>
    </tr>
    <tr>
      <td width="20%"><a href="index.php"><h4>Quay lại trang chủ</h4></a></td>
      <td width="2%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="10%">&nbsp;</td>
      <td width="28%"><?php include("phanquyen.php");?></td>
    </tr>
    <tr>
      <td colspan="8"> </td>
    </tr>
</table>
<div>
  <h1>Thêm mới cán bộ</h1></div>
<form id="form1" name="form1" method="post" action="sp_process_addhuyen.php">
  <table width="36%" border="0">
    <tr>
      <td width="42%"><div align="left">Mã nhân viên</div></td>
      <td width="58%"><label>
        <div align="left">
          <input name="txtmanv" type="text" id="txtmanv" size="10" maxlength="10" />
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
      <td colspan="2"><label>
        <div align="center">
          <input name="btnok" type="submit" id="btnok" value="   Thêm   " /> 
          &nbsp;
            <input name="btnreset" type="reset" id="btnreset" value="Làm lại" />
          </label>
        </div></td>
      </tr>
  </table>
</form>
</center>
</body>
</html>
