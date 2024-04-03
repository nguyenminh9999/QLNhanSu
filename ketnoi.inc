<?php
// Mở kết nối tới MySQL
$link = mysql_connect("localhost", "root", "") or die(" kết nối không thành công");

// Kết nối tới csdl
mysql_query("SET NAMES 'utf8'", $link);
mysql_select_db("qlnhansu", $link);
?>
