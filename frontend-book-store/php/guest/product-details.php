<?php
// product_details.php

// Bạn có thể thêm logic PHP ở đây nếu cần thiết, ví dụ: lấy thông tin sản phẩm từ cơ sở dữ liệu
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
    <link rel="stylesheet" href="../../static/client_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../static/client_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../static/client_assets/css/slicknav.css">
    <link rel="stylesheet" href="../../static/client_assets/css/flaticon.css">
    <link rel="stylesheet" href="../../static/client_assets/css/animate.min.css">
    <link rel="stylesheet" href="../../static/client_assets/css/price_rangs.css">
    <link rel="stylesheet" href="../../static/client_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../static/client_assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../static/client_assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../static/client_assets/css/slick.css">
    <link rel="stylesheet" href="../../static/client_assets/css/nice-select.css">
    <link rel="stylesheet" href="../../static/client_assets/css/style.css">
    <style>
      .content-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .image-below-paragraph {
        width: 100%;
        margin-top: 10px;
      }

      .fit-image {
        max-width: 300px;
        max-height: 300px;
        width: auto;
        height: auto;
      }

      .image-below-paragraph {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .image-container {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <!-- Preloader -->
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
                    <h2>Product Details</h2>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                          <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                          <a href="#">Product Details</a>
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

      <!-- Product Details Section -->
      <div class="services-area2 pt-50">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12">
                  <div class="single-services d-flex align-items-center mb-0">
                    <div class="features-img">
                      <!-- Hình ảnh sản phẩm -->
                      <img src="../../static/client_assets/img/gallery/sample_product_thumbnail.jpg" class="fit-image" alt="Sample Product">
                    </div>
                    <div class="features-caption">
                      <!-- Tên sản phẩm -->
                      <h3>Sample Product Name</h3>
                      <!-- Giá sản phẩm -->
                      <div class="price">
                        <span>1,299,000 VND</span>
                      </div>
                      <!-- Đánh giá sản phẩm -->
                      <div class="review">
                        <div class="rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p>(120 Review)</p>
                      </div>
                      <!-- Nút thêm vào giỏ hàng và chia sẻ -->
                      <a href="/login" class="white-btn mr-10">Add to Cart</a>
                      <a href="#" class="border-btn share-btn">
                        <i class="fas fa-share-alt"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Mô tả sản phẩm và hình ảnh bổ sung -->
        <section class="our-client section-padding best-selling">
          <div class="container">
            <!-- Mô tả sản phẩm -->
            <p>
              Đây là mô tả chi tiết về sản phẩm. Sản phẩm này được làm từ chất liệu cao cấp, đảm bảo chất lượng và độ bền. Thiết kế hiện đại, phù hợp với nhiều phong cách thời trang khác nhau.
            </p>
            <!-- Hình ảnh bổ sung -->
            <div class="image-below-paragraph">
              <div class="image-container">
                <img src="../../static/client_assets/img/gallery/sample_image1.jpg" alt="Sample Image 1" style="max-width: 480px; max-height: 480px;" />
              </div>
              <div class="description" style="align-content: center">
                <p>Mô tả hình ảnh 1: Sản phẩm trong môi trường thực tế.</p>
              </div>
            </div>
            <div class="image-below-paragraph">
              <div class="image-container">
                <img src="../../static/client_assets/img/gallery/sample_image2.jpg" alt="Sample Image 2" style="max-width: 480px; max-height: 480px;" />
              </div>
              <div class="description" style="align-content: center">
                <p>Mô tả hình ảnh 2: Chi tiết thiết kế của sản phẩm.</p>
              </div>
            </div>
            <!-- Thêm các hình ảnh và mô tả tương tự nếu cần -->
          </div>
        </section>

        <!-- Bình luận và Form bình luận -->
        <section style="margin-left: 50px">
          <div class="comments-area">
            <h4>05 Comments</h4>
            <!-- Comment 1 -->
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="../../static/client_assets/img/blog/comment_1.png" alt="User Comment 1" />
                  </div>
                  <div class="desc">
                    <p class="comment">
                      Đây là bình luận mẫu. Sản phẩm thật tuyệt vời và chất lượng cao!
                    </p>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <h5><a href="#">John Doe</a></h5>
                        <p class="date">April 20, 2024 at 3:12 pm</p>
                      </div>
                      <div class="reply-btn">
                        <a href="#" class="btn-reply text-uppercase">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Comment 2 -->
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="../../static/client_assets/img/blog/comment_2.png" alt="User Comment 2" />
                  </div>
                  <div class="desc">
                    <p class="comment">
                      Sản phẩm này thực sự làm tôi hài lòng. Tôi sẽ mua thêm những sản phẩm khác của bạn!
                    </p>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <h5><a href="#">Jane Smith</a></h5>
                        <p class="date">April 21, 2024 at 10:45 am</p>
                      </div>
                      <div class="reply-btn">
                        <a href="#" class="btn-reply text-uppercase">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Comment 3 -->
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="../../static/client_assets/img/blog/comment_3.png" alt="User Comment 3" />
                  </div>
                  <div class="desc">
                    <p class="comment">
                      Tôi đã sử dụng sản phẩm này trong vài tuần và nó hoạt động rất tốt.
                    </p>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <h5><a href="#">Emily Johnson</a></h5>
                        <p class="date">April 22, 2024 at 1:30 pm</p>
                      </div>
                      <div class="reply-btn">
                        <a href="#" class="btn-reply text-uppercase">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Thêm các comment khác nếu cần -->
          </div>
          <div class="comment-form">
            <h4>Leave a Reply</h4>
            <form
              class="form-contact comment_form"
              action="#"
              id="commentForm"
            >
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <textarea
                      class="form-control w-100"
                      name="comment"
                      id="comment"
                      cols="30"
                      rows="9"
                      placeholder="Write Comment"
                    ></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input
                      class="form-control"
                      name="name"
                      id="name"
                      type="text"
                      placeholder="Name"
                      required
                    />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input
                      class="form-control"
                      name="email"
                      id="email"
                      type="email"
                      placeholder="Email"
                      required
                    />
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <input
                      class="form-control"
                      name="website"
                      id="website"
                      type="text"
                      placeholder="Website"
                    />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button
                  type="submit"
                  class="button button-contactForm btn_1 boxed-btn"
                >
                  Post Comment
                </button>
              </div>
            </form>
          </div>
        </section>
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
                      <input type="text" placeholder="Enter your email" />
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
                      <a href="index.php"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"></a>
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
    <script src="../../static/client_assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../../static/client_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../../static/client_assets/js/popper.min.js"></script>
    <script src="../../static/client_assets/js/bootstrap.min.js"></script>

    <script src="../../static/client_assets/js/owl.carousel.min.js"></script>
    <script src="../../static/client_assets/js/slick.min.js"></script>
    <script src="../../static/client_assets/js/jquery.slicknav.min.js"></script>

    <script src="../../static/client_assets/js/wow.min.js"></script>
    <script src="../../static/client_assets/js/jquery.magnific-popup.js"></script>
    <script src="../../static/client_assets/js/jquery.nice-select.min.js"></script>
    <script src="../../static/client_assets/js/jquery.counterup.min.js"></script>
    <script src="../../static/client_assets/js/waypoints.min.js"></script>
    <script src="../../static/client_assets/js/price_rangs.js"></script>

    <script src="../../static/client_assets/js/contact.js"></script>
    <script src="../../static/client_assets/js/jquery.form.js"></script>
    <script src="../../static/client_assets/js/jquery.validate.min.js"></script>
    <script src="../../static/client_assets/js/mail-script.js"></script>
    <script src="../../static/client_assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="../../static/client_assets/js/plugins.js"></script>
    <script src="../../static/client_assets/js/main.js"></script>

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
      data-cf-beacon='{"rayId":"84261b39a8b0079f","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
      crossorigin="anonymous"
    ></script>
  </body>
</html>
