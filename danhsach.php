<?php 
include("ketnoi.inc");

// Truy vấn danh sách cán bộ từ database
$str = "SELECT distinct MaNV,Hoten,Ngaysinh,Noisinh,Nguyenquan,Quoctich,Dantoc,Tongiao,Tinhtranghonnhan,Tinhtrangsuckhoe,Anh FROM Thongtinnhanvien";
$kq = mysql_query($str,$link);
$num_row = mysql_num_rows($kq);

// Tạo nội dung cần in
$content = "Danh sách cán bộ:\n";
$content .= "Mã NV\tHọ tên\tNgày sinh\tNơi sinh\tNguyên quán\tQuốc tịch\tDân tộc\tTôn giáo\tTình trạng hôn nhân\tTình trạng sức khỏe\n";

while($row = mysql_fetch_array($kq)) {
    $content .= $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\t" . $row[3] . "\t" . $row[4] . "\t" . $row[5] . "\t" . $row[6] . "\t" . $row[7] . "\t" . $row[8] . "\t" . $row[9] . "\n";
}

// Ghi nội dung vào file
$filename = "danh_sach_can_bo.txt";
$file = fopen($filename, "w") or die("Không thể mở file!");
fwrite($file, $content);
fclose($file);

echo "Danh sách cán bộ đã được in ra file $filename";
?>
