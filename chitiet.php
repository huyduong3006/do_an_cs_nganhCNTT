<?php
// Lấy danh sách hàng hóa và thể loại
include_once('Models/M_Hang_Hoa.php');
include_once('Models/M_The_Loai.php');
$m_hang_hoa = new M_hang_hoa();
$dshh = $m_hang_hoa->ds_hang_hoa();
$m_the_loai = new M_the_loai();
$dstl = $m_the_loai->ds_the_loai();

$result = null;
if (isset($_GET['MaHang'])) {
    $ma_hang = $_GET['MaHang'];
    try {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $myDB = 'dienthoai';
        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query('SET NAMES "utf8"');

        // Lấy thông tin sản phẩm từ MaHang
        $chuoi_Sql = "SELECT `MaHang`, `TenHang`, `DonGia`, `MoTa`, `MaTL`, `HinhAnh`, `MoTaChiTiet` FROM `hanghoa` WHERE `MaHang` = :ma_hang";
        $cursor = $conn->prepare($chuoi_Sql);
        $cursor->bindParam(':ma_hang', $ma_hang, PDO::PARAM_INT);
        $cursor->execute();
        $result = $cursor->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MINHHUY SHOP - Cửa hàng trực tuyến với thiết kế sang trọng, hiện đại.">
    <meta name="author" content="MINHHUY SHOP Team">
    <meta name="keywords" content="shop, mua sắm, sản phẩm, thời trang, công nghệ">

    <title>MinhHuy Shop - Chi tiết sản phẩm</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link Bootstrap Icons -->
    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Link CSS chính -->
    <link rel="stylesheet" href="css/chitiet.css">
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
                            <a class="nav-link click-scroll <?php echo ($currentPage == 'index') ? 'active' : ''; ?>" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll <?php echo ($currentPage == 'gioithieu') ? 'active' : ''; ?>" href="gioithieu.php">Giới thiệu</a>
                        </li>

                        <!-- Dropdown menu for Sản phẩm -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- Loop through the categories from the database -->
                                <?php foreach ($dstl as $item): ?>
                                    <li>
                                        <a class="dropdown-item" href="sanpham.php?the_loai=<?php echo $item->MaTL; ?>"
                                            <?php echo (isset($_GET['the_loai']) && $_GET['the_loai'] == $item->MaTL) ? 'class="active"' : ''; ?>>
                                            <?php echo $item->TenTL; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll <?php echo ($currentPage == 'contact') ? 'active' : ''; ?>" href="#section_5">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <?php
                // Kết nối tới cơ sở dữ liệu  
                try {
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $myDB = 'dienthoai';
                    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->query('SET NAMES "utf8"');

                    // Lấy thông tin sản phẩm từ MaHang  
                    if (isset($_GET['MaHang'])) {
                        $MaHang = htmlspecialchars($_GET['MaHang']);
                        $stmt = $conn->prepare("SELECT * FROM HangHoa WHERE MaHang = :MaHang");
                        $stmt->bindParam(':MaHang', $MaHang);
                        $stmt->execute();

                        // Lấy kết quả  
                        $result = $stmt->fetch(PDO::FETCH_OBJ);
                    }
                } catch (PDOException $e) {
                    echo '<p class="text-danger">Kết nối thất bại: ' . htmlspecialchars($e->getMessage()) . '</p>';
                }

                if (isset($result)): ?>
                    <div class="col-md-9">
                        <div class="container mt-4 custom-gap">
                            <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($result->HinhAnh); ?>"
                                class="img-fluid" alt="<?php echo htmlspecialchars($result->TenHang); ?>">
                            <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($result->HinhAnh); ?>"
                                class="img-fluid" alt="<?php echo htmlspecialchars($result->TenHang); ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="container mt-4">
                            <h3 class="card-title"><?php echo htmlspecialchars($result->TenHang); ?></h3>
                            <p class="card-text"><strong>Giá:</strong> <?php echo number_format($result->DonGia, 0, ',', '.'); ?> VNĐ</p>
                            <p class="card-text"><strong>Mô tả:</strong> <?php echo htmlspecialchars($result->MoTa); ?></p>
                            <p class="card-text"><strong>Mô tả chi tiết:</strong><br>
                                <?php
                                $lines = explode("\n", $result->MoTaChiTiet);

                                foreach ($lines as $line) {
                                    echo "• " . htmlspecialchars($line) . "<br>";
                                }
                                ?>
                            </p>


                            <form action="giohang.php" method="post">
                                <div class="card-text mb-3">
                                    <strong>Số lượng: </strong>
                                    <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 70px; text-align: center;">
                                    <input type="hidden" name="MaHang" value="<?php echo htmlspecialchars($result->MaHang); ?>">
                                </div>
                                <div class="b-product_actions-inner">
                                    <!-- Nút Mua Ngay -->
                                    <button class="b-button b-button--buy-now w-100" type="button" onclick="muaNgay(event)">
                                        <svg class="b-button-icon" width="19" height="19" viewBox="0 0 19 19" focusable="false"></svg>
                                        <span data-ref="container">MUA NGAY</span>
                                    </button>

                                    <!-- Nút Thêm Vào Giỏ -->
                                    <button class="b-button b-button--add-to-cart w-100" type="submit" name="add">
                                        <svg class="b-button-icon" width="19" height="19" viewBox="0 0 19 19" focusable="false"></svg>
                                        <span data-ref="container">THÊM VÀO GIỎ</span>
                                    </button>
                                </div>
                            </form>


                            <script>
                                // Hàm xử lý cho nút Mua Ngay
                                function muaNgay(event) {
                                    event.preventDefault(); // Ngừng hành động gửi form mặc định

                                    const quantity = document.querySelector('input[name="quantity"]').value;
                                    const MaHang = document.querySelector('input[name="MaHang"]').value;

                                    console.log("Số lượng:", quantity);
                                    console.log("Mã hàng:", MaHang);

                                    // Kiểm tra điều kiện
                                    if (quantity > 0 && MaHang) {
                                        // Chuyển hướng với tham số quantity và MaHang trong URL
                                        const url = `thanhtoan.php?quantity=${encodeURIComponent(quantity)}&MaHang=${encodeURIComponent(MaHang)}`;
                                        console.log("Chuyển hướng tới URL: ", url);
                                        window.location.href = url; // Chuyển hướng tới trang thanh toán
                                    } else {
                                        alert("Vui lòng nhập số lượng hợp lệ.");
                                    }
                                }
                            </script>



                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-danger">Sản phẩm không tồn tại.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

</html>