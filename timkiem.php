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
    <link rel="stylesheet" href="css/timkiem.css">
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
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="sanpham.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Liên hệ</a>
                        </li>
                        <!-- Thanh tìm kiếm -->
                        <li class="nav-item">
                            <form class="d-flex ms-3" method="GET" action="">
                                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search" value="<?php echo htmlspecialchars($searchTerm ?? ''); ?>">
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

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $myDB = 'dienthoai';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $conn->query('SET NAMES "utf8"');

                        // Lấy từ khóa tìm kiếm từ form
                        $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

                        if ($searchTerm) {
                            // Truy vấn tìm kiếm
                            // Truy vấn tìm kiếm, không phân biệt chữ hoa chữ thường
                            $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, HinhAnh FROM HangHoa WHERE LOWER(TenHang) LIKE LOWER(:searchTerm) LIMIT 5";
                            $stmt = $conn->prepare($chuoi_sql);
                            $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
                            $stmt->execute();


                            // Hiển thị thông báo
                            if ($stmt->rowCount() > 0) {
                                echo '<h4 class="mb-4">Sản phẩm tìm thấy cho từ khóa: <strong>' . htmlspecialchars($searchTerm) . '</strong></h4>';
                                foreach ($stmt as $row) {
                    ?>
                                    <div class="col-md-4 mb-4"> <!-- Responsive column -->
                                        <div class="card">
                                            <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($row['HinhAnh']); ?>" alt="<?php echo htmlspecialchars($row['TenHang']); ?>" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="product_detail.php?id=<?php echo htmlspecialchars($row['MaHang']); ?>" class="text-decoration-none text-warning"><?php echo htmlspecialchars($row['TenHang']); ?></a>
                                                </h5>
                                                <p class="card-text">Giá: <?php echo number_format($row['DonGia'], 0, ',', '.'); ?> VND</p>
                                                <a href="chitiet.php?MaHang=<?php echo htmlspecialchars($row['MaHang']); ?>" class="btn btn-primary">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                                }
                            } else {
                                echo '<h2>Không tìm thấy sản phẩm nào cho từ khóa: <strong>' . htmlspecialchars($searchTerm) . '</strong></h2>';
                            }
                        } else {
                            echo '<h2>Không có từ khóa tìm kiếm</h2>';
                        }

                        $conn = null;
                    } catch (PDOException $e) {
                        echo 'Kết nối thất bại: ' . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </main>
</body>

</html>