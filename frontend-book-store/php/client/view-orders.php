<?php
// orders.php

// Giả lập dữ liệu người dùng đã đăng nhập
$session = true; // Thay đổi thành false nếu người dùng chưa đăng nhập

// Giả lập email người dùng
$email = "nguyenvana@example.com";

// Giả lập danh sách đơn hàng
$ordersData = [
    [
        'id' => 101,
        'day' => '15',
        'month' => 'April',
        'totalCost' => 1500000,
        'fullCost' => 1400000,
        'shippingFee' => 100000,
        'detailCount' => 3,
        'orderStatus' => 'Completed'
    ],
    [
        'id' => 102,
        'day' => '20',
        'month' => 'April',
        'totalCost' => 2500000,
        'fullCost' => 2400000,
        'shippingFee' => 100000,
        'detailCount' => 5,
        'orderStatus' => 'Processing'
    ],
    // Thêm các đơn hàng khác nếu cần
];

// Giả lập tổng số trang cho phân trang
$totalPages = 3;
$currentPage = 1; // Trang hiện tại (ví dụ: 1)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Shop | eCommerce</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../../static/client_assets/img/icon/favicon.png"><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../../static/client_assets/css/bootstrap.min.css"><!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/owl.carousel.min.css"><!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/slicknav.css"><!-- SlickNav CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/flaticon.css"><!-- Flaticon CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/animate.min.css"><!-- Animate CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/price_rangs.css"><!-- Price Rangs CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/magnific-popup.css"><!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/fontawesome-all.min.css"><!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/themify-icons.css"><!-- Themify Icons CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/slick.css"><!-- Slick Slider CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/nice-select.css"><!-- Nice Select CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/style.css"><!-- Main Style CSS -->
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="../../static/client_assets/img/icon/loder.png" alt="Loader"><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
            </div>
        </div>
    </div>
</div>

<header>
    <div class="header-area">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div
                                class="d-flex justify-content-between flex-wrap align-items-center"
                        >
                            <div class="header-info-left">
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </div>
                            <div class="header-info-right d-flex">
                                <ul class="order-list">
                                    <li><span>Hello, <?php echo htmlspecialchars($email); ?></span></li><!-- Thay thế th:text bằng echo PHP với dữ liệu tĩnh -->
                                    <li><a href="/client/order.php">Track Your Order</a></li><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                                </ul>
                                <ul class="header-social">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid header-sticky">
            <div class="container">
                <div class="menu-wrapper">

                    <div class="logo">
                        <a href="/client/home.php"><img src="../../static/client_assets/img/logo/logo.png" alt="Logo"></a><!-- Thay thế th:href bằng href và th:src bằng src với đường dẫn tĩnh -->
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="/client/home.php">Home</a></li><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                                <li><a href="/client/product.php">Products</a></li><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                            </ul>
                        </nav>
                    </div>

                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch hearer_icon">
                                    <a id="search_1" href="javascript:void(0)">
                                        <span class="flaticon-search"></span>
                                    </a>
                                </div>
                            </li>
                            <li><a href="/client/profile.php"><span class="flaticon-user"></span></a></li><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                            <li class="cart"><a href="/client/cart.php"><span class="flaticon-shopping-cart"></span></a></li><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                        </ul>
                    </div>
                </div>

                <div class="search_input" id="search_input_box">
                    <form class="search-inner d-flex justify-content-between" action="/client/search.php" method="get"><!-- Thêm action và method cho form -->
                        <input
                                type="text"
                                class="form-control"
                                id="search_input"
                                name="query"
                                placeholder="Search Here"
                                required
                        />
                        <button type="submit" class="btn"><i class="fas fa-search"></i></button><!-- Thêm icon tìm kiếm -->
                        <span
                                class="ti-close"
                                id="close_search"
                                title="Close Search"
                        ></span>
                    </form>
                </div>

                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <div class="header-bottom text-center">
            <p>
                Sale Up To 50% Biggest Discounts. Hurry! Limited Period Offer
                <a href="#" class="browse-btn">Shop Now</a>
            </p>
        </div>
    </div>
</header>
<main>
    <div class="hero-area section-bg2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider-area">
                        <div
                                class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center"
                        >
                            <div class="hero-caption hero-caption2">
                                <h2>Orders</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item">
                                            <a href="/client/home.php">Home</a><!-- Thay thế href="index.html" bằng href="/client/home.php" -->
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

    <section class="blog_area">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <input type="hidden" value="<?php echo htmlspecialchars($ordersData[0]['id']); ?>" id="id" name="id"><!-- Thay thế th:value bằng giá trị PHP -->

                        <div id="orderContainer" class="blog_container">
                            <?php foreach ($ordersData as $order): ?>
                                <?php
                                    // Định dạng giá tiền
                                    $formattedTotalCost = number_format($order['totalCost'], 0, ',', '.') . ' VND';
                                    $formattedFullCost = number_format($order['fullCost'], 0, ',', '.') . ' VND';
                                    $formattedShippingFee = number_format($order['shippingFee'], 0, ',', '.') . ' VND';
                                ?>
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <a href="#" class="blog_item_date">
                                            <h3><?php echo htmlspecialchars($order['day']); ?></h3>
                                            <p><?php echo htmlspecialchars($order['month']); ?></p>
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="/client/order_detail.php?id=<?php echo htmlspecialchars($order['id']); ?>">
                                            <h2 class="order-head" style="color: #2d2d2d">Số tiền phải trả: <?php echo $formattedTotalCost; ?></h2>
                                        </a>
                                        <p>Tổng số tiền: <?php echo $formattedFullCost; ?></p>
                                        <ul class="order-info-link">
                                            <li>
                                                <a href="#">Phí ship: <?php echo $formattedShippingFee; ?></a>
                                            </li>
                                            <li>
                                                <a href="#">Tổng số sản phẩm của đơn hàng: <?php echo htmlspecialchars($order['detailCount']); ?></a>
                                            </li>
                                            <li>
                                                <a href="#">Trạng thái: <?php echo htmlspecialchars($order['orderStatus']); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>

                        <!-- Phân trang -->
                        <nav aria-label="...">
                            <ul class="pagination" id="pageId" style="float: right;">
                                <?php if ($currentPage > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>&size=5" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <?php if ($i == $currentPage): ?>
                                        <li class="page-item active"><a class="page-link" href="?page=<?php echo $i; ?>&size=5"><?php echo $i; ?></a></li>
                                    <?php else: ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>&size=5"><?php echo $i; ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>&size=5" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Right Sidebar -->
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="/client/search.php" method="get"><!-- Thêm action và method cho form -->
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                name="query"
                                                placeholder="Search Keyword"
                                                required
                                        />
                                        <div class="input-group-append d-flex">
                                            <button class="boxed-btn2" type="submit">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title" style="color: #2d2d2d">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Restaurant food</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Travel news</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Modern technology</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>21</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care</p>
                                        <p>09</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title" style="color: #2d2d2d">
                                Recent Post
                            </h3>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/post/post_1.jpg" alt="post" />
                                <div class="media-body">
                                    <a href="/blog_details.php">
                                        <h3 style="color: #2d2d2d">
                                            From life was you fish...
                                        </h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/post/post_2.jpg" alt="post" />
                                <div class="media-body">
                                    <a href="/blog_details.php">
                                        <h3 style="color: #2d2d2d">The Amazing Hubble</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/post/post_3.jpg" alt="post" />
                                <div class="media-body">
                                    <a href="/blog_details.php">
                                        <h3 style="color: #2d2d2d">Astronomy Or Astrology</h3>
                                    </a>
                                    <p>03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/post/post_4.jpg" alt="post" />
                                <div class="media-body">
                                    <a href="/blog_details.php">
                                        <h3 style="color: #2d2d2d">Asteroids telescope</h3>
                                    </a>
                                    <p>01 Hours ago</p>
                                </div>
                            </div>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title" style="color: #2d2d2d">
                                Tag Clouds
                            </h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">love</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">restaurant</a>
                                </li>
                                <li>
                                    <a href="#">life style</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title" style="color: #2d2d2d">
                                Instagram Feeds
                            </h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/post/post_5.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/post/post_6.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/post/post_7.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/post/post_8.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/post/post_9.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/post/post_10.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title" style="color: #2d2d2d">
                                Newsletter
                            </h4>
                            <form action="/client/newsletter.php" method="post"><!-- Thay đổi action và method cho form -->
                                <div class="form-group">
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="newsletter_email"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'"
                                            placeholder="Enter email"
                                            required
                                    />
                                </div>
                                <button
                                        class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit"
                                >
                                    Subscribe
                                </button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <div class="footer-wrapper gray-bg">
        <div class="footer-area footer-padding">
            <section class="subscribe-area">
                <div class="container">
                    <div class="row justify-content-between subscribe-padding">
                        <div class="col-xxl-3 col-xl-3 col-lg-4">
                            <div class="subscribe-caption">
                                <h3>Subscribe Newsletter</h3>
                                <p>Subscribe newsletter to get 5% on all products.</p>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="subscribe-caption">
                                <form action="/client/newsletter.php" method="post"><!-- Thay đổi action và method cho form -->
                                    <input type="email" name="newsletter_email" placeholder="Enter your email" required />
                                    <button class="subscribe-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-4">
                            <div class="footer-social">
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-20">
                                <div class="footer-logo mb-35">
                                    <a href="/client/home.php"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"></a><!-- Thay thế th:href bằng href và th:src bằng src với đường dẫn tĩnh -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Shop Men</h4>
                                <ul>
                                    <li><a href="#">Clothing Fashion</a></li>
                                    <li><a href="#">Winter</a></li>
                                    <li><a href="#">Summer</a></li>
                                    <li><a href="#">Formal</a></li>
                                    <li><a href="#">Casual</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Shop Women</h4>
                                <ul>
                                    <li><a href="#">Clothing Fashion</a></li>
                                    <li><a href="#">Winter</a></li>
                                    <li><a href="#">Summer</a></li>
                                    <li><a href="#">Formal</a></li>
                                    <li><a href="#">Casual</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Baby Collection</h4>
                                <ul>
                                    <li><a href="#">Clothing Fashion</a></li>
                                    <li><a href="#">Winter</a></li>
                                    <li><a href="#">Summer</a></li>
                                    <li><a href="#">Formal</a></li>
                                    <li><a href="#">Casual</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="/client/order.php">Track Your Order</a></li><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Carrier</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p>
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    All rights reserved | This template is made with
                                    <i
                                            class="fa fa-heart color-danger"
                                            aria-hidden="true"
                                    ></i>
                                    by
                                    <a
                                            href="https://colorlib.com"
                                            target="_blank"
                                            rel="nofollow noopener"
                                    >Colorlib</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="back-top">
    <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
            <div class="arrow arrow-one"></div>
            <div class="arrow arrow-two"></div>
        </div>
    </a>
</div>

<!-- JS Libraries -->
<!-- Vendor Libraries -->
<script src="../../static/client_assets/js/vendor/modernizr-3.5.0.min.js"></script> <!-- Modernizr -->
<script src="../../static/client_assets/js/vendor/jquery-1.12.4.min.js"></script> <!-- jQuery 1.12.4 -->
<script src="../../static/client_assets/js/popper.min.js"></script> <!-- Popper.js -->
<script src="../../static/client_assets/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->

<script src="../../static/client_assets/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="../../static/client_assets/js/slick.min.js"></script> <!-- Slick Slider -->
<script src="../../static/client_assets/js/jquery.slicknav.min.js"></script> <!-- SlickNav -->

<script src="../../static/client_assets/js/wow.min.js"></script> <!-- WOW.js -->
<script src="../../static/client_assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup -->
<script src="../../static/client_assets/js/jquery.nice-select.min.js"></script> <!-- Nice Select -->
<script src="../../static/client_assets/js/jquery.counterup.min.js"></script> <!-- Counter-Up -->
<script src="../../static/client_assets/js/waypoints.min.js"></script> <!-- Waypoints -->
<script src="../../static/client_assets/js/price_rangs.js"></script> <!-- Price Rangs -->

<script src="../../static/client_assets/js/contact.js"></script> <!-- Contact JS -->
<script src="../../static/client_assets/js/jquery.form.js"></script> <!-- jQuery Form -->
<script src="../../static/client_assets/js/jquery.validate.min.js"></script> <!-- jQuery Validate -->
<script src="../../static/client_assets/js/mail-script.js"></script> <!-- Mail Script -->
<script src="../../static/client_assets/js/jquery.ajaxchimp.min.js"></script> <!-- AjaxChimp -->

<script src="../../static/client_assets/js/plugins.js"></script> <!-- Plugins JS -->
<script src="../../static/client_assets/js/main.js"></script> <!-- Main JS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script><!-- Google Analytics -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("config", "UA-23581568-13");
</script>
</body>
</html>
