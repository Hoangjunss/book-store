<?php
// products.php

// Giả lập dữ liệu người dùng đã đăng nhập
$session = true; // Thay đổi thành false nếu người dùng chưa đăng nhập

// Giả lập email người dùng
$email = "nguyenvana@example.com";

// Giả lập danh sách danh mục sản phẩm
$categories = [
    ['id' => 1, 'categoryName' => 'Clothing Fashion'],
    ['id' => 2, 'categoryName' => 'Winter'],
    ['id' => 3, 'categoryName' => 'Summer'],
    ['id' => 4, 'categoryName' => 'Formal'],
    ['id' => 5, 'categoryName' => 'Casual'],
    // Thêm các danh mục khác nếu cần
];

// Giả lập danh sách sản phẩm
$allProducts = [
    [
        'id' => 201,
        'productName' => 'Áo Thun Nam',
        'thumbnail' => '../../static/client_assets/img/products/product_1.jpg',
        'salePrice' => 150000,
        'categoryId' => 1
    ],
    [
        'id' => 202,
        'productName' => 'Quần Jeans Nam',
        'thumbnail' => '../../static/client_assets/img/products/product_2.jpg',
        'salePrice' => 250000,
        'categoryId' => 1
    ],
    [
        'id' => 203,
        'productName' => 'Áo Khoác Dạ',
        'thumbnail' => '../../static/client_assets/img/products/product_3.jpg',
        'salePrice' => 500000,
        'categoryId' => 2
    ],
    [
        'id' => 204,
        'productName' => 'Váy Summer',
        'thumbnail' => '../../static/client_assets/img/products/product_4.jpg',
        'salePrice' => 200000,
        'categoryId' => 3
    ],
    [
        'id' => 205,
        'productName' => 'Giày Thể Thao',
        'thumbnail' => '../../static/client_assets/img/products/product_5.jpg',
        'salePrice' => 300000,
        'categoryId' => 5
    ],
    // Thêm các sản phẩm khác nếu cần
];

// Xử lý các tham số từ URL cho lọc và phân trang
$productName = isset($_GET['productName']) && $_GET['productName'] !== '' ? $_GET['productName'] : null;
$categoryId = isset($_GET['category']) && $_GET['category'] != 0 ? $_GET['category'] : null;
$saleStartPrice = isset($_GET['saleStartPrice']) && $_GET['saleStartPrice'] !== '' ? $_GET['saleStartPrice'] : null;
$saleEndPrice = isset($_GET['saleEndPrice']) && $_GET['saleEndPrice'] !== '' ? $_GET['saleEndPrice'] : null;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 0;
$size = isset($_GET['size']) && is_numeric($_GET['size']) ? (int)$_GET['size'] : 12;

// Lọc sản phẩm dựa trên các điều kiện
$filteredProducts = array_filter($allProducts, function($product) use ($productName, $categoryId, $saleStartPrice, $saleEndPrice) {
    $matches = true;
    if ($productName !== null) {
        $matches = $matches && stripos($product['productName'], $productName) !== false;
    }
    if ($categoryId !== null) {
        $matches = $matches && $product['categoryId'] == $categoryId;
    }
    if ($saleStartPrice !== null) {
        $matches = $matches && $product['salePrice'] >= $saleStartPrice;
    }
    if ($saleEndPrice !== null) {
        $matches = $matches && $product['salePrice'] <= $saleEndPrice;
    }
    return $matches;
});

// Tính toán phân trang
$totalProducts = count($filteredProducts);
$totalPages = ceil($totalProducts / $size);
$offset = $page * $size;
$productsToShow = array_slice($filteredProducts, $offset, $size);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Shop | eCommerce</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
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

    <style>
        .add-to-cart-link {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50; /* Green color, bạn có thể thay đổi */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .add-to-cart-link:hover {
            background-color: #45a049; /* Màu xanh lá cây đậm hơn khi hover */
        }
    </style>
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
                                <h2>Category</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item">
                                            <a href="/client/home.php">Home</a><!-- Thay thế href="../client/index.html" bằng href="/client/home.php" -->
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

    <div class="listing-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="category-listing mb-50">
                        <div class="single-listing">
                            <div class="select-Categories pb-30">

                                <div class="select-job-items2 mb-30">
                                    <div class="col-xl-12">
                                        <input type="text" class="form-control" id="productName" name="productName"
                                               placeholder="Tên sản phẩm" value="<?php echo isset($productName) ? htmlspecialchars($productName) : ''; ?>">
                                    </div>
                                </div>

                                <div class="select-job-items2 mb-30">
                                    <div class="col-xl-12">
                                        <select class="form-select form-control mb-4 col-4" id="category" name="category" aria-label="Default select example">
                                            <option value="0">Loại sản phẩm</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php echo ($categoryId == $category['id']) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($category['categoryName']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="select-job-items2 mb-30">
                                    <aside
                                            class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40"
                                    >
                                        <div class="small-tittle">
                                            <h4>Lọc theo giá</h4>
                                        </div>
                                        <div class="widgets_inner">
                                            <div class="range_item">
                                                <form method="get" action="/client/product.php">
                                                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($categoryId ?? 0); ?>">
                                                    <input type="hidden" name="productName" value="<?php echo htmlspecialchars($productName ?? ''); ?>">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="col-6">
                                                            <label for="saleStartPrice">Giá từ:</label>
                                                            <input type="number" class="form-control" id="saleStartPrice" name="saleStartPrice" min="0" placeholder="0" value="<?php echo htmlspecialchars($saleStartPrice ?? ''); ?>">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="saleEndPrice">Giá đến:</label>
                                                            <input type="number" class="form-control" id="saleEndPrice" name="saleEndPrice" min="0" placeholder="1000" value="<?php echo htmlspecialchars($saleEndPrice ?? ''); ?>">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-3">Tìm kiếm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </aside>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Listing -->
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="latest-items latest-items2">
                        <div class="row" id="productContainer">
                            <?php if (count($productsToShow) > 0): ?>
                                <?php foreach ($productsToShow as $product): ?>
                                    <?php
                                        // Định dạng giá tiền
                                        $formattedSalePrice = number_format($product['salePrice'], 0, ',', '.') . ' VND';
                                    ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <div class="properties pb-30">
                                            <div class="properties-card">
                                                <div class="properties-img">
                                                    <a href="/client/product_detail.php?id=<?php echo htmlspecialchars($product['id']); ?>">
                                                        <img src="<?php echo htmlspecialchars($product['thumbnail']); ?>" alt="<?php echo htmlspecialchars($product['productName']); ?>"/>
                                                    </a>
                                                    <div class="socal_icon">
                                                        <form action="/client/cart_add.php" method="post">
                                                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                                            <input type="hidden" name="quantity" value="1" />
                                                            <button class="add-to-cart-link" onclick="return confirm('Bạn có muốn thêm sản phẩm này vào giỏ hàng không?')">
                                                                <i class="ti-shopping-cart"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="properties-caption properties-caption2">
                                                        <h3>
                                                            <a href="/client/product_detail.php?id=<?php echo htmlspecialchars($product['id']); ?>"><?php echo htmlspecialchars($product['productName']); ?></a>
                                                        </h3>
                                                        <div class="properties-footer">
                                                            <div class="price">
                                                                <span><?php echo $formattedSalePrice; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <p>Không tìm thấy sản phẩm nào phù hợp với điều kiện lọc.</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Phân trang -->
                        <nav aria-label="...">
                            <ul class="pagination" id="pageId" style="float: right;">
                                <!-- Previous Page Link -->
                                <?php if ($page > 0): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page - 1; ?>&size=<?php echo $size; ?>&productName=<?php echo htmlspecialchars($productName ?? ''); ?>&category=<?php echo htmlspecialchars($categoryId ?? 0); ?>&saleStartPrice=<?php echo htmlspecialchars($saleStartPrice ?? ''); ?>&saleEndPrice=<?php echo htmlspecialchars($saleEndPrice ?? ''); ?>" aria-label="Previous">
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

                                <!-- Page Number Links -->
                                <?php for ($i = 0; $i < $totalPages; $i++): ?>
                                    <?php if ($i == $page): ?>
                                        <li class="page-item active">
                                            <a class="page-link" href="?page=<?php echo $i; ?>&size=<?php echo $size; ?>&productName=<?php echo htmlspecialchars($productName ?? ''); ?>&category=<?php echo htmlspecialchars($categoryId ?? 0); ?>&saleStartPrice=<?php echo htmlspecialchars($saleStartPrice ?? ''); ?>&saleEndPrice=<?php echo htmlspecialchars($saleEndPrice ?? ''); ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $i; ?>&size=<?php echo $size; ?>&productName=<?php echo htmlspecialchars($productName ?? ''); ?>&category=<?php echo htmlspecialchars($categoryId ?? 0); ?>&saleStartPrice=<?php echo htmlspecialchars($saleStartPrice ?? ''); ?>&saleEndPrice=<?php echo htmlspecialchars($saleEndPrice ?? ''); ?>"><?php echo $i + 1; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <!-- Next Page Link -->
                                <?php if ($page < $totalPages - 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page + 1; ?>&size=<?php echo $size; ?>&productName=<?php echo htmlspecialchars($productName ?? ''); ?>&category=<?php echo htmlspecialchars($categoryId ?? 0); ?>&saleStartPrice=<?php echo htmlspecialchars($saleStartPrice ?? ''); ?>&saleEndPrice=<?php echo htmlspecialchars($saleEndPrice ?? ''); ?>" aria-label="Next">
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
                                <form action="/client/newsletter.php" method="post"><!-- Thay đổi action và method cho form -->
                                    <input type="email" name="newsletter_email" placeholder="Enter your email" required />
                                    <button class="subscribe-btn" type="submit">Subscribe</button>
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
