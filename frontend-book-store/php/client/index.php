<?php
// index.php

// Định nghĩa các biến tĩnh để thay thế dữ liệu động
$email = "nguyenvana@example.com"; // Thay thế bằng email người dùng thực tế

$products = [
    [
        'id' => 1,
        'productName' => "Men's Fashion",
        'salePrice' => 299000,
        'thumbnail' => "client_assets/img/gallery/items1.jpg"
    ],
    [
        'id' => 2,
        'productName' => "Women's Fashion",
        'salePrice' => 399000,
        'thumbnail' => "client_assets/img/gallery/items2.jpg"
    ],
    [
        'id' => 3,
        'productName' => "Baby Fashion",
        'salePrice' => 199000,
        'thumbnail' => "client_assets/img/gallery/items3.jpg"
    ],
    // Thêm các sản phẩm khác nếu cần
];
?>
<!doctype html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop | eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <style>
        .add-to-cart-link {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50; /* Green color, bạn có thể thay đổi */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-to-cart-link:hover {
            background-color: #45a049; /* Màu xanh lá đậm hơn khi hover */
        }
    </style>
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

    <section class="slider-area ">
        <div class="slider-active">

            <div class="single-slider slider-bg1 slider-height d-flex align-items-center">
                <div class="container">
                    <div class="rowr">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
                            <div class="hero-caption text-center">
                                <span>Fashion Sale</span>
                                <h1 data-animation="bounceIn" data-delay="0.2s">Minimal Menz Style</h1>
                                <p data-animation="fadeInUp" data-delay="0.4s">Consectetur adipisicing elit. Laborum
                                    fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla
                                    earum.</p>
                                <a href="#" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-slider slider-bg2 slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-sm-10">
                            <div class="hero-caption text-center">
                                <span>Fashion Sale</span>
                                <h1 data-animation="bounceIn" data-delay="0.2s">Minimal Menz Style</h1>
                                <p data-animation="fadeInUp" data-delay="0.4s">Consectetur adipisicing elit. Laborum
                                    fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla
                                    earum.</p>
                                <a href="#" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="items-product1 pt-30">
        <div class="container">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-items mb-20">
                            <div class="items-img">
                                <img src="../../static/client_assets/img/logo/logo.png" alt="Product Image">
                            </div>
                            <div class="items-details">
                                <h4><a href="pro-details.php">Men's Fashion</a></h4>
                                <a href="pro-details.php" class="browse-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <div class="latest-items section-padding fix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12">
                    <div class="nav-button">

                        <nav>
                            <div class="nav-tittle">
                                <h2>Trending This Week</h2>
                            </div>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one"
                                   role="tab" aria-controls="nav-one" aria-selected="true">Men</a>
                                <a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" href="#nav-two" role="tab"
                                   aria-controls="nav-two" aria-selected="false">Women</a>
                                <a class="nav-link" id="nav-three-tab" data-bs-toggle="tab" href="#nav-three" role="tab"
                                   aria-controls="nav-three" aria-selected="false">Baby</a>
                                <a class="nav-link" id="nav-four-tab" data-bs-toggle="tab" href="#nav-four" role="tab"
                                   aria-controls="nav-four" aria-selected="false">Fashion</a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

                    <div class="latest-items-active">
                        <?php foreach ($products as $product): ?>
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="/client/product/detail/<?php echo htmlspecialchars($product['id']); ?>">
                                            <img src="/image/<?php echo htmlspecialchars($product['thumbnail']); ?>" alt="<?php echo htmlspecialchars($product['thumbnail']); ?>" style="max-width: 100%; max-height: 100%;">
                                        </a>
                                        <div class="socal_icon">
                                            <form action="/client/cart/addToCart/<?php echo htmlspecialchars($product['id']); ?>" method="get">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>"/>
                                                <input type="hidden" name="quantity" value="1" />
                                                <button class="add-to-cart-link"
                                                        onclick="return confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng không?')">
                                                    <i class="ti-shopping-cart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="/client/product/detail/<?php echo htmlspecialchars($product['id']); ?>"><?php echo htmlspecialchars($product['productName']); ?></a></h3>
                                        <div class="properties-footer">
                                            <div class="price">
                                                <span><?php echo number_format($product['salePrice'], 0, '.', ',') . ' VND'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-11">

                    <div class="h1-testimonial-active">

                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <h2>Customer Testimonial</h2>
                                    <p>Everybody is different, which is why we offer styles for every body. Laborum fuga
                                        incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla
                                        earum.</p>
                                </div>

                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="../../static/client_assets/img/gallery/founder-img.png" alt="Founder Image">
                                    </div>
                                    <div class="founder-text">
                                        <span>Petey Cruiser</span>
                                        <p>Designer at Colorlib</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <h2>Customer Testimonial</h2>
                                    <p>Everybody is different, which is why we offer styles for every body. Laborum fuga
                                        incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla
                                        earum.</p>
                                </div>

                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="../../static/client_assets/img/gallery/founder-img.png" alt="Founder Image">
                                    </div>
                                    <div class="founder-text">
                                        <span>Petey Cruiser</span>
                                        <p>Designer at Colorlib</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="latest-items section-padding fix">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle text-center mb-40">
                    <h2>You May Like</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="latest-items-active">
                <?php foreach ($products as $product): ?>
                    <div class="properties pb-30">
                        <div class="properties-card">
                            <div class="properties-img">
                                <a href="/client/product/detail/<?php echo htmlspecialchars($product['id']); ?>">
                                    <img src="/image/<?php echo htmlspecialchars($product['thumbnail']); ?>" alt="<?php echo htmlspecialchars($product['thumbnail']); ?>" style="max-width: 100%; max-height: 100%;">
                                </a>

                                <div class="socal_icon">
                                    <a href="#"><i class="ti-shopping-cart"></i></a>
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-zoom-in"></i></a>
                                </div>
                            </div>
                            <div class="properties-caption properties-caption2">
                                <h3><a href="/client/product/detail/<?php echo htmlspecialchars($product['id']); ?>"><?php echo htmlspecialchars($product['productName']); ?></a></h3>
                                <div class="properties-footer">
                                    <div class="price">
                                        <span><?php echo number_format($product['salePrice'], 0, '.', ',') . ' VND'; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="home-blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">

                    <div class="section-tittle text-center mb-40">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.php"><img src="../../static/client_assets/img/gallery/blog1.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.php">What Curling Irons Are The Best Ones</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure,
                                delectus dignissimos facilis neque nulla earum.</p>
                            <a href="pro-details.php" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.php"><img src="../../static/client_assets/img/gallery/blog2.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.php">Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure,
                                delectus dignissimos facilis neque nulla earum.</p>
                            <a href="pro-details.php" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <a href="pro-details.php"><img src="../../static/client_assets/img/gallery/blog3.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blogs-cap">
                            <span>Fashion Tips</span>
                            <h5><a href="pro-details.php">What Curling Irons Are The Best Ones</a></h5>
                            <p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure,
                                delectus dignissimos facilis neque nulla earum.</p>
                            <a href="pro-details.php" class="red-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="categories-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="../../static/client_assets/img/icon/services1.svg" alt="Fast & Free Delivery">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="../../static/client_assets/img/icon/services2.svg" alt="Secure Payment">
                        </div>
                        <div class="cat-cap">
                            <h5>Secure Payment</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="../../static/client_assets/img/icon/services3.svg" alt="Money Back Guarantee">
                        </div>
                        <div class="cat-cap">
                            <h5>Money Back Guarantee</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="cat-icon">
                            <img src="../../static/client_assets/img/icon/services4.svg" alt="Online Support">
                        </div>
                        <div class="cat-cap">
                            <h5>Online Support</h5>
                            <p>Free delivery on all orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    <input type="text" placeholder="Enter your email">
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
                                    <a href="index.php"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"></a><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
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
                                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                    All rights reserved | This template is made with <i class="fa fa-heart color-danger"
                                                                                        aria-hidden="true"></i> by <a
                                            href="https://colorlib.com" target="_blank"
                                            rel="nofollow noopener">Colorlib</a></p>
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
            <div class="arrow arrow-one">
            </div>
            <div class="arrow arrow-two">
            </div>
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

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"842605dd89cc1072","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>
</html>
