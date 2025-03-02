<?php
session_start();

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dienthoai";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST["add"])) {
    $item_MaHang = $_POST['MaHang']; // MaHang sản phẩm từ biểu mẫu
    $item_quantity = $_POST['quantity']; // Số lượng sản phẩm

    // Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
    $query = "SELECT `MaHang`, `TenHang`, `DonGia`, `MoTa`, `MoTaChiTiet`, `MaTL`, `HinhAnh` FROM `hanghoa` WHERE MaHang = '$item_MaHang'";
    $result = mysqli_query($conn, $query);

    // Kiểm tra nếu truy vấn thành công và có dữ liệu
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $item_name = $row['TenHang'];
        $item_price = $row['DonGia'];

        // Tạo một mảng cho sản phẩm mới
        $item_array = array(
            'MaHang' => $item_MaHang,
            'tenhang' => $item_name,
            'dongia' => $item_price,
            'quantity' => $item_quantity
        );

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION["cart"][$item_MaHang])) {
            $_SESSION["cart"][$item_MaHang]['quantity'] += $item_quantity; // Tăng số lượng
        } else {
            $_SESSION['cart'][$item_MaHang] = $item_array; // Thêm mới
        }
    } else {
        echo "Không tìm thấy sản phẩm với MaHang: $item_MaHang.";
    }
}

// Xóa sản phẩm hoặc xóa tất cả sản phẩm trong giỏ hàng
if (isset($_GET['action'])) {
    if ($_GET['action'] == "clearall") {
        unset($_SESSION['cart']);
    } elseif ($_GET['action'] == 'remove' && isset($_GET['MaHang'])) {
        unset($_SESSION['cart'][$_GET['MaHang']]);
    }
}
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MINHHUY SHOP - Cửa hàng trực tuyến với thiết kế sang trọng, hiện đại.">
    <meta name="author" content="MINHHUY SHOP Team">
    <meta name="keywords" content="shop, mua sắm, sản phẩm, thời trang, công nghệ">

    <title>MinhHuy Shop</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link Bootstrap Icons -->
    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Link CSS chính -->
    <link rel="stylesheet" href="css/giohang.css">
    <link rel="stylesheet" href="css/templatemo-ebook-landing.css">

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <i class="navbar-brand-icon bi-book me-2"></i>
                    <span>MinhHuy Shop</span>
                </a>

                <!-- Nút toggler (cho mobile) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu chính -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link click-scroll" href="index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="gioithieu.php">Giới thiệu</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="sanpham.php">Sản phẩm</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="#section_5">Liên hệ</a></li>
                        <!-- Thanh tìm kiếm -->
                        <li class="nav-item">
                            <form class="d-flex ms-3">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hiển thị sản phẩm trong giỏ hàng -->
        <div class="container mt-5">
            <h3 class="text-center">Sản Phẩm Trong Giỏ</h3>
            <form method="post" action="thanhtoan.php">
                <?php
                $total = 0;
                if (!empty($_SESSION['cart'])) {
                    echo "<div class='card shadow-lg'>
                <div class='card-body'>
                    <table class='table table-bordered table-striped'>
                        <tr>
                            <th>Chọn</th>
                            <th>MaHang</th>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                            <th>Hành Động</th>
                        </tr>";
                    foreach ($_SESSION['cart'] as $item) {
                        echo "<tr>
                    <td><input type='checkbox' name='selected_items[]' value='{$item['MaHang']}'></td>
                    <td>{$item['MaHang']}</td>
                    <td>{$item['tenhang']}</td>
                    <td>" . number_format($item['dongia'], 2) . " VND</td>
                    <td>{$item['quantity']}</td>
                    <td>" . number_format($item['dongia'] * $item['quantity'], 2) . " VND</td>
                    <td><a href='giohang.php?action=remove&MaHang={$item['MaHang']}' class='btn btn-danger'>Xóa</a></td>
                </tr>";
                        $total += $item['quantity'] * $item['dongia'];
                    }

                    echo "<tr>
                <td colspan='5' class='text-end'><b>Tổng Giá</b></td>
                <td colspan='2'>" . number_format($total, 2) . " VND</td>
            </tr>";
                    echo "</table>
                <button type='submit' class='btn btn-primary'>Thanh toán</button>
            </div>
        </div>";
                } else {
                    echo "<p class='text-center'>Giỏ hàng trống!</p>";
                }
                ?>
            </form>

        </div>
    </main>

</body>

</html>