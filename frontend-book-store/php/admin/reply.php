<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Shop | eCommerce</title>
    <meta name="description" content="A fully featured eCommerce shop."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../../static/client_assets/img/icon/favicon.png">

    <!-- App css -->
    <link href="../../static/client_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/slicknav.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/flaticon.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/price_rangs.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/themify-icons.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/slick.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/nice-select.css" rel="stylesheet" type="text/css">
    <link href="../../static/client_assets/css/style.css" rel="stylesheet" type="text/css">
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

        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
        /* Reset CSS */
        div, label {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 20px;
        }

        h1 {
            font-size: 1.5em;
            margin: 10px;
        }

        /****** Style Star Rating Widget *****/
        #rating {
            border: none;
            float: left;
        }

        #rating > input {
            display: none;
        }

        /* Ẩn input radio - vì chúng ta đã có label là GUI */
        #rating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        #rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        #rating > label {
            color: #ddd;
            float: right;
        }

        #rating > input:checked ~ label,
        #rating:not(:checked) > label:hover,
        #rating:not(:checked) > label:hover ~ label {
            color: #FFD700;
        }

        #rating > input:checked + label:hover,
        #rating > input:checked ~ label:hover,
        #rating > label:hover ~ input:checked ~ label,
        #rating > input:checked ~ label:hover ~ label {
            color: #FFED85;
        }
    </style>
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="../../static/client_assets/img/icon/loder.png" alt="loader">
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
                                    <li>Hello, admin@example.com</li> <!-- Thay thế bằng JavaScript nếu cần -->
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
                        <a href="/admin/home.html"><img src="../../static/client_assets/img/logo/logo.png" alt="Logo"></a>
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

<main>
    <div class="hero-area section-bg2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider-area">
                        <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                            <div class="hero-caption hero-caption2">
                                <h2>Product Details</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services-area2 pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="single-services d-flex align-items-center mb-0">
                                <input type="hidden" name="productId" value="<!-- Thay thế bằng giá trị tĩnh hoặc JavaScript -->">
                                <div class="features-img">
                                    <img src="../../static/client_assets/img/products/thumbnail-default.png" class="fit-image" alt="Product Image">
                                </div>
                                <div class="features-caption">
                                    <h3>Product Name</h3> <!-- Thay thế bằng JavaScript hoặc giá trị tĩnh -->
                                    <div class="price">
                                        <span>0 VND</span> <!-- Thay thế bằng JavaScript hoặc giá trị tĩnh -->
                                    </div>
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
                                    <a href="#" class="white-btn mr-10">Add to Cart</a>
                                    <a href="#" class="border-btn share-btn"><i class="fas fa-share-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="our-client section-padding best-selling">
            <div class="container">
                <p>Product Description goes here.</p> <!-- Thay thế bằng JavaScript hoặc giá trị tĩnh -->
                <div class="image-below-paragraph">
                    <div class="image-container">
                        <img src="../../static/client_assets/img/products/image1.png" alt="Product Image 1" style="max-width: 480px; max-height: 480px;"/>
                    </div>
                    <div class="description" style="align-content: center">
                        <p>Image description goes here.</p> <!-- Thay thế bằng JavaScript hoặc giá trị tĩnh -->
                    </div>
                </div>
                <!-- Thêm các hình ảnh và mô tả khác theo nhu cầu -->
            </div>
        </section>

        <section style="margin-left: 50px">
            <div class="comments-area">
                <input type="hidden" id="userId" value="<!-- Thay thế bằng giá trị tĩnh hoặc JavaScript -->">
                <h4>0 Comments</h4> <!-- Thay thế bằng JavaScript hoặc giá trị tĩnh -->
                <div class="comment-list">
                    <!-- Thêm các bình luận tĩnh hoặc sử dụng JavaScript để tải bình luận -->
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="../../static/client_assets/img/users/avatar-default.png" alt="User Avatar">
                            </div>
                            <div class="desc">
                                <p class="comment">This is a great product!</p>
                                <p class="ratedStar">Đánh giá: 5 Sao</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <h5>
                                            <a href="#">John Doe</a>
                                        </h5>
                                        <p class="date">2023-10-20</p>
                                    </div>
                                    <div class="reply-btn">
                                        <button class="btn-add" style="background-color: yellow; color: black" onclick="showAddForm('1')">Trả lời</button>
                                    </div>
                                    <div class="add-reply-form" id="addForm_1" style="display: none;">
                                        <form action="/admin/reply/send" method="post">
                                            <input type="hidden" name="commentId" id="commentId" value="1">
                                            <input type="hidden" name="productIdAddReply" id="productIdAddReply" value="<!-- Thay thế bằng giá trị tĩnh hoặc JavaScript -->">
                                            <textarea name="addReplyContent" id="addReplyContent" required></textarea>
                                            <button type="submit" class="btn-confirm" style="background-color: green; color: white">Xác nhận</button>
                                            <button type="button" class="btn-close" style="background-color: red; color: white" onclick="hideAddForm('1')">Đóng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Nếu có phản hồi -->
                            <div class="replies-section" style="margin-top: 20px;">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="../../static/client_assets/img/users/avatar-reply.png" alt="User Avatar">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">Thank you for your feedback!</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Admin</a>
                                                    </h5>
                                                    <p class="date">2023-10-21</p>
                                                </div>
                                                <!-- Nếu phản hồi thuộc về người dùng -->
                                                <div class="edit-delete-buttons" style="display: none;">
                                                    <button class="btn-edit" style="background-color: yellow; color: black" onclick="showEditForm('2')">Sửa</button>
                                                    <button class="btn-delete" style="background-color: red; color: white" onclick="deleteReply('2')">Xoá</button>
                                                    <div class="edit-reply-form" id="editForm_2" style="display: none;">
                                                        <form action="/admin/reply/update" method="post">
                                                            <input type="hidden" name="replyId" id="replyId" value="2">
                                                            <input type="hidden" name="productIdEditReply" id="productIdEditReply" value="<!-- Thay thế bằng giá trị tĩnh hoặc JavaScript -->">
                                                            <textarea name="editedReplyContent" id="editedReplyContent" required></textarea>
                                                            <button type="submit" class="btn-confirm" style="background-color: green; color: white">Xác nhận</button>
                                                            <button type="button" class="btn-close" style="background-color: red; color: white" onclick="hideEditForm('2')">Đóng</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end replies-section -->
                        </div>
                    </div>

                    <br>

                    <script>
                        function deleteReply(id) {
                            let isConfirmed = confirm('Bạn có chắc chắn muốn xoá bình luận trả lời này không?');
                            let productId = document.getElementById('productId').value;
                            if (isConfirmed) {
                                window.location.href = '/admin/reply/delete/' + id + '?productId=' + productId;
                            }
                        }

                        function showEditForm(id) {
                            console.log('editForm_' + id);
                            document.getElementById('editForm_' + id).style.display = 'block';
                        }

                        function hideEditForm(id) {
                            document.getElementById('editForm_' + id).style.display = 'none';
                        }

                        function showAddForm(id) {
                            console.log('addForm_' + id);
                            document.getElementById('addForm_' + id).style.display = 'block';
                        }

                        function hideAddForm(id) {
                            document.getElementById('addForm_' + id).style.display = 'none';
                        }
                    </script>
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
                                    <input type="email" placeholder="Enter your email" required/>
                                    <button class="subscribe-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-4">
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
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
                                    <a href="index.html"><img src="../../static/client_assets/img/logo/logo2_footer.png" alt="Footer Logo"/></a>
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
                                    <li><a href="../../static/client_order.html">Track Your Order</a></li>
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
    </div> <!-- end footer-wrapper -->
</footer>

<div id="back-top">
    <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
            <div class="arrow arrow-one"></div>
            <div class="arrow arrow-two"></div>
        </div>
    </a>
</div>

<!-- Vendor JS -->
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

<!-- Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag("js", new Date());

    gtag("config", "UA-23581568-13");
</script>
<script>
    function calcRate(r) {
        const f = ~~r,
            id = 'star' + f + (r % f ? 'half' : '')
        id && (document.getElementById(id).checked = true)
    }
</script>
<script
        defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"84261b39a8b0079f","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"
></script>
</body>
</html>
