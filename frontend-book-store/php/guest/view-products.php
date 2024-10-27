<?php
// category.php

// Bạn có thể thêm logic PHP ở đây nếu cần thiết, ví dụ: lấy danh mục sản phẩm từ cơ sở dữ liệu
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Shop | eCommerce</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="../../static/client_assets/img/icon/favicon.png">

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

    .price_value span {
      margin: 0 5px; /* Khoảng cách 5px giữa các phần tử span */
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
        <img src="../../static/client_assets/img/icon/loder.png" alt="Loader">
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
                  <li><a href="#">My Wishlist</a></li>
                  <li><a href="#">Track Your Order</a></li>
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
            <a href="index.php"><img src="../../static/client_assets/img/logo/logo.png" alt="Logo"></a>
          </div>

          <div class="main-menu d-none d-lg-block">
            <nav>
              <ul id="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="view-products.php">Products</a></li>
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
              <li><a href="/login"><span class="flaticon-user"></span></a></li>
              <li class="cart"><a href="/login"><span class="flaticon-shopping-cart"></span></a></li>
            </ul>
          </div>
        </div>

        <div class="search_input" id="search_input_box">
          <form class="search-inner d-flex justify-content-between">
            <input
                    type="text"
                    class="form-control"
                    id="search_input"
                    placeholder="Search Here"
            />
            <button type="submit" class="btn"></button>
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

<!-- Main Content -->
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
                <h2>Category</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                      <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Category</a>
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

  <!-- Listing Area -->
  <div class="listing-area pt-50 pb-50">
    <div class="container">
      <div class="row">
        <!-- Sidebar -->
        <div class="col-xl-3 col-lg-4 col-md-4">
          <div class="category-listing mb-50">
            <div class="single-listing">
              <div class="select-Categories pb-30">

                <!-- Search by Product Name -->
                <div class="select-job-items2 mb-30">
                  <div class="col-xl-12">
                    <input type="text" class="form-control" id="productName" placeholder="Tên sản phẩm">
                  </div>
                </div>

                <!-- Select Category -->
                <div class="select-job-items2 mb-30">
                  <div class="col-xl-12">
                    <select class="form-select form-control mb-4 col-4" id="category" aria-label="Default select example">
                      <option value="0">Loại sản phẩm</option>
                      <option value="1">Áo Thun</option>
                      <option value="2">Quần Jeans</option>
                      <option value="3">Giày Sneaker</option>
                      <option value="4">Phụ Kiện</option>
                      <!-- Thêm các loại sản phẩm khác nếu cần -->
                    </select>
                  </div>
                </div>

                <!-- Price Range Filter -->
                <div class="select-job-items2 mb-30">
                  <aside
                          class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40"
                  >
                    <div class="small-tittle">
                      <h4>Lọc theo giá</h4>
                    </div>
                    <div class="widgets_inner">
                      <div class="range_item">
                        <input type="text" class="js-range-slider" value="" />
                        <div class="d-flex align-items-center">
                          <div class="price_value d-flex justify-content-center">
                            <input type="hidden" class="js-input-from" id="saleStartPrice" value="0" />
                            <input type="hidden" class="js-input-to" id="saleEndPrice" value="1000" />
                          </div>
                        </div>
                      </div>
                    </div>

                  </aside>
                </div>

                <!-- Search Button -->
                <button id="btnSearch" onclick="searchCondition(0,12)" class="btn btn-primary">Tìm kiếm</button>
              </div>

            </div>
          </div>
        </div>

        <!-- Product Listing -->
        <div class="col-xl-9 col-lg-8 col-md-8">
          <div class="latest-items latest-items2">
            <div class="row" id="productContainer">
              <!-- Sample Product 1 -->
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="properties pb-30">
                  <div class="properties-card">
                    <div class="properties-img">
                      <a href="product-details.php">
                        <img src="../../static/client_assets/img/products/defbookcover-min.jpg" alt="Áo Thun Nam"/>
                      </a>
                      <div class="socal_icon">
                        <form action="/login" method="post">
                          <input type="hidden" name="id" value="1"/>
                          <input type="hidden" name="quantity" value="1" />
                          <button class="add-to-cart-link" onclick="return confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng không?')">
                            <i class="ti-shopping-cart"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="properties-caption properties-caption2">
                      <h3>
                        <a href="product-details.php">Áo Thun Nam</a>
                      </h3>
                      <div class="properties-footer">
                        <div class="price">
                          <span>299,000 VND</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sample Product 2 -->
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="properties pb-30">
                  <div class="properties-card">
                    <div class="properties-img">
                      <a href="product-details.php">
                        <img src="../../static/client_assets/img/products/defbookcover-min.jpg" alt="Quần Jeans Nam"/>
                      </a>
                      <div class="socal_icon">
                        <form action="/login" method="post">
                          <input type="hidden" name="id" value="2"/>
                          <input type="hidden" name="quantity" value="1" />
                          <button class="add-to-cart-link" onclick="return confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng không?')">
                            <i class="ti-shopping-cart"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="properties-caption properties-caption2">
                      <h3>
                        <a href="product-details.php">Quần Jeans Nam</a>
                      </h3>
                      <div class="properties-footer">
                        <div class="price">
                          <span>499,000 VND</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sample Product 3 -->
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="properties pb-30">
                  <div class="properties-card">
                    <div class="properties-img">
                      <a href="product-details.php">
                        <img src="../../static/client_assets/img/products/defbookcover-min.jpg" alt="Giày Sneaker Nam"/>
                      </a>
                      <div class="socal_icon">
                        <form action="/login" method="post">
                          <input type="hidden" name="id" value="3"/>
                          <input type="hidden" name="quantity" value="1" />
                          <button class="add-to-cart-link" onclick="return confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng không?')">
                            <i class="ti-shopping-cart"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="properties-caption properties-caption2">
                      <h3>
                        <a href="product-details.php">Giày Sneaker Nam</a>
                      </h3>
                      <div class="properties-footer">
                        <div class="price">
                          <span>799,000 VND</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Thêm các sản phẩm khác tương tự -->
              <!-- Ví dụ thêm sản phẩm 4 -->
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="properties pb-30">
                  <div class="properties-card">
                    <div class="properties-img">
                      <a href="product-details.php">
                        <img src="../../static/client_assets/img/products/defbookcover-min.jpg" alt="Phụ Kiện Nam"/>
                      </a>
                      <div class="socal_icon">
                        <form action="/login" method="post">
                          <input type="hidden" name="id" value="4"/>
                          <input type="hidden" name="quantity" value="1" />
                          <button class="add-to-cart-link" onclick="return confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng không?')">
                            <i class="ti-shopping-cart"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                    <div class="properties-caption properties-caption2">
                      <h3>
                        <a href="product-details.php">Phụ Kiện Nam</a>
                      </h3>
                      <div class="properties-footer">
                        <div class="price">
                          <span>199,000 VND</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Bạn có thể tiếp tục thêm các sản phẩm khác theo mẫu trên -->
            </div>
            <!-- Pagination -->
            <nav aria-label="...">
              <ul class="pagination" id="pageId" style="float: right;">
                <!-- Sample Pagination -->
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
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
                  <input type="text" placeholder="Enter your email" required />
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
                  <a href="index.php">
                    <img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo">
                  </a>
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
                  <li><a href="#">Track Your Order</a></li>
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
                  &copy;<script>document.write(new Date().getFullYear());</script>
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

<!-- Back to Top -->
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
  gtag("js", new Date());

  gtag("config", "UA-23581568-13");
</script>

<!-- Cloudflare Insights -->
<script
        defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"84260611187e1fb6","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"
></script>

<!-- Inline JavaScript -->
<!--
<script>
  $(document).ready(function () {
    initData();
  });

  function initData() {
    let page = 0;
    let size = 12;
    let objFilter = {
      name: null
    };
    getProducts(page, size, objFilter);
  }

  function formatDecimal(value) {
    return value.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  }

  function getProducts(page, size, objectFilter) {
    let container = $('#productContainer');
    container.empty();
    $.ajax({
      type: "POST",
      url: "http://localhost:8080/productListClient?page=" + page + "&size=" + size,
      contentType: "application/json",
      data: JSON.stringify(objectFilter),
      dataType: "json",
      success: function (response) {
        let products = response?.data?.content;

        for (let i = 0; i < products.length; i++) {
          let product = products[i];

          let formattedSalePrice = formatDecimal(product.salePrice);

          let productHtml = '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">' +
                  '<div class="properties pb-30">' +
                  '<div class="properties-card">' +
                  '<div class="properties-img">' +
                  '<a href="product-details.php' + product.id + '">' +
                  '<img src="' + product.thumbnail + '" alt=""/>' +
                  '</a>' +
                  '<div class="socal_icon">' +
                  '<form action="/login" method="post">' +
                  '<input type="hidden" name="id" value="' + product.id + '"/>' +
                  '<input type="hidden" name="quantity" value="1" />' +
                  '<button class="add-to-cart-link" onclick="return confirm(\'Bạn có muốn thêm sản phẩm này vào giỏ hàng không?\')">' +
                  '<i class="ti-shopping-cart"></i>' +
                  '</button>' +
                  '</form>' +
                  '</div>' +
                  '<div class="properties-caption properties-caption2">' +
                  '<h3>' +
                  '<a href="product-details.php' + product.id + '">' + product.productName + '</a>' +
                  '</h3>' +
                  '<div class="properties-footer">' +
                  '<div class="price">' +
                  '<span>' + formattedSalePrice + ' VND</span>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>';

          $('#productContainer').append(productHtml);
        }

        // Phân trang
        let totalPage = response.data.totalPages;
        let currentPage = response.data.pageable.pageNumber;
        if (totalPage > 0){
          $("#pageId").empty();
          let pages = '<li class="page-item"><a class="page-link" onclick="changePage(' + (currentPage - 1)+ ',12,event)" href="#">Previous</a></li>';
          for (let i = 0; i < totalPage; i++) {
            if (currentPage === i){
              pages += '            <li class="page-item active">\n' +
                      '                <a class="page-link " onclick="changePage(' + i + ',12,event)" href="#">' + (i + 1) + '</a></li>\n' +
                      '            <li class="page-item">'
            }else {
              pages += '            <li class="page-item">\n' +
                      '                <a class="page-link" onclick="changePage(' + i + ',12,event)" href="#">' + (i + 1) + '</a></li>\n' +
                      '            <li class="page-item">'
            }

          }
          pages +='<li class="page-item"><a class="page-link" onclick="changePage(' + (currentPage + 1) + ',12,event)" href="#">Next</a></li>';
          $("#pageId").append(pages);
        }

      },
      error: function (error) {
        console.log(error);
      }
    });
  }

  function searchCondition(page,size){
    let filter = {};
    filter.productName= $("#productName").val() === '' ? null : $("#productName").val();
    filter.saleStartPrice = $("#saleStartPrice").val() === '' ? null : $("#saleStartPrice").val();
    filter.saleEndPrice = $("#saleEndPrice").val() === '' ? null : $("#saleEndPrice").val();
    filter.categoryId = $("#category").val() === '' ? null : $("#category").val();
    getProducts(page,size,filter);
  }

  function changePage(page,size,event){
    event.preventDefault();
    searchCondition(page,size);
  }

</script>
-->

</body>
</html>
