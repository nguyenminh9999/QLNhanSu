<script language="javascript" src="kiemtradl.js">
</script>
<?php
session_start();

// Hàm kiểm tra xem đã đăng nhập hay chưa
function isLoggedIn() {
    return isset($_SESSION["s_user"]);
}

// Hàm kiểm tra quyền hạn của người dùng
function isAdmin() {
    return isset($_SESSION["s_phanquyenhuyen"]) && ($_SESSION["s_phanquyenhuyen"] == "1");
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
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
    echo '<td width="3%" colspan="5"><div align="right">Bạn đang là khách! Hãy đăng nhập.</div></td>';
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
}
?>


