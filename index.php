<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Fresh Scent  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20100309

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Quản lý hồ sơ cán bộ</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style>
    #header {
    position: relative;
    height: 300px; /* Định sẵn chiều cao cho phần tiêu đề */
}

.header-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%; /* Đảm bảo hình ảnh lấp đầy phần tiêu đề */
    height: 100%; /* Đảm bảo hình ảnh lấp đầy phần tiêu đề */
    object-fit: cover; /* Dãn hình ảnh sao cho lấp đầy và không bị biến dạng */
    z-index: -1; /* Đưa hình ảnh xuống phía dưới */
}


#header h2 {
    position: absolute; /* Đặt vị trí tuyệt đối để nằm trên hình ảnh */
    top: 50px; /* Điều chỉnh vị trí dọc */
    left: 50%; /* Đặt vị trí ngang ở giữa */
    transform: translateX(-50%); /* Dịch chuyển vị trí ngang đi 50% chiều rộng của chính nó */
    z-index: 1; /* Đưa văn bản lên trên hình ảnh */
    color: white;
    text-align: center;
    cursor: pointer; /* Biến đổi con trỏ thành hình cửa sổ có thể chỉnh kích thước */
}

@keyframes changeColor {
    0% { color: blue; }
    25% { color: green; }
    50% { color: red; }
    75% { color: yellow; }
    100% { color: purple; }
}

@keyframes glow {
    0% { text-shadow: 0 0 10px blue; }
    25% { text-shadow: 0 0 20px green; }
    50% { text-shadow: 0 0 30px red; }
    75% { text-shadow: 0 0 40px yellow; }
    100% { text-shadow: 0 0 50px purple; }
}


#highlight-text {
    font-size: 36px;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    text-align: center;
    display: block;
    animation: glow 1s infinite; /* Hiệu ứng hào quang phát sáng từ đầu và lặp vô hạn */
}

#highlight-text:hover {
    color: #ff00ff; /* Màu chữ khi di chuột vào */
    animation: glow 1s infinite; /* Hiệu ứng hào quang phát sáng khi di chuột vào */
}




</style>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <!-- Hình ảnh tiêu đề -->
        <img src="hinh1.jpg" alt="Header Image" class="header-image">
        <br />
        <h3 id="highlight-text">PHÒNG NỘI VỤ HUYỆN LONG PHÚ</h3>

    </div>
</div>

		<div id="search">	

		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
    <ul>
        <li class="current_page_item"><a href="index.php">Trang chủ</a></li>
        <li><a href="gioithieu.php">Giới thiệu</a></li>
    
        <li class="dropdown">
    <a href="#" class="dropbtn">Cấp độ &#9660;</a> <!-- Sử dụng ký hiệu Unicode cho mũi tên mũi tên xuống -->
    <div class="dropdown-content" id="capdo-dropdown-content">
        <a href="huyenlongphu.php">Cấp huyện</a>
        <a href="xathitran.php">Cấp xã</a>
        <div class="sub-menu" id="cap-xa"></div>        
    </div>
    
    
</li>
<li class="right-menu-item"><a href="tintuc.php">Tin tức</a></li>
<li class="right-menu-item"><a href="dangky.php">Đăng ký</a></li>


            
        </li>
    </ul>
</div>



	<!--<div id="splash">&nbsp;</div> end #menu -->
    
    
    
    
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
			<div class="post">
				<h2 class="title" id="colorful-text">Hội đồng nhân dân huyện Long Phú</h2>

			  <p class="meta">&nbsp;</p>
<div class="entry">
					

			  </div>
			</div>
			<div class="post">
				<h2 class="title">&nbsp;</h2>
			</div>
			<div class="post">
			  <div class="entry"> </div>
			</div>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
                	<p align="top" ><?php include("phanquyen.php");?></p>
			  </li>
				<li>
				  <ul>
				    <a href="index.php">Trang chủ</a>
				    <li><a href="#"></a></li>
						<li><a href="gioithieu.php">Gi ới thiệu</a></li>
                        
						<li><a href="tintuc.php">Tin tức</a></li>
			  
              <li><a href="dangky.php">Đăng ký</a></li></ul>
			  </li></ul>
				<li> </li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>&nbsp;</p>
	</div>
	<!-- end #footer -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Mảng chứa đường dẫn của 5 hình ảnh
    var images = ['hinh1.jpg', 'hinh2.jpg', 'hinh3.jpg', 'hinh4.jpg', 'hinh5.jpg'];
    var currentIndex = 0;

    // Hàm thay đổi hình ảnh
    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length; // Lặp lại index của hình ảnh nếu đã đến hình ảnh cuối cùng
        var headerImage = document.querySelector('.header-image');
        headerImage.src = images[currentIndex]; // Thay đổi đường dẫn hình ảnh

        // Kiểm tra nếu đã đến hình ảnh cuối cùng
        if (currentIndex === images.length - 1) {
            setTimeout(function() {
                currentIndex = 0; // Reset currentIndex về 0 để quay lại hình đầu tiên sau 1 giây
                headerImage.src = images[currentIndex]; // Thay đổi đường dẫn hình ảnh về hình đầu tiên
            }, 5000); // Kích thước thời gian chờ trước khi quay lại hình đầu tiên (5000ms = 5 giây)
        }
    }

    // Thực hiện thay đổi hình ảnh mỗi 5 giây
    setInterval(changeImage, 5000);

    // Hàm tạo hiệu ứng hóa thân phong cách
    function addTransformationEffect() {
        var headerImage = document.querySelector('.header-image');

        // Tạo một hiệu ứng hóa thân ngẫu nhiên
        function applyTransformationEffect() {
            var randomRotate = Math.random() * 20 - 10; // Góc xoay ngẫu nhiên từ -10 đến 10 độ
            var randomScale = Math.random() * 0.2 + 0.9; // Tỉ lệ phóng to hoặc thu nhỏ ngẫu nhiên từ 0.9 đến 1.1
            var randomTranslateX = (Math.random() - 0.5) * 50; // Dịch chuyển ngẫu nhiên theo trục X từ -25 đến 25 pixel
            var randomTranslateY = (Math.random() - 0.5) * 50; // Dịch chuyển ngẫu nhiên theo trục Y từ -25 đến 25 pixel
            headerImage.style.transition = 'transform 0.5s ease-in-out'; // Áp dụng hiệu ứng chuyển đổi với độ trễ 0.5 giây
            headerImage.style.transform = 'rotate(' + randomRotate + 'deg) scale(' + randomScale + ') translate(' + randomTranslateX + 'px, ' + randomTranslateY + 'px)'; // Áp dụng các biến đổi
        }

        // Gọi hàm tạo hiệu ứng hóa thân sau mỗi lần thay đổi hình ảnh
        setInterval(applyTransformationEffect, 5000);
    }

    // Gọi hàm khi tài liệu HTML được tải hoàn tất
    document.addEventListener('DOMContentLoaded', addTransformationEffect);
});


</script>


</body>
</html>
