<?php
// checkout.php

// Định nghĩa các biến tĩnh để thay thế dữ liệu động
$customer = [
    'fullName' => 'Nguyễn Văn A',
    'phoneNumber' => '0123456789'
];
$email = "nguyenvana@example.com"; // Thay thế bằng email người dùng thực tế

$products = [
    [
        'id' => 1,
        'productEntity' => [
            'productName' => 'Áo Thun Nam'
        ],
        'quantity' => 2,
        'totalPrice' => 598000
    ],
    [
        'id' => 2,
        'productEntity' => [
            'productName' => 'Quần Jeans Nam'
        ],
        'quantity' => 1,
        'totalPrice' => 499000
    ],
    [
        'id' => 3,
        'productEntity' => [
            'productName' => 'Giày Sneaker Nam'
        ],
        'quantity' => 1,
        'totalPrice' => 799000
    ],
    // Thêm các sản phẩm khác nếu cần
];
$subtotal = array_reduce($products, function($carry, $item) {
    return $carry + $item['totalPrice'];
}, 0);

// Định nghĩa các tỉnh, quận/huyện, phường/xã tĩnh (ví dụ)
$provinces = [
    ['ProvinceID' => 1, 'ProvinceName' => 'Thành phố Hồ Chí Minh'],
    ['ProvinceID' => 2, 'ProvinceName' => 'Hà Nội'],
    // Thêm các tỉnh/thành khác
];

$districts = [
    ['DistrictID' => 101, 'DistrictName' => 'Quận 1', 'ProvinceID' => 1],
    ['DistrictID' => 102, 'DistrictName' => 'Quận 2', 'ProvinceID' => 1],
    ['DistrictID' => 201, 'DistrictName' => 'Ba Đình', 'ProvinceID' => 2],
    ['DistrictID' => 202, 'DistrictName' => 'Hoàn Kiếm', 'ProvinceID' => 2],
    // Thêm các quận/huyện khác
];

$wards = [
    ['WardCode' => 'W1', 'WardName' => 'Phường Bến Nghé', 'DistrictID' => 101],
    ['WardCode' => 'W2', 'WardName' => 'Phường Bến Thành', 'DistrictID' => 101],
    ['WardCode' => 'W3', 'WardName' => 'Phường Tân Bình', 'DistrictID' => 102],
    ['WardCode' => 'W4', 'WardName' => 'Phường Trung Liệt', 'DistrictID' => 201],
    ['WardCode' => 'W5', 'WardName' => 'Phường Đồng Xuân', 'DistrictID' => 202],
    // Thêm các phường/xã khác
];

// Định nghĩa phí vận chuyển tĩnh (ví dụ)
$shippingFee = 50000; // 50,000 VND

// Tính tổng tiền
$total = $subtotal + $shippingFee;
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
    <style>
        #province,
        #district,
        #ward {
            width: 428px;
            height: 40px;
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
    <!-- Hero Area -->
    <div class="hero-area section-bg2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider-area">
                        <div
                                class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center"
                        >
                            <div class="hero-caption hero-caption2">
                                <h2>Checkout</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item">
                                            <a href="/client/home">Home</a><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Checkout</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Area -->
    <section class="checkout_area">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>

                        <form action="/client/payment/pay" method="POST">
                            <div class="row">
                                <div class="col-md-6 form-group p_star">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="first"
                                            name="name"
                                            placeholder="Họ tên đầy đủ"
                                            value="<?php echo htmlspecialchars($customer['fullName']); ?>"
                                    />
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="number"
                                            name="number"
                                            placeholder="Số điện thoại"
                                            value="<?php echo htmlspecialchars($customer['phoneNumber']); ?>"
                                    />
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="email"
                                            name="email"
                                            placeholder="Email"
                                            value="<?php echo htmlspecialchars($email); ?>"
                                    />
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <select name="province" id="province">
                                        <option value="">Chọn tỉnh/thành</option>
                                        <?php foreach ($provinces as $province): ?>
                                            <option value="<?php echo htmlspecialchars($province['ProvinceID']); ?>">
                                                <?php echo htmlspecialchars($province['ProvinceName']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="error-province" style="color: red; display: none;">Vui lòng chọn tỉnh/thành phố.</div>
                                    <br>

                                    <select name="district" id="district">
                                        <option value="">Chọn quận/huyện</option>
                                        <?php
                                        // Lọc quận/huyện dựa trên tỉnh/thành đã chọn (ví dụ: ProvinceID = 1)
                                        $selectedProvinceId = 1; // Thay đổi giá trị này theo nhu cầu
                                        foreach ($districts as $district) {
                                            if ($district['ProvinceID'] == $selectedProvinceId) {
                                                echo '<option value="' . htmlspecialchars($district['DistrictID']) . '">' . htmlspecialchars($district['DistrictName']) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div id="error-district" style="color: red; display: none;">Vui lòng chọn quận/huyện.</div>
                                    <br>

                                    <select name="ward" id="ward">
                                        <option value="">Chọn phường/xã</option>
                                        <?php
                                        // Lọc phường/xã dựa trên quận/huyện đã chọn (ví dụ: DistrictID = 101)
                                        $selectedDistrictId = 101; // Thay đổi giá trị này theo nhu cầu
                                        foreach ($wards as $ward) {
                                            if ($ward['DistrictID'] == $selectedDistrictId) {
                                                echo '<option value="' . htmlspecialchars($ward['WardCode']) . '">' . htmlspecialchars($ward['WardName']) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div id="error-ward" style="color: red; display: none;">Vui lòng chọn phường/xã.</div>
                                    <br>

                                    <input type="hidden" id="saveProvince" name="saveProvince" value="">
                                    <input type="hidden" id="saveDistrict" name="saveDistrict" value="">
                                    <input type="hidden" id="saveWard" name="saveWard" value="">
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="detail"
                                            id="detail"
                                            placeholder="Địa chỉ cụ thể"
                                    />
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input
                                            type="number"
                                            class="form-control"
                                            id="shippingFee"
                                            name="shippingFee"
                                            placeholder="Phí vận chuyển"
                                            readonly
                                            value="<?php echo number_format($shippingFee, 0, '.', ',') . ' VND'; ?>"
                                    />
                                    <input type="hidden" id="shippingFeeResult" name="shippingFeeResult" value="<?php echo htmlspecialchars($shippingFee); ?>">
                                    <input type="hidden" id="subtotalResult" name="subtotalResult" value="<?php echo htmlspecialchars($subtotal); ?>">
                                    <input type="hidden" id="totalResult" name="totalResult" value="<?php echo htmlspecialchars($total); ?>">
                                </div>
                            </div>

                            <button type="button" class="btn btn-black" onclick="pay()" id="pay-btn">Proceed to VNPay</button>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product<span>Total</span> </a>
                                </li>
                                <?php foreach ($products as $product): ?>
                                    <li>
                                        <a href="#">
                                            <span><?php echo htmlspecialchars($product['productEntity']['productName']); ?></span>
                                            <span class="middle">x <?php echo htmlspecialchars($product['quantity']); ?></span>
                                            <span class="last"><?php echo number_format($product['totalPrice'], 0, '.', ',') . ' VND'; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal <span><?php echo number_format($subtotal, 0, '.', ',') . ' VND'; ?></span></a>
                                </li>
                                <li id="shippingFeeContainer">
                                    <a href="#">Shipping <span><?php echo number_format($shippingFee, 0, '.', ',') . ' VND'; ?></span></a>
                                </li>
                                <li id="totalContainer">
                                    <a href="#">Total <span><?php echo number_format($total, 0, '.', ',') . ' VND'; ?></span></a>
                                </li>
                            </ul>

                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector"/>
                                    <label for="f-option6">VNPay </label>
                                    <img src="../../static/client_assets/img/gallery/card.jpg" alt="Payment Image"><!-- Đã thay thế đường dẫn tĩnh -->
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Please send a check to Store Name, Store Street, Store
                                    Town, Store State / County, Store Postcode.
                                </p>
                            </div>
                            <div id="error-vnpay" style="color: red; display: none;">Bạn chưa bấm xác nhận thanh toán VnPay</div>

                            <div class="creat_account checkout-cap">
                                <input type="checkbox" id="f-option8" name="selector"/>
                                <label for="f-option8">
                                    I’ve read and accept the
                                    <a href="#">terms & conditions*</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Thông Báo -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Thông báo</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Vui lòng chọn ít nhất một mục để tiếp tục.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lỗi Số Lượng -->
        <div class="modal fade" id="quantityExceedErrorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Lỗi Số Lượng</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="quantityExceedErrorMessage">Số lượng sản phẩm trong giỏ hàng đang vượt quá số lượng tồn kho.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
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
                                    <a href="/client/home"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"></a><!-- Đã thay thế th:href và src bằng href và src với đường dẫn tĩnh -->
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
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p>
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                    All rights reserved | This template is made with
                                    <i class="fa fa-heart color-danger" aria-hidden="true"></i>
                                    by
                                    <a href="https://colorlib.com" target="_blank" rel="nofollow noopener">Colorlib</a>
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

<!-- Inline JavaScript với dữ liệu set cứng và comment các phần đã loại bỏ -->
<script>
    $(document).ready(function () {
        // Các hàm xử lý tỉnh, quận/huyện, phường/xã đã được thay thế bằng dữ liệu tĩnh

        // Hàm kiểm tra địa chỉ
        function checkLocation() {
            // Kiểm tra xem người dùng đã chọn giá trị trong từng dropdown hay chưa
            let provinceValue = $('#province').val();
            let districtValue = $('#district').val();
            let wardValue = $('#ward').val();

            $('#error-province').hide();
            $('#error-district').hide();
            $('#error-ward').hide();

            let hasError = false;

            if (provinceValue === '') {
                $('#error-province').show();
                hasError = true;
            }

            if (districtValue === '') {
                $('#error-district').show();
                hasError = true;
            }

            if (wardValue === '') {
                $('#error-ward').show();
                hasError = true;
            }

            return !hasError;
        }

        // Hàm thanh toán
        window.pay = function () {
            if (checkLocation()) {
                // Kiểm tra đã chọn phương thức thanh toán VNPay hay chưa
                if ($('#f-option6').is(':checked')) {
                    $('#error-vnpay').hide();

                    // Gửi dữ liệu form đến server để xử lý
                    $('form').submit();
                } else {
                    $('#error-vnpay').show();
                }
            }
        }
    });
</script>

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

<!-- Cloudflare Insights -->
<script
        defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"84261bbc3a85079f","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"
></script>
</body>
</html>
