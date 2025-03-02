<?php
// Khởi tạo biến lỗi
$error_message = '';
$success_message = '';

// Kiểm tra xem có yêu cầu đăng nhập không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Lấy dữ liệu từ form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kết nối đến cơ sở dữ liệu
    $servername = 'localhost';
    $username = 'root';
    $password_db = '';
    $myDB = 'dienthoai';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query('SET NAMES "utf8"');

        // Truy vấn để lấy thông tin khách hàng
        $stmt = $conn->prepare("SELECT * FROM KhachHang WHERE Email = :email");
        $stmt->execute(['email' => $email]);

        if ($stmt->rowCount() == 0) {
            $error_message = "Email không tồn tại.";
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Kiểm tra mật khẩu
            if (password_verify($password, $user['MatKhau'])) {
                // Đăng nhập thành công
                session_start();
                $_SESSION['user_id'] = $user['MaKH'];
                $_SESSION['user_name'] = $user['TenKH'];
                header("Location: index.php"); // Chuyển hướng đến trang chính
                exit();
            } else {
                $error_message = "Mật khẩu không chính xác.";
            }
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

    <!-- Link Bootstrap Icons -->
    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Link CSS chính -->
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="stylesheet" href="css/templatemo-ebook-landing.css">

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <main>
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
                    <a href="giohang.php" class="ms-3 text-light" title="Đăng nhập">
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
            <h2 class="text-center">Đăng nhập</h2>

            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="dangnhap.php">
                <div class="mb-3">
                    <h4>Email: </h4>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <h4>Password: </h4>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-success">Đăng nhập</button>
            </form>

            <p class="mt-3">Chưa có tài khoản? <a href="dangky.php">Đăng ký ngay</a></p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </main>

</body>

</html>