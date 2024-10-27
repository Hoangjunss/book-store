<?php
// orders.php

// Định nghĩa các biến tĩnh để thay thế dữ liệu động
$email = "nguyenvana@example.com"; // Thay thế bằng email người dùng thực tế

$order = [
    'id' => 12345,
    'orderInfo' => '2023-10-22-XYZ',
    'createdAt' => '2023-10-22 10:30:00',
    'fullCost' => 1500000,
    'shippingFee' => 50000,
    'totalCost' => 1550000,
    'orderStatusEnum' => 'Completed',
    'addressEntity' => [
        'details' => '123 Đường ABC',
        'ward' => 'Phường 1',
        'district' => 'Quận 1',
        'province' => 'Thành phố Hồ Chí Minh'
    ]
];

$customer = [
    'fullName' => 'Nguyễn Văn A',
    'phone' => '0123456789'
];

$orderDetails = [
    [
        'productEntity' => [
            'productName' => 'Áo Thun Nam'
        ],
        'priceOfOne' => 500000,
        'quantity' => 2,
        'totalPrice' => 1000000
    ],
    [
        'productEntity' => [
            'productName' => 'Quần Jeans Nam'
        ],
        'priceOfOne' => 300000,
        'quantity' => 1,
        'totalPrice' => 300000
    ],
    [
        'productEntity' => [
            'productName' => 'Giày Sneaker Nam'
        ],
        'priceOfOne' => 200000,
        'quantity' => 1,
        'totalPrice' => 200000
    ],
    // Thêm các sản phẩm khác nếu cần
];
?>
<!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Shop | eCommerce</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="../../static/client_assets/img/icon/favicon.png"><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../../static/client_assets/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/owl.carousel.min.css"> <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/slicknav.css"> <!-- SlickNav CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/flaticon.css"> <!-- Flaticon CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/animate.min.css"> <!-- Animate CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/price_rangs.css"> <!-- Price Rangs CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/magnific-popup.css"> <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/fontawesome-all.min.css"> <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/themify-icons.css"> <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/slick.css"> <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/nice-select.css"> <!-- Nice Select CSS -->
    <link rel="stylesheet" href="../../static/client_assets/css/style.css"> <!-- Main Style CSS -->
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="../../static/client_assets/img/icon/loder.png" alt="Loader"><!-- Đã thay thế th:src bằng src với đường dẫn tĩnh -->
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header>
    <div class="header-area">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-between flex-wrap align-items-center">
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
                                    <li><a href="view-orders.php">Track Your Order</a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                                </ul>
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
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
                        <a href="index.php"><img src="../../static/client_assets/img/logo/logo.png" alt="Logo"></a><!-- Đã thay thế th:href và th:src bằng href và src với đường dẫn tĩnh -->
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="client/index.php">Home</a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                                <li><a href="client/view-products.php">Products</a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
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
                            <li><a href="client/profile.php"><span class="flaticon-user"></span></a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                            <li class="cart"><a href="client/cart.php"><span class="flaticon-shopping-cart"></span></a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                        </ul>
                    </div>
                </div>

                <div class="search_input" id="search_input_box">
                    <form class="search-inner d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>

                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <div class="header-bottom text-center">
            <p>Sale Up To 50% Biggest Discounts. Hurry! Limited Period Offer <a href="#" class="browse-btn">Shop Now</a></p>
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
                                            <a href="index.php">Home</a><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
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
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <input type="hidden" value="<?php echo htmlspecialchars($order['id']); ?>" id="id" name="id"><!-- Thay thế th:value bằng giá trị PHP -->

                        <div class="order-details">
                            <h2>ORDER: # <span><?php echo htmlspecialchars($order['orderInfo']); ?></span></h2><!-- Thay thế th:text bằng echo PHP -->
                            <p>Ngày: <span><?php echo date('d-m-Y', strtotime($order['createdAt'])); ?></span></p><!-- Thay thế th:text bằng PHP date -->

                            <h3>THÔNG TIN KHÁCH HÀNG</h3>
                            <p>Họ tên: <span><?php echo htmlspecialchars($customer['fullName']); ?></span></p><!-- Thay thế th:text bằng echo PHP -->
                            <p>Điện thoại: <span><?php echo htmlspecialchars($customer['phone']); ?></span></p><!-- Thay thế th:text bằng echo PHP -->
                            <p>Địa chỉ: </p>
                            <div>
                                <?php if (!empty($order['addressEntity'])): ?>
                                    <span><?php echo htmlspecialchars($order['addressEntity']['details'] . ', ' . $order['addressEntity']['ward'] . ', ' . $order['addressEntity']['district'] . ', ' . $order['addressEntity']['province']); ?></span>
                                <?php endif; ?>
                            </div>
                            <br>
                            <h3>THÔNG TIN ĐƠN HÀNG</h3>
                            <table>
                                <thead>
                                <tr>
                                    <th style="width: 100px">STT</th>
                                    <th style="width: 300px">Tên hàng</th>
                                    <th style="width: 200px">Đơn giá</th>
                                    <th style="width: 200px">Số lượng</th>
                                    <th style="width: 200px">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orderDetails as $index => $item): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($index + 1); ?></td><!-- Thay thế th:text bằng echo PHP -->
                                        <td><?php echo htmlspecialchars($item['productEntity']['productName']); ?></td><!-- Thay thế th:text bằng echo PHP -->
                                        <td><?php echo number_format($item['priceOfOne'], 0, '.', ',') . ' VND'; ?></td><!-- Thay thế th:text bằng PHP number_format -->
                                        <td><?php echo htmlspecialchars($item['quantity']); ?></td><!-- Thay thế th:text bằng echo PHP -->
                                        <td><?php echo number_format($item['totalPrice'], 0, '.', ',') . ' VND'; ?></td><!-- Thay thế th:text bằng PHP number_format -->
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tổng cộng: </td>
                                    <td><?php echo number_format($order['fullCost'], 0, '.', ',') . ' VND'; ?></td><!-- Thay thế th:text bằng PHP number_format -->
                                </tr>
                                </tbody>

                            </table>

                            <br>
                            <br>
                            <br>
                            <p>Phí ship: <span><?php echo number_format($order['shippingFee'], 0, '.', ',') . ' VND'; ?></span></p><!-- Thay thế th:text bằng PHP number_format -->
                            <p>Tổng tiền: <span><?php echo number_format($order['totalCost'], 0, '.', ',') . ' VND'; ?></span></p><!-- Thay thế th:text bằng PHP number_format -->
                            <br>
                            <br>
                            <br>
                            <p>Trạng thái đơn hàng: <b><?php echo htmlspecialchars($order['orderStatusEnum']); ?></b></p><!-- Thay thế th:text bằng echo PHP -->

                        </div>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Search Keyword"
                                        />
                                        <div class="input-group-append d-flex">
                                            <button class="boxed-btn2" type="button">
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
                                        <p>Resaurant food</p>
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
                                <img src="../../static/client_assets/img/gallery/blog1.jpg" alt="Blog Image"/>
                                <div class="media-body">
                                    <a href="blog_details.php">
                                        <h3 style="color: #2d2d2d">
                                            From life was you fish...
                                        </h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/gallery/blog2.jpg" alt="Blog Image"/>
                                <div class="media-body">
                                    <a href="blog_details.php">
                                        <h3 style="color: #2d2d2d">The Amazing Hubble</h3>
                                    </a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/gallery/blog3.jpg" alt="Blog Image"/>
                                <div class="media-body">
                                    <a href="blog_details.php">
                                        <h3 style="color: #2d2d2d">Astronomy Or Astrology</h3>
                                    </a>
                                    <p>03 Hours ago</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="../../static/client_assets/img/gallery/blog4.jpg" alt="Blog Image"/>
                                <div class="media-body">
                                    <a href="blog_details.php">
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
                                <li><a href="#">project</a></li>
                                <li><a href="#">love</a></li>
                                <li><a href="#">technology</a></li>
                                <li><a href="#">travel</a></li>
                                <li><a href="#">restaurant</a></li>
                                <li><a href="#">life style</a></li>
                                <li><a href="#">design</a></li>
                                <li><a href="#">illustration</a></li>
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
                                                src="../../static/client_assets/img/gallery/blog5.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/gallery/blog6.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/gallery/blog7.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/gallery/blog8.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/gallery/blog9.jpg"
                                                alt="Instagram Image"
                                        />
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img
                                                class="img-fluid"
                                                src="../../static/client_assets/img/gallery/blog10.jpg"
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
                            <form action="#">
                                <div class="form-group">
                                    <input
                                            type="email"
                                            class="form-control"
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
                                    <form action="#">
                                        <input type="text" placeholder="Enter your email"/>
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
                                        <a href="/client/home"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"></a><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
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
                                        <li><a href="/client/order">Track Your Order</a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
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
                            <div class="col-xl-12 ">
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
    <script src="../../static/client_assets/js/vendor/modernizr-3.5.0.min.js"></script> <!-- Modernizr: Detects HTML5 and CSS3 features -->
    <script src="../../static/client_assets/js/vendor/jquery-1.12.4.min.js"></script> <!-- jQuery: JavaScript library -->
    <script src="../../static/client_assets/js/popper.min.js"></script> <!-- Popper.js: Tooltip & popover positioning engine -->
    <script src="../../static/client_assets/js/bootstrap.min.js"></script> <!-- Bootstrap JS: Front-end component library -->

    <script src="../../static/client_assets/js/owl.carousel.min.js"></script> <!-- Owl Carousel: Carousel slider -->
    <script src="../../static/client_assets/js/slick.min.js"></script> <!-- Slick Slider: Responsive carousel slider -->
    <script src="../../static/client_assets/js/jquery.slicknav.min.js"></script> <!-- SlickNav: Responsive mobile menu -->

    <script src="../../static/client_assets/js/wow.min.js"></script> <!-- WOW.js: Reveal animations on scroll -->
    <script src="../../static/client_assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup: Responsive lightbox & dialog script -->
    <script src="../../static/client_assets/js/jquery.nice-select.min.js"></script> <!-- Nice Select: Custom select box -->
    <script src="../../static/client_assets/js/jquery.counterup.min.js"></script> <!-- Counter-Up: Animated counters -->
    <script src="../../static/client_assets/js/waypoints.min.js"></script> <!-- Waypoints: Execute a function when you scroll to an element -->
    <script src="../../static/client_assets/js/price_rangs.js"></script> <!-- Price Range Slider: Custom price range slider -->

    <script src="../../static/client_assets/js/contact.js"></script> <!-- Contact Form JS: Handles contact form submissions -->
    <script src="../../static/client_assets/js/jquery.form.js"></script> <!-- jQuery Form: Form handling -->
    <script src="../../static/client_assets/js/jquery.validate.min.js"></script> <!-- jQuery Validate: Form validation -->
    <script src="../../static/client_assets/js/mail-script.js"></script> <!-- Mail Script: Handles email subscriptions -->
    <script src="../../static/client_assets/js/jquery.ajaxchimp.min.js"></script> <!-- AjaxChimp: Integration with MailChimp -->

    <!-- Custom Scripts -->
    <script src="../../static/client_assets/js/plugins.js"></script> <!-- Plugins JS: Additional plugins -->
    <script src="../../static/client_assets/js/main.js"></script> <!-- Main JS: Custom JavaScript for the site -->
    <script src="../../static/client_assets/js/jquery-3.7.1.min.js"></script> <!-- jQuery 3.7.1 -->
    <script src="../../static/client_assets/js/axios.min.js"></script> <!-- Axios: Promise based HTTP client -->

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag("js", new Date());

        gtag("config", "UA-23581568-13");
    </script>
    <script
            defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
            integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
            data-cf-beacon='{"rayId":"84261bf4bec5079f","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
            crossorigin="anonymous"
    ></script>
</body>
</html>
