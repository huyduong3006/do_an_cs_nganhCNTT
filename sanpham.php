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

    <title>MINHHUY SHOP</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link Bootstrap Icons -->
    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Link CSS chính -->
    <link rel="stylesheet" href="css/sp.css">
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
                    <span>MinhHuy Shop</span>
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
                        <!-- Thanh tìm kiếm -->
                        <li class="nav-item">
                            <form class="d-flex ms-3">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Nút Download -->
                <div class="d-none d-lg-block ms-3">
                    <a href="#" class="btn custom-btn btn-naira btn-inverted">
                        <i class="btn-icon bi-cloud-download"></i>
                        <span>Download</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container my-5">
            <h2 class="mb-4 text-center">Iphone</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php
                try {
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $myDB = 'dienthoai';
                    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->query('SET NAMES "utf8"');

                    // Lấy 4 sản phẩm ngẫu nhiên cho Iphone  
                    $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, MoTaChiTiet, HinhAnh, MaTL   
                                   FROM HangHoa   
                                   WHERE MaTL = 1   
                                   ORDER BY RAND()";
                    $stmt = $conn->query($chuoi_sql);

                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {
                ?>
                            <div class="col">
                                <div class="card h-100 text-center shadow-sm">
                                    <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($row["HinhAnh"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["TenHang"]); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="chitiet.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="text-decoration-none text-dark">
                                                <?php echo htmlspecialchars($row["TenHang"]); ?>
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted">Giá: <?php echo number_format($row["DonGia"], 0, ',', '.'); ?> VND</p>
                                        <a href="chitiet.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } else {
                        echo '<p class="text-center">Không có sản phẩm nào.</p>';
                    }
                    $conn = null;
                } catch (PDOException $e) {
                    echo '<p class="text-center text-danger">Kết nối thất bại: ' . htmlspecialchars($e->getMessage()) . '</p>';
                }
                ?>
            </div>
        </div>

        <div class="container my-5">
            <h2 class="mb-4 text-center">Macbook</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php
                try {
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $myDB = 'dienthoai';
                    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->query('SET NAMES "utf8"');

                    // Lấy 4 sản phẩm ngẫu nhiên cho Macbook  
                    $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, MoTaChiTiet, HinhAnh, MaTL   
                                   FROM HangHoa   
                                   WHERE MaTL = 2   
                                   ORDER BY RAND()";
                    $stmt = $conn->query($chuoi_sql);

                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {
                ?>
                            <div class="col">
                                <div class="card h-100 text-center shadow-sm" href="">
                                    <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($row["HinhAnh"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["TenHang"]); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="chitiet.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="text-decoration-none text-dark">
                                                <?php echo htmlspecialchars($row["TenHang"]); ?>
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted">Giá: <?php echo number_format($row["DonGia"], 0, ',', '.'); ?> VND</p>
                                        <a href="chitiet.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="btn btn-primary">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } else {
                        echo '<p class="text-center">Không có sản phẩm nào.</p>';
                    }
                    $conn = null;
                } catch (PDOException $e) {
                    echo '<p class="text-center text-danger">Kết nối thất bại: ' . htmlspecialchars($e->getMessage()) . '</p>';
                }
                ?>
            </div>
        </div>

        <section class="contact-section section-padding" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-12 mx-auto">
                        <form class="custom-form ebook-download-form bg-white shadow" action="#" method="post" role="form">
                            <div class="text-center mb-5">
                                <h2 class="mb-1">Get your free ebook</h2>
                            </div>

                            <div class="ebook-download-form-body">
                                <div class="input-group mb-4">
                                    <input type="text" name="ebook-form-name" id="ebook-form-name" class="form-control" aria-label="ebook-form-name" aria-describedby="basic-addon1" placeholder="Your Name" required>
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="custom-form-icon bi-person"></i>
                                    </span>
                                </div>

                                <div class="input-group mb-4">
                                    <input type="email" name="ebook-email" id="ebook-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@company.com" aria-label="ebook-form-email" aria-describedby="basic-addon2" required="">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="custom-form-icon bi-envelope"></i>
                                    </span>
                                </div>

                                <div class="col-lg-8 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control">Download ebook</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-12">
                        <h6 class="mt-5">Say hi and talk to us</h6>

                        <h2 class="mb-4">Contact</h2>

                        <p class="mb-3">
                            <i class="bi-geo-alt me-2"></i>
                            London, United Kingdom
                        </p>

                        <p class="mb-2">
                            <a href="tel:010-020-0340" class="contact-link">
                                010-020-0340
                            </a>
                        </p>

                        <p>
                            <a href="mailto:info@company.com" class="contact-link">
                                info@company.com
                            </a>
                        </p>

                        <h6 class="site-footer-title mt-5 mb-3">Social</h6>

                        <ul class="social-icon mb-4">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp"></a>   
                            </li>
                        </ul>

                        <p class="copyright-text">Copyright © 2048 ebook company
                            <br><br><a rel="nofollow" href="https://templatemo.com" target="_blank">designed by templatemo</a>
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>
</body>

</html>