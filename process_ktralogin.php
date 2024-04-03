<?php
// Kiểm tra sự tồn tại của password và user
$user = isset($_POST["txtuser"]) ? $_POST["txtuser"] : "";
$pass = isset($_POST["txtpass"]) ? $_POST["txtpass"] : "";

// Kết nối tới SQL
include("ketnoi.inc");

// Kiểm tra xem user có và password có trong cơ sở dữ liệu hay không
$ketqua = mysql_query("SELECT username, password FROM user WHERE ((username = '$user') AND (password = '$pass'))", $link);
$num = mysql_num_rows($ketqua);

// Lấy số dòng trả về
if ($num == 0) {
    ?>
    <script language="javascript">
        window.alert("Sai tên đăng nhập hoặc mật khẩu");
        window.location = "index.php";
    </script>
    <?php
} else {
    session_start();
    $s_user = $user;
    $ketqua_phanquyen = mysql_query("SELECT * FROM user WHERE username = '$user'", $link);
    $i = mysql_fetch_row($ketqua_phanquyen);
    $s_phanquyen = $i[3];
    $_SESSION['s_user'] = $s_user;
    $_SESSION['s_phanquyen'] = $s_phanquyen;
    header("location:index.php");
}
?>
