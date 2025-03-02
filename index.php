<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <meta name="description" content="">
    <meta name="author" content="">

    <title>MinhHuy Shop</title>
    <link rel="stylesheet" href="css/trangchu.css"> <!-- Link to the CSS file -->

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-ebook-landing.css" rel="stylesheet">
    <!--

TemplateMo 588 ebook landing

https://templatemo.com/tm-588-ebook-landing

-->
</head>

<body>

    <main>
        <!-- Thanh nav -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="navbar-brand-icon bi-book me-2"></i>
                    <span>shop</span>
                </a>

                <div class="d-lg-none ms-auto me-3">
                    <a href="#" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                        <i class="btn-icon bi-cloud-download"></i>
                        <span>Download</span><!-- duplicated another one below for mobile -->
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto me-lg-4">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Trang chu</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="sanpham.php">Gioi thieu</a>
                        </li>

                        <!-- Thanh tìm kiếm -->
                        <li class="nav-item mx-auto">
                            <form class="form-inline d-flex justify-content-center my-2 my-lg-0" action="timkiem.php" method="GET">
                                <input class="form-control me-2" type="search" name="TenHang" placeholder="Search" aria-label="Search" required>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="sanpham.php">San pham</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Lien he</a>
                        </li>
                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="#" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                            <i class="btn-icon bi-cloud-download"></i>
                            <span>Download</span><!-- duplicated above one for mobile -->
                        </a>
                    </div>
                    <a href="dangnhap.php" class="ms-3 text-light" title="Đăng nhập">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </a>
                </div>

            </div>
        </nav>



        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0">

                        <h6>Gioi thieu dien thoai</h6>

                        <h1 class="text-white mb-4">chung toi luon doi moi ve dien thoai v.v</h1>

                        <a href="#section_2" class="btn custom-btn smoothscroll me-3">Discover More</a>

                        <a href="#section_3" class="link link--kale smoothscroll">Meet the Author</a>
                    </div>

                    <div class="hero-image-wrap col-lg-6 col-12 mt-3 mt-lg-0">
                        <img src="libs/hinhanh/hinhvatpham/hinh_macbook.png" class="hero-image img-fluid" alt="education online books">
                    </div>

                </div>
            </div>
        </section>


        <section class="featured-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="avatar-group d-flex flex-wrap align-items-center">
                            <img src="images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg" class="img-fluid avatar-image" alt="">

                            <img src="images/avatar/portrait-young-redhead-bearded-male.jpg" class="img-fluid avatar-image avatar-image-left" alt="">

                            <img src="images/avatar/pretty-blonde-woman.jpg" class="img-fluid avatar-image avatar-image-left" alt="">

                            <img src="images/avatar/studio-portrait-emotional-happy-funny-smiling-boyfriend.jpg" class="img-fluid avatar-image avatar-image-left" alt="">

                            <div class="reviews-group mt-3 mt-lg-0">
                                <strong>4.5</strong>

                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star"></i>

                                <small class="ms-3">2,564 reviews</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-lg-5"></section>

        <!-- Macbook -->
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

                    // Lấy 4 sản phẩm ngẫu nhiên
                    $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, MoTaChiTiet, HinhAnh, MaTL 
                FROM HangHoa 
                WHERE MaTL = 2 
                ORDER BY RAND() 
                LIMIT 4";
                    $stmt = $conn->query($chuoi_sql);

                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {
                ?>
                            <div class="col">
                                <a href="macbook.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="card h-100 text-center shadow-sm text-decoration-none">
                                    <div class="card h-100">
                                        <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($row["HinhAnh"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["TenHang"]); ?>" style="width: 100%; height: 250px; object-fit: contain; padding: 10px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($row["TenHang"]); ?></h5>
                                            <p class="card-text text-muted">Giá: <?php echo number_format($row["DonGia"], 0, ',', '.'); ?> VND</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                    } else {
                        echo '<p class="text-center">Không có sản phẩm nào.</p>';
                    }
                    $conn = null;
                } catch (PDOException $e) {
                    echo '<p class="text-center text-danger">Kết nối thất bại: ' . $e->getMessage() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Iphone -->
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

                    // Lấy 4 sản phẩm ngẫu nhiên
                    $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, MoTaChiTiet, HinhAnh, MaTL 
                FROM HangHoa 
                WHERE MaTL = 1 
                ORDER BY RAND() 
                LIMIT 4";
                    $stmt = $conn->query($chuoi_sql);

                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {
                ?>
                            <div class="col">
                                <a href="iphone.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="card h-100 text-center shadow-sm text-decoration-none">
                                    <div class="card h-100">
                                        <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($row["HinhAnh"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["TenHang"]); ?>" style="width: 100%; height: 250px; object-fit: contain; padding: 10px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($row["TenHang"]); ?></h5>
                                            <p class="card-text text-muted">Giá: <?php echo number_format($row["DonGia"], 0, ',', '.'); ?> VND</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                    } else {
                        echo '<p class="text-center">Không có sản phẩm nào.</p>';
                    }
                    $conn = null;
                } catch (PDOException $e) {
                    echo '<p class="text-center text-danger">Kết nối thất bại: ' . $e->getMessage() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Slide -->
        <section id="Routing AUNZ W MINI BAGS &amp; TRAVEL 20241216" data-testid="FhRouting" data-routing-type="Routing-2" class="FhRouting-style__Container-sc-b135b282-0 fDmYHu">
            <div class="row justify-content-center">
                <?php
                try {
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $myDB = 'dienthoai';
                    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->query('SET NAMES "utf8"');

                    // Retrieve 2 random products from category  
                    $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, MoTaChiTiet, HinhAnh, MaTL   
                          FROM HangHoa   
                          WHERE MaTL = 1   
                          ORDER BY RAND()   
                          LIMIT 2";
                    $stmt = $conn->prepare($chuoi_sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {
                            $maHang = htmlspecialchars($row['MaHang']);
                            $tenHang = htmlspecialchars($row['TenHang']);
                            $hinhAnh = htmlspecialchars($row['HinhAnh']);
                ?>
                            <!-- Product Card -->
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <a href="chitiet.php?MaHang=<?php echo $maHang; ?>" tabindex="-1" class="text-decoration-none">
                                        <img src="libs/hinhanh/hinhvatpham/<?php echo $hinhAnh; ?>" class="card-img-top img-fluid" alt="<?php echo $tenHang; ?>" style="height: 800px; object-fit: cover;">
                                    </a>
                                </div>
                            </div>
                <?php
                        }
                    } else {
                        echo '<p class="text-center">Không có sản phẩm nào.</p>';
                    }
                    $conn = null;
                } catch (PDOException $e) {
                    // Hide error details in a production environment  
                    echo '<p class="text-center text-danger">Kết nối thất bại. Vui lòng thử lại sau.</p>';
                }
                ?>
            </div>
        </section>
        <!-- Nổi bật -->
        <section class="book-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <h5 class="featured">Nổi bật</h5>
                    <?php
                    try {
                        $servername = 'localhost';
                        $username = 'root';
                        $password = '';
                        $myDB = 'dienthoai';
                        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $conn->query('SET NAMES "utf8"');

                        // Lấy 1 sản phẩm ngẫu nhiên
                        $chuoi_sql = "SELECT MaHang, TenHang, DonGia, MoTa, MoTaChiTiet, HinhAnh 
                  FROM HangHoa 
                  WHERE MaTL = 2
                  ORDER BY RAND() 
                  LIMIT 1";
                        $stmt = $conn->query($chuoi_sql);
                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt as $row) {
                    ?>
                                <div class="row mb-5">
                                    <!-- Hình ảnh sản phẩm -->
                                    <div class="col-lg-6 col-12 mb-4">
                                        <div class="product-image">
                                            <img src="libs/hinhanh/hinhvatpham/<?php echo htmlspecialchars($row["HinhAnh"]); ?>" class="card-img-top-1" alt="<?php echo htmlspecialchars($row["TenHang"]); ?>">
                                        </div>
                                    </div>

                                    <!-- Thông tin sản phẩm -->
                                    <div class="col-lg-6 col-12">
                                        <div class="product-info">
                                            <h6>Giới thiệu sản phẩm</h6>
                                            <h5 class="card-title-1">
                                                <a href="chitietsanpham.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="text-dark-1">
                                                    <?php echo htmlspecialchars($row["TenHang"]); ?>
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted">Giá: <?php echo number_format($row["DonGia"], 0, ',', '.'); ?> VND</p>
                                            <p class="card-text"><?php echo htmlspecialchars($row["MoTaChiTiet"]); ?></p>
                                        </div>

                                        <!-- Nút Xem chi tiết -->
                                        <div class="d-grid gap-2">
                                            <a href="chitiet.php?MaHang=<?php echo htmlspecialchars($row["MaHang"]); ?>" class="btn btn-primary">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo '<p>Không có sản phẩm nào.</p>';
                        }
                        $conn = null;
                    } catch (PDOException $e) {
                        echo 'Kết nối thất bại: ' . $e->getMessage();
                    }
                    ?>


                </div>
            </div>
        </section>



        <section>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h6>What's inside?</h6>

                        <h2 class="mb-5">Preview at glance</h2>
                    </div>

                    <div class="col-lg-4 col-12">
                        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch">
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link smoothscroll" href="#item-1">Introduction</a>

                                <a class="nav-link smoothscroll" href="#item-2">Chapter 1: <strong>Win back your time with mobile productivity</strong></a>

                                <a class="nav-link smoothscroll" href="#item-3">Chapter 2: <strong>Work less, do more with your phone</strong></a>

                                <a class="nav-link smoothscroll" href="#item-4">Chapter 3: <strong>Delegate tasks using smartphone apps
                                    </strong></a>

                                <a class="nav-link smoothscroll" href="#item-5">Chapter 4: <strong>Habits to boost your phone usage efficiency</strong></a>
                            </nav>
                        </nav>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                            <div class="scrollspy-example-item" id="item-1">
                                <h5>Introducing ebook</h5>

                                <p>This eBook landing page is perfect for any purpose related to mobile phones and technology. The layout is based on the Bootstrap 5 CSS framework, ensuring responsive design and a seamless mobile experience.</p>

                                <p><strong>What is Content Marketing?</strong> If you are wondering what content marketing is all about, this is the place to start.</p>

                                <blockquote class="blockquote">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito</blockquote>

                                <p>If you are wondering what mobile marketing is all about, this is the place to start. Learn how to effectively reach your audience and engage them through their smartphones.

                                    Let me know if you'd like further customization!</p>
                            </div>

                            <div class="scrollspy-example-item" id="item-2">
                                <h5>Win back your time</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                <p>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus elementum, tempor risus vel, condimentum orci.</p>

                                <p>You are not allowed to redistribute this template ZIP file on any other template collection website. Please contact TemplateMo for more information.</p>

                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-3">
                                        <img src="images/portrait-mature-smiling-authoress-sitting-desk.jpg" class="scrollspy-example-item-image img-fluid" alt="">
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3">
                                        <img src="images/businessman-sitting-by-table-cafe.jpg" class="scrollspy-example-item-image img-fluid" alt="">
                                    </div>
                                </div>

                                <p>If you need some specific CSS templates, you can Google with keywords such as templatemo gallery, templatemo digital marketing, etc.</p>
                            </div>

                            <div class="scrollspy-example-item" id="item-3">
                                <h5>Work less, do more</h5>

                                <p>Credit goes to <a rel="nofollow" href="https://freepik.com" target="_blank">FreePik</a> for images used in this ebook landing page template. You may browse FreePik to download more free images for your website.</p>
                                <p>This is a second paragraph. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

                                <p>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt ut labore.</p>

                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <img src="images/tablet-screen-contents.jpg" class="img-fluid" alt="">
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <p>Modern ebook ever</p>

                                        <p><strong>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt.</strong></p>
                                    </div>
                                </div>
                            </div>

                            <div class="scrollspy-example-item" id="item-4">
                                <h5>Delegate</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                <p>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt ut labore.</p>

                                <p>You are not allowed to redistribute this template ZIP file on any other template collection website. Please contact TemplateMo for more information.</p>

                                <img src="images/portrait-mature-smiling-authoress-sitting-desk.jpg" class="scrollspy-example-item-image img-fluid mb-3" alt="">

                                <p>You may want to contact us for more information about this template.</p>
                            </div>

                            <div class="scrollspy-example-item" id="item-5">
                                <h5>Habits</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                <p>You are not allowed to redistribute this template ZIP file on any other template collection website. Please contact TemplateMo for more information.</p>

                                <p><strong>What is Free CSS Templates?</strong> Free CSS Templates are a variety of ready-made web pages designed for different kinds of websites.</p>

                                <blockquote class="blockquote">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito</blockquote>

                                <p>You may browse TemplateMo website for more CSS templates. Thank you for visiting our website.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="author-section section-padding" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <img src="images/portrait-mature-smiling-authoress-sitting-desk.jpg" class="author-image img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <h6>Meet Author</h6>

                        <h2 class="mb-4">Prof. Sophia</h2>

                        <p>This is an ebook landing page template with Bootstrap 5 CSS framework. It is easy to customize with the use of Bootstrap CSS classes.</p>

                        <p>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt ut labore.</p>
                    </div>

                </div>
            </div>
        </section>


        <section class="reviews-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center mb-5">
                        <h6>Reviews</h6>

                        <h2>What people saying...</h2>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="custom-block d-flex flex-wrap">
                            <div class="custom-block-image-wrap d-flex flex-column">
                                <img src="images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg" class="img-fluid avatar-image" alt="">

                                <div class="text-center mt-3">
                                    <span class="text-white">Sandy</span>

                                    <strong class="d-block text-white">Artist</strong>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="reviews-group mb-3">
                                    <strong>4.5</strong>

                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star"></i>
                                </div>

                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 my-5 my-lg-0">
                        <div class="custom-block d-flex flex-wrap">
                            <div class="custom-block-image-wrap d-flex flex-column">
                                <img src="images/avatar/portrait-young-redhead-bearded-male.jpg" class="img-fluid avatar-image avatar-image-left" alt="">

                                <div class="text-center mt-3">
                                    <span class="text-white">John</span>

                                    <strong class="d-block text-white">Producer</strong>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="reviews-group mb-3">
                                    <strong>3.5</strong>

                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star"></i>
                                    <i class="bi-star"></i>
                                </div>

                                <p class="mb-0">If you need some specific CSS templates, you can Google with keywords such as templatemo one-page, templatemo portfolio, etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="custom-block d-flex flex-wrap">
                            <div class="custom-block-image-wrap d-flex flex-column">
                                <img src="images/avatar/pretty-blonde-woman.jpg" class="img-fluid avatar-image" alt="">

                                <div class="text-center mt-3">
                                    <span class="text-white">Candy</span>

                                    <strong class="d-block text-white">VP, Design</strong>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="reviews-group mb-3">
                                    <strong>5</strong>

                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                    <i class="bi-star-fill"></i>
                                </div>

                                <p class="mb-0">Please tell your friends about our website that we provide 100% free CSS templates for everyone. Thank you for using our templates.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


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
                            <a href="tel: 010-020-0340" class="contact-link">
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

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>