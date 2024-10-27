<?php
// order_confirmation.php

// Bạn có thể thêm logic PHP ở đây nếu cần thiết, ví dụ: kiểm tra trạng thái đơn hàng
// Đối với dữ liệu set cứng, chúng ta sẽ định nghĩa các biến tĩnh dưới đây
$orderSuccess = true; // Thay đổi giá trị này thành false để kiểm tra thông báo không thành công
$orderInfo = "12345";
$customerFullName = "Nguyễn Văn A";
$email = "nguyenvana@example.com";
$detail = "123 Đường ABC";
$ward = "Phường 1";
$district = "Quận 1";
$province = "Thành phố Hồ Chí Minh";
$transactionNo = "1"; // '0' cho thất bại, khác '0' cho thành công
$total = 299000; // Tổng tiền đơn hàng
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop | eCommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../static/client_assets/img/icon/favicon.png"><!-- Dynamic path replaced with static path -->

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
            background-color: #4CAF50; /* Green color, you can change this */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-to-cart-link:hover {
            background-color: #45a049; /* Darker green color on hover */
        }
    </style>
</head>
<body>

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="../../static/client_assets/img/icon/loder.png" alt="Loader"><!-- Dynamic path replaced with static path -->
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
    <?php if ($orderSuccess): ?>
        <div>
            <script>
                alert("Đơn hàng đã được tạo thành công!");
            </script>
        </div>
    <?php else: ?>
        <div>
            <script>
                alert("Không thể tạo đơn hàng!");
            </script>
        </div>
    <?php endif; ?>

    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="thankyou">
                        <div class="logo text-center mb5">
                            <img src="../../static/client_assets/img/logo/logo.png" alt="Logo"><!-- Dynamic path replaced with static path -->
                        </div>
                        <div class="top-section mt-5">
                            <div class="row ">
                                <div class="col-lg-2">
                                    <span class="lar la-check-circle"></span>
                                </div>
                                <div class="col-lg-10">
                                    <p>Đơn hàng <span>#<?php echo htmlspecialchars($orderInfo); ?></span></p><!-- Dynamic data replaced with static data -->
                                    <?php if ($orderSuccess): ?>
                                        <h3 class="heading-3">Cảm ơn <?php echo htmlspecialchars($customerFullName); ?>!</h3><!-- Dynamic data replaced with static data -->
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="map-location mt-5 mb-5s">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7449.057577233779!2d105.52522339491696!3d21.01151768801886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345bb9d76a7e03%3A0x244a83c591357341!2zRlBUIFNvZnR3YXJlIEjDsmEgTOG6oWM!5e0!3m2!1svi!2s!4v1709995329174!5m2!1svi!2s"
                                    width="600" height="300" frameborder="0" style="border: 0" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            <?php if ($transactionNo != '0'): ?>
                                <h3 class="heading-3">Đơn hàng của bạn đã được tạo thành công!</h3><!-- Dynamic data replaced with static data -->
                            <?php else: ?>
                                <h3 class="heading-3">Đơn hàng của bạn đã bị huỷ bỏ do lỗi</h3><!-- Dynamic data replaced with static data -->
                            <?php endif; ?>
                        </div>

                        <div class="map-location mt-5 mb-5s">
                            <div class="heading-section">
                                <h5>Thông tin khách hàng</h5>
                            </div>
                            <div class="row ">
                                <div class="col-lg-6">
                                    <h6 class="heading-3">Thông tin liên lạc</h6>
                                    <p><?php echo htmlspecialchars($email); ?></p><!-- Dynamic data replaced with static data -->
                                    <h6 class="heading-3">Địa chỉ giao hàng</h6>
                                    <address class="address">
                                        <span><?php echo htmlspecialchars($customerFullName); ?></span><br>
                                        <span><?php echo htmlspecialchars($detail) . ','; ?></span><br>
                                        <span><?php echo htmlspecialchars($ward) . ','; ?></span> <br>
                                        <span><?php echo htmlspecialchars($district) . ','; ?></span> <br>
                                        <span><?php echo htmlspecialchars($province) . ','; ?></span> <br>
                                        <span><?php echo htmlspecialchars($email); ?></span><!-- Assuming phone is same as email, adjust if necessary -->
                                    </address>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="heading-3">Phương thức trả tiền</h6>
                                    <p>Trả tiền khi giao(COD) - <span><?php echo number_format($total, 0, '.', ',') . ' VND'; ?></span></p><!-- Dynamic data replaced with static data -->
                                    <h6 class="heading-3">Địa chỉ trả tiền</h6>
                                    <address class="address">
                                        <span><?php echo htmlspecialchars($customerFullName); ?></span><br>
                                        <span><?php echo htmlspecialchars($detail) . ','; ?></span><br>
                                        <span><?php echo htmlspecialchars($ward) . ','; ?></span> <br>
                                        <span><?php echo htmlspecialchars($district) . ','; ?></span> <br>
                                        <span><?php echo htmlspecialchars($province) . ','; ?></span> <br>
                                        <span><?php echo htmlspecialchars($email); ?></span><!-- Assuming phone is same as email, adjust if necessary -->
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="map-location mt-5 mb-5s">
                            <div class="row ">
                                <div class="col-lg-6 text-center">
                                    <a href="../guest/view-products.php" class="btn btn-outline-primary">Tiếp tục mua hàng</a><!-- Dynamic path replaced with static path -->
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
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
                                    <a href="../guest/index.php"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"></a><!-- Dynamic path replaced with static path -->
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
                                    <li><a href="/client/order">Track Your Order</a></li><!-- Dynamic path replaced with static path -->
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
