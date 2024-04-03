<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Danh sách xã</title>
<style>
    .selected {
        background-color: lightblue;
    }
    #xa-list {
        overflow-y: scroll;
        height: 300px; /* Đặt chiều cao của danh sách */
    }
    #xa-list button {
        display: block; /* Hiển thị tất cả các nút xã ngay từ đầu */
        margin-bottom: 5px; /* Khoảng cách giữa các nút xã */
    }
    #search-container {
        margin-bottom: 20px; /* Khoảng cách giữa ô tìm kiếm và danh sách các xã */
    }
</style>
</head>
<body>
<a href="index.php"><h1>Trang chủ</h1></a>
    <h1>Danh sách các xã</h1>
    <div id="search-container">
        <input type="text" id="search" placeholder="Nhập từ khóa tìm kiếm...">
        <button id="search-btn">Tìm kiếm</button>
    </div>
    <div id="xa-list">
        <button onclick="window.location.href = 'tv_danhmuc.php'">Thị trấn Long Phú</button>

        <button onclick="selectXa(2)">Xã Long Phú</button>
        <button onclick="selectXa(3)">Xã Tân Hưng</button>
        <button onclick="selectXa(4)">Xã Tân Thạnh</button>
        <button onclick="selectXa(5)">Xã Châu Khánh</button>
        <button onclick="selectXa(6)">Xã Phú Hữu</button>
        <button onclick="selectXa(7)">Xã Long Đức</button>
        <button onclick="selectXa(8)">Xã Song Phụng</button>
        <button onclick="selectXa(9)">Thị trấn Đại Ngãi</button>
        <button onclick="selectXa(10)">Xã Hậu Thạnh</button>
        <button onclick="selectXa(11)">Xã Trường Khánh</button>
    </div>

    <script>
        // Hàm chọn xã
        function selectXa(xaNumber) {
            var xas = document.getElementsByTagName('button');
            for (var i = 0; i < xas.length; i++) {
                xas[i].classList.remove('selected');
            }
            xas[xaNumber - 1].classList.add('selected');
        }

        // Lắng nghe sự kiện khi nhấn phím Enter trong ô tìm kiếm
        document.getElementById('search').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                search();
                event.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
            }
        });

        // Xử lý sự kiện khi thay đổi nội dung trong ô tìm kiếm
        document.getElementById('search').addEventListener('input', function() {
            search();
        });

        // Hiện ô tìm kiếm khi bắt đầu nhập
        document.getElementById('search').addEventListener('input', function() {
            document.getElementById('search-btn').style.display = 'block';
        });

        // Ẩn thông tin xã ban đầu
        document.getElementById('xa-list').style.display = 'none';

        // Xử lý sự kiện khi nhấn nút tìm kiếm
        document.getElementById('search-btn').addEventListener('click', function() {
            document.getElementById('xa-list').style.display = 'block';
        });

        // Hàm tìm kiếm
        function search() {
            var keyword = document.getElementById('search').value.toLowerCase();
            var xas = document.getElementsByTagName('button');
            var found = false; // Biến để kiểm tra có kết quả tìm kiếm hay không
            for (var i = 0; i < xas.length; i++) {
                if (xas[i].innerText.toLowerCase().includes(keyword)) {
                    xas[i].style.display = 'block';
                    found = true;
                } else {
                    xas[i].style.display = 'none';
                }
            }
            // Ẩn hoặc hiện ô tìm kiếm dựa trên kết quả tìm kiếm
            document.getElementById('search-btn').style.display = found ? 'block' : 'none';
        }
    </script>
</body>
</html>
