<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="link_effects.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Button Effect</title>
<style>
    #btndn {
        background-color: #4CAF50; /* Màu nền mặc định */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        transition-duration: 0.4s; /* Thời gian chuyển đổi */
    }

    #btndn:hover {
        background-color: #45a049; /* Màu nền khi đưa chuột vào */
        color: white;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); /* Hiệu ứng đổ bóng */
    }
	
	/* Định nghĩa hiệu ứng khi di chuột vào liên kết */
a:hover {
    color: blue; /* Đổi màu chữ khi di chuột vào */
    font-size: 110%; /* Kích thước chữ lớn hơn khi di chuột vào */
    text-decoration: underline; /* Gạch chân liên kết */
    animation: sparkle 0.5s ease-in-out; /* Hiệu ứng hào quang phát sáng */
}

/* Định nghĩa hiệu ứng hào quang phát sáng */
@keyframes sparkle {
    0% { color: blue; } /* Màu ban đầu */
    50% { color: red; } /* Màu thứ hai */
    100% { color: blue; } /* Màu ban đầu */
}

</style>
</head>
<body>
<script language="javascript" src="kiemtradl.js"></script>

<?php
// Kiểm tra xem phiên đã được khởi tạo hay chưa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hàm kiểm tra xem đã đăng nhập hay chưa
function isLoggedIn() {
    return isset($_SESSION["s_user"]);
}

// Hàm kiểm tra quyền hạn của người dùng
function isAdmin() {
    return isset($_SESSION["s_phanquyen"]) && ($_SESSION["s_phanquyen"] == "1");
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa và hiển thị nội dung tương ứng
if (isLoggedIn()) {
    if (isAdmin()) {
        // Hiển thị thông tin người dùng và liên kết đăng xuất cho admin
        echo '<table width="100%" border="0">';    
        echo '<tr>';
        echo '<td colspan="2"><div align="right">'.$_SESSION["s_user"].' đang đăng nhập </div></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2">&nbsp;</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2"><div align="right"><a href="tv_edit.php?username='.$_SESSION["s_user"].'"> Thay đổi thông tin cá nhân</a> &nbsp;|<a href="thoat.php">Thoát</a></div></td>';
        echo '</tr>';
        echo '</table>';
    } else {
        // Hiển thị thông tin người dùng và liên kết đăng xuất cho người dùng không phải admin
        echo '<table width="100%" border="0">';    
        echo '<tr>';
        echo '<td><div align="right"> '.$_SESSION["s_user"].' đang đăng nhập </div></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td><div align="right"><a href="tv_edit.php?username='.$_SESSION["s_user"].'"> Thay đổi thông tin cá nhân</a> &nbsp;|<a href="thoat.php">Thoát</a></div></td>';
        echo '</tr>';
        echo '</table>';
    }
} else {
    // Hiển thị form đăng nhập cho người dùng chưa đăng nhập
    echo '<form id="form1" name="form1" method="post" action="process_ktralogin.php?goto=" onSubmit="return kiemtradl();"  >';
    echo '<table width="100%" border="0">';
    echo '<tr>';
    echo '<td width="3%" colspan="5"><div align="right">Mời bạn nhập tài khoản và mật khẩu để đăng nhập</div></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td width="3%">&nbsp;</td>';
    echo '<td width="3%">&nbsp;</td>';
    echo '<td width="68%">&nbsp;</td>';
    echo '<td width="12%">Username:</td>';
    echo '<td width="14%"><label>
        <input name="txtuser" type="text" id="txtuser" size="20" maxlength="20" />
    </label></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>Password</td>';
    echo '<td><label>
        <input name="txtpass" type="password" id="txtpass" size="20" maxlength="20" />
    </label></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td colspan="2"><label>
        <center> <input name="btndn" type="submit" id="btndn" value="   Đăng nhập   " /></center>
    </label></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td>&nbsp;</td>';
    echo '<td colspan="2"><label>
        <center> <a href="dangky.php">Đăng ký</a> | <a href="quenmatkhau.php">Quên mật khẩu</a></center>
    </label></td>';
    echo '</tr>';
    echo '</table>';
    echo '</form>';
	echo '<td>';
	
echo '<td colspan="5">';
echo '<center><button type="button" id="togglePassword">Hiện/Ẩn mật khẩu</button></center>';
echo '</td>';


echo '<script>';
echo 'document.getElementById("togglePassword").addEventListener("click", function() {';
echo '    var passwordField = document.getElementById("txtpass");';
echo '    var fieldType = passwordField.getAttribute("type");';
echo '    if (fieldType === "password") {';
echo '        passwordField.setAttribute("type", "text");';
echo '    } else {';
echo '        passwordField.setAttribute("type", "password");';
echo '    }';
echo '});';
echo '</script>';
	
}

?>
