<?php
session_start(); // Khởi tạo session để lưu thông báo

$error_message = '';
$success_message = '';

// Kiểm tra xem có yêu cầu đăng ký không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Lấy dữ liệu từ form
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $diachi = $_POST['diachi'];

    // Kết nối đến cơ sở dữ liệu
    $servername = 'localhost';
    $username = 'root';
    $password_db = '';
    $myDB = 'dienthoai';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query('SET NAMES "utf8"');

        // Kiểm tra xem email đã tồn tại chưa
        $stmt = $conn->prepare("SELECT * FROM KhachHang WHERE Email = :email");
        $stmt->execute(['email' => $email]);

        if ($stmt->rowCount() > 0) {
            $error_message = "Email đã tồn tại. Vui lòng chọn email khác.";
        } else {
            // Thêm khách hàng mới
            $stmt = $conn->prepare("INSERT INTO KhachHang (TenKH, Sdt, Email, MatKhau, DiaChi) VALUES (:tenkh, :sdt, :email, :password, :diachi)");
            $stmt->execute([
                'tenkh' => $tenkh,
                'sdt' => $sdt,
                'email' => $email,
                'password' => $password, // Mã hóa mật khẩu
                'diachi' => $diachi
            ]);

            // Lưu thông báo thành công vào session
            $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
            header("Location: dangky.php"); // Chuyển hướng lại để hiển thị thông báo
            exit();
        }

        // Đóng kết nối
        $conn = null;
    } catch (PDOException $e) {
        $error_message = 'Kết nối thất bại: ' . $e->getMessage();
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

    <title>MINHHUY SHOP</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Link CSS chính -->
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="stylesheet" href="css/templatemo-ebook-landing.css">

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">MinhHuy Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="sanpham.php">Sản phẩm</a></li>
                </ul>
                <a href="dangnhap.php" class="ms-3 text-light" title="Đăng nhập">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                </a>
                <a href="giohang.php" class="ms-3 text-light" title="Giỏ hàng">
                    <svg width="16" height="16" viewBox="0 0 16 16" focusable="false">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 3.285C6 2.759 6.03 2.559 6.091 2.369C6.14157 2.17755 6.24812 2.00555 6.397 1.875C6.595 1.7 6.955 1.5 8.012 1.5C9.457 1.5 9.724 1.955 9.828 2.134C9.922 2.293 10 2.49 10 3.308V5H6V3.285ZM14 5H11.5V3.308C11.5 2.356 11.407 1.857 11.119 1.37C10.576 0.441 9.56 0 8.012 0C6.811 0 6.002 0.221 5.401 0.755C5.04065 1.07256 4.77984 1.48757 4.65 1.95C4.535 2.31 4.5 2.681 4.5 3.285V5H2L0 16H16L14 5Z" fill="currentColor"></path>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero text-center py-5">
        <h1 class="display-4">MinhHuy Shop</h1>
        <br>
        <p class="lead">Trao bạn sự trải nghiệm và niềm tin trọn vẹn.</p>
    </header>

    <div class="container mt-5">
        <h2 class="text-center">Đăng ký khách hàng</h2>

        <!-- Thông báo lỗi -->
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <!-- Toast thông báo thành công -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?php echo $_SESSION['success']; ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <script>
                var toastEl = document.querySelector('.toast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();

                // Chuyển hướng sau  giây
                setTimeout(function() {
                    window.location.href = 'dangnhap.php';
                }, 3000); // 3000 ms = 3 giây
            </script>
            <?php unset($_SESSION['success']); ?> <!-- Xóa thông báo sau khi đã hiển thị -->
        <?php endif; ?>

        <form method="POST" action="dangky.php">
            <div class="mb-3">
                <label for="tenkh" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" id="tenkh" name="tenkh" required>
            </div>
            <div class="mb-3">
                <label for="sdt" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" name="sdt" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <select class="form-control" id="diachi" name="diachi" required>
                    <option value="">Chọn thành phố</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                    <option value="Hải Phòng">Hải Phòng</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                    <option value="An Giang">An Giang</option>
                    <option value="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option>
                    <option value="Bắc Giang">Bắc Giang</option>
                    <option value="Bắc Kạn">Bắc Kạn</option>
                    <option value="Bạc Liêu">Bạc Liêu</option>
                    <option value="Bến Tre">Bến Tre</option>
                    <option value="Bình Dương">Bình Dương</option>
                    <option value="Bình Phước">Bình Phước</option>
                    <option value="Bình Thuận">Bình Thuận</option>
                    <option value="Cà Mau">Cà Mau</option>
                    <option value="Cao Bằng">Cao Bằng</option>
                    <option value="Đắk Lắk">Đắk Lắk</option>
                    <option value="Đắk Nông">Đắk Nông</option>
                    <option value="Điện Biên">Điện Biên</option>
                    <option value="Đồng Nai">Đồng Nai</option>
                    <option value="Đồng Tháp">Đồng Tháp</option>
                    <option value="Gia Lai">Gia Lai</option>
                    <option value="Hà Giang">Hà Giang</option>
                    <option value="Hà Nam">Hà Nam</option>
                    <option value="Hà Tây">Hà Tây</option>
                    <option value="Hậu Giang">Hậu Giang</option>
                    <option value="Hòa Bình">Hòa Bình</option>
                    <option value="Hưng Yên">Hưng Yên</option>
                    <option value="Khánh Hòa">Khánh Hòa</option>
                    <option value="Kiên Giang">Kiên Giang</option>
                    <option value="Kon Tum">Kon Tum</option>
                    <option value="Lai Châu">Lai Châu</option>
                    <option value="Lâm Đồng">Lâm Đồng</option>
                    <option value="Lạng Sơn">Lạng Sơn</option>
                    <option value="Lào Cai">Lào Cai</option>
                    <option value="Long An">Long An</option>
                    <option value="Nam Định">Nam Định</option>
                    <option value="Nghệ An">Nghệ An</option>
                    <option value="Ninh Bình">Ninh Bình</option>
                    <option value="Ninh Thuận">Ninh Thuận</option>
                    <option value="Phú Thọ">Phú Thọ</option>
                    <option value="Phú Yên">Phú Yên</option>
                    <option value="Quảng Bình">Quảng Bình</option>
                    <option value="Quảng Nam">Quảng Nam</option>
                    <option value="Quảng Ngãi">Quảng Ngãi</option>
                    <option value="Quảng Ninh">Quảng Ninh</option>
                    <option value="Quảng Trị">Quảng Trị</option>
                    <option value="Sóc Trăng">Sóc Trăng</option>
                    <option value="Sơn La">Sơn La</option>
                    <option value="Tây Ninh">Tây Ninh</option>
                    <option value="Thái Bình">Thái Bình</option>
                    <option value="Thái Nguyên">Thái Nguyên</option>
                    <option value="Thanh Hóa">Thanh Hóa</option>
                    <option value="Thừa Thiên-Huế">Thừa Thiên-Huế</option>
                    <option value="Tiền Giang">Tiền Giang</option>
                    <option value="Trà Vinh">Trà Vinh</option>
                    <option value="Tuyên Quang">Tuyên Quang</option>
                    <option value="Vĩnh Long">Vĩnh Long</option>
                    <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                    <option value="Yên Bái">Yên Bái</option>
                </select>
            </div>
            <button type="submit" name="register" class="btn btn-success">Đăng ký</button>
        </form>

        <p class="mt-3">Đã có tài khoản? <a href="dangnhap.php">Đăng nhập ngay</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>