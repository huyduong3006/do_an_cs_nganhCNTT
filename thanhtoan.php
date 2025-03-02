<?php
session_start();

// Kiểm tra nếu giỏ hàng không trống và có sản phẩm trong giỏ
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo 'Giỏ hàng của bạn hiện tại không có sản phẩm nào. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.';
    exit;
}

// Nếu có sản phẩm trong giỏ hàng, tiếp tục xử lý thanh toán
$totalPrice = 0;

// Kết nối cơ sở dữ liệu và lấy thông tin sản phẩm từ giỏ hàng
try {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $myDB = 'dienthoai';
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query('SET NAMES "utf8"');
} catch (PDOException $e) {
    echo 'Kết nối thất bại: ' . $e->getMessage();
    exit;
}
?>

<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MINHHUY SHOP - Cửa hàng trực tuyến với thiết kế sang trọng, hiện đại.">
    <meta name="author" content="MINHHUY SHOP Team">
    <meta name="keywords" content="shop, mua sắm, sản phẩm, thời trang, công nghệ">

    <title>MinhHuy Shop - Thanh toán</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link Bootstrap Icons -->
    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Link CSS chính -->
    <link rel="stylesheet" href="css/thanhtoan.css">
    <link rel="stylesheet" href="css/templatemo-ebook-landing.css">

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <i class="navbar-brand-icon bi-book me-2"></i>
                    <span>MINHHUY SHOP</span>
                </a>

                <!-- Nút toggler (cho mobile) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu chính -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="gioithieu.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($dstl as $item): ?>
                                    <li><a class="dropdown-item" href="sanpham.php?the_loai=<?php echo $item->MaTL ?>"><?php echo $item->TenTL ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <h3 class="text-center mb-4">Thông Tin Thanh Toán</h3>
            <div class="row">
                <div class="col-md-6">
                    <h5>Thông tin sản phẩm</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Hiển thị thông tin cho các sản phẩm trong giỏ hàng
                            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                foreach ($_SESSION['cart'] as $mahang => $item) {
                                    $chuoi_Sql = "SELECT `MaHang`, `TenHang`, `DonGia`, `MoTa`, `MaTL`, `HinhAnh` FROM `hanghoa` WHERE `MaHang` = :ma_hang";
                                    $cursor = $conn->prepare($chuoi_Sql);
                                    $cursor->bindParam(':ma_hang', $mahang, PDO::PARAM_INT);
                                    $cursor->execute();
                                    $product = $cursor->fetch(PDO::FETCH_OBJ);
                                    $totalPrice += $product->DonGia * $item['quantity']; // Tính tổng tiền
                                    echo "<tr>
                                        <td>{$product->TenHang}</td>
                                        <td>" . number_format($product->DonGia, 0, ',', '.') . " VND</td>
                                        <td>{$item['quantity']}</td>
                                        <td>" . number_format($product->DonGia * $item['quantity'], 0, ',', '.') . " VND</td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <h5>Thông tin thanh toán</h5>
                    <form method="post" action="xuly_thanhtoan.php">
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                            <select class="form-select" id="payment_method" name="payment_method" required>
                                <option value="cash">Thanh toán khi nhận hàng</option>
                                <option value="bank">Chuyển khoản ngân hàng</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="shipping_method" class="form-label">Phương thức giao hàng</label>
                            <select class="form-select" id="shipping_method" name="shipping_method" required>
                                <option value="economy">Giao hàng tiết kiệm (15,000 VND)</option>
                                <option value="standard">Giao hàng nhanh (30,000 VND)</option>
                                <option value="fast">Giao hỏa tốc (50,000 VND)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="final_total" class="form-label">Số tiền cần thanh toán</label>
                            <input type="text" class="form-control" id="final_total" name="final_total"
                                value="<?php echo number_format($totalPrice, 0, ',', '.'); ?> VNĐ" readonly>
                        </div>

                        <!-- Thêm thông tin sản phẩm vào dưới dạng hidden -->
                        <?php
                        foreach ($_SESSION['cart'] as $mahang => $item) {
                            echo '<input type="hidden" name="MaHang[]" value="' . $mahang . '">';
                            echo '<input type="hidden" name="quantity[]" value="' . $item['quantity'] . '">';
                        }
                        ?>

                        <button type="submit" name="payment" class="btn btn-success w-100">Xác nhận thanh toán</button>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>