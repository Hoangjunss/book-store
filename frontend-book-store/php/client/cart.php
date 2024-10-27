<?php
// cart.php

// Định nghĩa các biến tĩnh để thay thế dữ liệu động
$email = "user@example.com"; // Thay thế bằng email người dùng thực tế
$products = [
    [
        'id' => 1,
        'cartId' => 101,
        'thumbnail' => "../../static/client_assets/img/products/product1.jpg",
        'productName' => "Áo Thun Nam",
        'priceOfOne' => 299000,
        'quantity' => 2,
        'totalPrice' => 598000
    ],
    [
        'id' => 2,
        'cartId' => 102,
        'thumbnail' => "../../static/client_assets/img/products/product2.jpg",
        'productName' => "Quần Jeans Nam",
        'priceOfOne' => 499000,
        'quantity' => 1,
        'totalPrice' => 499000
    ],
    [
        'id' => 3,
        'cartId' => 103,
        'thumbnail' => "../../static/client_assets/img/products/product3.jpg",
        'productName' => "Giày Sneaker Nam",
        'priceOfOne' => 799000,
        'quantity' => 1,
        'totalPrice' => 799000
    ],
    // Thêm các sản phẩm khác nếu cần
];
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Shop | eCommerce</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    .quantity-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .quantity-container .tru,
    .quantity-container .cong {
      flex: 0 0 auto;
    }
    .quantity-container .quantity-amount {
      flex: 0 0 60px;
    }
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
                <h2>Cart</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                      <a href="/client/home">Home</a><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                    </li>
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cart Area -->
  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th scope="col">
                <div class="form-check">
                  <input class="form-check-input" id="selectAllCheckbox" onclick="toggleCheckboxes(this)" type="checkbox" value="" >
                </div>
              </th>
              <th scope="col">Ảnh</th>
              <th scope="col">Sản phẩm</th>
              <th scope="col">Giá</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Thành tiền</th>
              <th scope="col">Xoá</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
              <input type="hidden" name="idGioHangChiTiet" value="<?php echo htmlspecialchars($product['id']); ?>">
              <tr>
                <td>
                  <div class="form-check">
                    <span class="id" hidden data-id="<?php echo htmlspecialchars($product['id']); ?>"></span>
                    <span class="id-cart" hidden data-id="<?php echo htmlspecialchars($product['cartId']); ?>"></span>
                    <input class="form-check-input" name="options[]" value="<?php echo htmlspecialchars($product['id']); ?>" onchange="updatePrice(this)" type="checkbox">
                  </div>
                </td>
                <td>
                  <div class="media product-thumbnail">
                    <div class="d-flex">
                      <img src="<?php echo htmlspecialchars($product['thumbnail']); ?>" alt="Product Image" /><!-- Đã thay thế th:src bằng src với đường dẫn tĩnh -->
                    </div>
                    <div class="media-body">
                      <!-- Bạn có thể thêm thông tin khác nếu cần -->
                    </div>
                  </div>
                </td>
                <td class="product-name">
                  <p><?php echo htmlspecialchars($product['productName']); ?></p><!-- Đã thay thế th:text bằng echo PHP với dữ liệu tĩnh -->
                </td>
                <td class="price">
                  <?php echo number_format($product['priceOfOne'], 0, '.', ',') . ' VND'; ?><!-- Đã thay thế th:text bằng echo PHP với dữ liệu tĩnh -->
                </td>
                <input type="hidden" class="priceValue" value="<?php echo htmlspecialchars($product['priceOfOne']); ?>">
                <td>
                  <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px">
                    <div class="tru" onclick="handlerChange(this)">
                      <button class="btn btn-outline-black" type="button">&minus;</button>
                    </div>

                    <input
                            aria-describedby="button-addon1"
                            aria-label="Example text with button addon"
                            class="form-control text-center quantity-amount"
                            placeholder=""
                            value="<?php echo htmlspecialchars($product['quantity']); ?>"
                            type="text"
                            name="soLuong"
                            onchange="handleChangeOfInput(this)"
                            style="width: 60px; margin: 0 5px; text-align: center; margin-top: 30px; margin-right: 50px; margin-bottom: 30px"
                    />

                    <div class="cong" onclick="handlerChange(this)">
                      <button class="btn btn-outline-black" type="button">&plus;</button>
                    </div>
                  </div>
                </td>

                <td>
                  <h5 class="thanhtien"><?php echo number_format($product['totalPrice'], 0, '.', ',') . ' VND'; ?></h5><!-- Đã thay thế th:text bằng echo PHP với dữ liệu tĩnh -->
                </td>
                <input type="hidden" class="thanhtienValue" value="<?php echo htmlspecialchars($product['totalPrice']); ?>">
                <td>
                  <button class="btn btn-black btn-sm delete-button confirmDelete" data-id="<?php echo htmlspecialchars($product['id']); ?>">
                    X
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn" href="/client/product">Continue Shopping</a><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
    <div class="col-md-6 pl-5" style="margin-left: 330px;">
      <div class="row justify-content-end">
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12 text-right border-bottom mb-5">
              <h3 class="text-black h4 text-uppercase">Giỏ hàng</h3>
            </div>
          </div>

          <div class="row mb-5">
            <div class="col-md-6">
              <span class="text-black">Tổng tiền</span>
            </div>
            <div class="col-md-6 text-right">
              <strong class="text-black total"><?php echo number_format(array_reduce($products, function($carry, $item) {
                  return $carry + $item['totalPrice'];
              }, 0), 0, '.', ',') . ' VND'; ?></strong><!-- Tính tổng tiền từ dữ liệu tĩnh -->
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <button class="btn btn-black btn-lg py-3 btn-block" onclick="checkOut()">
                Mua hàng
              </button>

              <!-- Modal Xác Nhận -->
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
            </div>
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

<!-- Cloudflare Insights -->
<script
        defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"84261ac02d5d079f","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"
></script>

<!-- Inline JavaScript with Dữ liệu set cứng và comment các phần đã loại bỏ -->
<script>
  // Đã loại bỏ các đoạn JavaScript fetch và thay thế bằng dữ liệu tĩnh
  // Mọi thao tác cập nhật giá và số lượng đã được xử lý trực tiếp với dữ liệu tĩnh

  function updatePrice(checkbox) {
    // Hàm cập nhật tổng tiền khi chọn hoặc bỏ chọn sản phẩm
    let total = 0;
    document.querySelectorAll("tbody input[type='checkbox']").forEach(function(item) {
      if (item.checked) {
        let row = item.closest("tr");
        let price = parseFloat(row.querySelector(".thanhtienValue").value);
        total += price;
      }
    });
    document.querySelector(".total").innerText = formatCurrency(total) + ' VND';
  }

  function formatCurrency(amount) {
    return new Intl.NumberFormat('vi-VN', {
      style: 'currency',
      currency: 'VND'
    }).format(amount).replace('₫', ' VND');
  }

  function checkOut() {
    var checkboxes = document.querySelectorAll("tbody input[type='checkbox']");
    var selectedOptions = [];

    checkboxes.forEach(function (checkbox) {
      if (checkbox.checked) {
        var productId = checkbox.value;
        var quantityInput = checkbox.closest("tr").querySelector(".quantity-amount");
        if (quantityInput) {
          var quantity = quantityInput.value;
          selectedOptions.push(encodeURIComponent(productId) + "-" + encodeURIComponent(quantity));
        } else {
          console.error("Quantity input not found for product with ID: " + productId);
        }
      }
    });

    if (selectedOptions.length === 0) {
      // Hiển thị modal thông báo
      $('#myModal').modal('show');
      return;
    }

    window.location.href = '/client/payment/checkout?options=' + selectedOptions.join(',');
  }

  // Các hàm xử lý tăng giảm số lượng và cập nhật thành tiền
  function handleChangeOfInput(input) {
    let row = input.closest("tr");
    let price = parseFloat(row.querySelector(".priceValue").value);
    let quantity = parseInt(input.value);

    if (isNaN(quantity) || quantity < 1) {
      $('#quantityExceedErrorModal').modal('show');
      input.value = 1;
      quantity = 1;
    }

    let newTotal = price * quantity;
    row.querySelector(".thanhtienValue").value = newTotal;
    row.querySelector(".thanhtien").innerText = formatCurrency(newTotal) + ' VND';

    let checkbox = row.querySelector("input[type='checkbox']");
    if (checkbox.checked) {
      updatePrice(checkbox);
    }
  }

  function handlerChange(e) {
    let row = e.closest("tr");
    let quantityInput = row.querySelector(".quantity-amount");
    let currentQuantity = parseInt(quantityInput.value);
    let newQuantity = currentQuantity;

    if (e.classList.contains("cong")) {
      newQuantity = currentQuantity + 1;
    } else if (e.classList.contains("tru")) {
      newQuantity = currentQuantity - 1;
    }

    if (isNaN(newQuantity) || newQuantity < 1) {
      $('#quantityExceedErrorModal').modal('show');
      return;
    }

    quantityInput.value = newQuantity;
    handleChangeOfInput(quantityInput);
  }

  function toggleCheckboxes(masterCheckbox) {
    var checkboxes = document.querySelectorAll("tbody input[type='checkbox']");
    checkboxes.forEach(function(item) {
      item.checked = masterCheckbox.checked;
      updatePrice(item);
    });
  }

  // Đã loại bỏ các đoạn JavaScript fetch và AJAX không cần thiết
</script>
</body>
</html>
