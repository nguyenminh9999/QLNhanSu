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
<form id="form1" name="form1" method="post" action="sp_process_add.php">
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
      <td><div align="left">Nơi sinh</div></td>
      <td><label>
        <div align="left">
          <input name="txtnoisinh" type="text" id="txtnoisinh" size="30" maxlength="100" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Nguyên quán</div></td>
      <td><div align="left">
        <input name="txtngquan" type="text" id="txtngquan" size="30" maxlength="100" />
      </div></td>
    </tr>
    <tr>
      <td><div align="left">Quốc tịch</div></td>
      <td><label>
        <div align="left">
          <input name="txtqtich" type="text" id="txtqtich" size="30" />
        </div>
      </label></td>
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
      <td><div align="left">Tình trạng hôn nhân</div></td>
      <td><label>
        <div align="left">
          <input name="txttthonnhan" type="text" id="txttthonnhan" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Tình trạng sức khỏe</div></td>
      <td><label>
        <div align="left">
          <input name="txtttsuckhoe" type="text" id="txtttsuckhoe" />
        </div>
      </label></td>
    </tr>
    <tr>
      <td><div align="left">Ảnh</div></td>
      <td><label>
        <div align="left">
          <input name="txtanh" type="text" id="txtanh" />
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
