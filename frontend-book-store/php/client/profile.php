<?php
// profile.php

// Giả lập dữ liệu người dùng đã đăng nhập
$session = true; // Thay đổi thành false nếu người dùng chưa đăng nhập

$customer = [
    'id' => 1,
    'fullName' => 'Nguyễn Văn A',
    'email' => 'nguyenvana@example.com',
    'phone' => '0123456789',
    'gender' => 'MALE', // 'MALE' hoặc 'FEMALE'
    'dob' => '1990-05-15',
    'hometown' => 'Hà Nội',
    'address' => '123 Đường ABC, Phường 1, Quận 1, Thành phố Hồ Chí Minh',
    'imageLink' => '../../static/assets/img/profile/default.png', // Đường dẫn ảnh đại diện
    'password' => 'Password@123', // Mật khẩu hiện tại
    'newPassword' => '' // Mật khẩu mới (nếu có)
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../../static/assets/fonts/font-awesome.css" type="text/css"> <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../../static/assets/fonts/elegant-fonts.css" type="text/css"> <!-- Elegant Fonts CSS -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../static/assets/bootstrap/css/bootstrap.css" type="text/css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../static/assets/css/owl.carousel.css" type="text/css"> <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="../../static/assets/css/style.css" type="text/css"> <!-- Main Style CSS -->

    <title>Thông tin cá nhân</title>
    <style>
        @media (min-width: 1200px) {
            .profile-picture img {
                height: 270px;
            }
        }
        @media (min-width: 992px) and (max-width: 1200px) {
            .profile-picture img {
                height: 220px;
            }
        }
        @media (min-width: 768px) and (max-width: 992px){
            .profile-picture img {
                height: 165px;
            }
        }
        @media (max-width: 768px){
            .profile-picture img {
                height: auto;
            }
        }
    </style>
</head>

<body>
<div class="page-wrapper">
    <div id="page-header">
        <header>
            <div class="container">
                <div class="secondary-nav">
                    <div class="nav-trigger">
                        <a data-toggle="collapse" href="#secondary-nav" aria-expanded="false" aria-controls="secondary-nav">
                            <i class="fa fa-user"></i>
                        </a>
                    </div>
                    <div id="secondary-nav" class="collapse">
                        <nav>
                            <div class="left opacity-60">
                                <a href="#"><i class="fa fa-phone"></i>0948212516</a>
                                <a href="mailto:chuyendizz@gmail.com"><i class="fa fa-envelope"></i>chuyendizz@gmail.com</a>
                            </div>
                            <!--end left-->
                            <div class="right">
                                <?php if ($session): ?>
                                    <!-- Hiển thị thông tin người dùng đã đăng nhập -->
                                    <div>
                                        <a href="/profile.php"><span>Xin chào, <span><?php echo htmlspecialchars($customer['email']); ?></span></span></a>
                                        <a href="/logout.php">Đăng xuất</a>
                                    </div>
                                <?php else: ?>
                                    <!-- Hiển thị liên kết đăng nhập và đăng ký nếu người dùng chưa đăng nhập -->
                                    <div class="element">
                                        <a href="/login.php" data-toggle="modal" data-tab="true" data-target="#sign-in-register-modal">Đăng nhập</a>
                                    </div>
                                    <div class="element">
                                        <a href="/register.php" data-toggle="modal" data-tab="true" data-target="#sign-in-register-modal">Đăng ký</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!--end right-->
                        </nav>
                    </div>
                </div>
                <!--end secondary-nav-->
            </div>
            <!--end container-->
            <hr>
            <div class="container">
                <div class="primary-nav">
                    <div class="left">
                        <a href="/client/home" id="brand"><img src="../../static/assets/img/logo.png" alt="Logo"></a><!-- Đã thay thế th:href bằng href và th:src bằng src với đường dẫn tĩnh -->
                        <a class="nav-trigger" data-toggle="collapse" href="#primary-nav" aria-expanded="false" aria-controls="primary-nav">
                            <i class="fa fa-navicon"></i>
                        </a>
                    </div>
                    <!--end left-->
                    <div class="right">
                        <nav id="primary-nav">
                            <ul>
                                <li class="active"><a href="/client/home">Trang chủ</a></li><!-- Đã thay thế th:href bằng href với đường dẫn tĩnh -->
                                <!-- Bạn có thể thêm các mục menu khác ở đây nếu cần -->
                            </ul>
                        </nav>
                        <!--end nav-->
                    </div>
                    <!--end right-->
                </div>
                <!--end primary-nav-->
            </div>
            <!--end container-->
        </header>
        <!--end header-->
    </div>
    <!--end page-header-->

    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/client/home">Home</a></li><!-- Đã thay thế href="index.html" bằng href="/client/home" -->
                <li><a href="#">Listing</a></li>
                <li class="active">Detail</li>
            </ol>
            <!--end breadcrumb-->
            <div class="main-content">
                <div class="title">
                    <h1><a href="#">Thông tin cá nhân</a></h1>
                </div>
                <!--end title-->
                <div class="row">
                    <form id="form-profile" class="labels-uppercase" method="post" action="/client/profile/updateProfile.php" enctype="multipart/form-data"><!-- Thay thế th:action bằng action với đường dẫn PHP -->
                        <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($customer['id']); ?>"><!-- Thay thế th:value bằng giá trị PHP -->

                        <div class="row">
                            <!--Profile Picture-->
                            <div class="col-md-3 col-sm-3">
                                <section>
                                    <div id="profile-picture" class="profile-picture single-file-preview">
                                        <img src="<?php echo htmlspecialchars($customer['imageLink']); ?>" alt="Profile Picture" class="image"><!-- Thay thế th:src bằng src với giá trị PHP -->
                                        <div class="input">
                                            <input name="file" type="file" class="" id="imageInput">
                                            <span>Chọn ảnh đại diện</span>
                                        </div>
                                    </div>
                                </section>
                                <script>
                                    document.getElementById('form-profile').addEventListener('submit', function (event) {
                                        let fileThumbnail = document.getElementById('imageInput').files[0];
                                        if (fileThumbnail) {
                                            let allowedFormats = ['image/jpeg', 'image/png', 'image/gif'];
                                            if (allowedFormats.indexOf(fileThumbnail.type) === -1) {
                                                alert('Định dạng file không được hỗ trợ. Vui lòng chọn ảnh có định dạng JPEG, PNG hoặc GIF.');
                                                event.preventDefault();
                                                return;
                                            }

                                            let maxSize = 2;
                                            if (fileThumbnail.size > maxSize * 1024 * 1024) {
                                                alert('Kích thước file không được vượt quá 2MB.');
                                                event.preventDefault();
                                                return;
                                            }
                                        }
                                    });
                                </script>
                            </div>

                            <!--Contact Info-->
                            <div class="col-md-9 col-sm-9">
                                <section>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="fullName">Họ tên đầy đủ</label>
                                                <input type="text" class="form-control" id="fullName" name="fullName"
                                                       pattern="^[a-zA-ZxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđÁÂĐ ]+$"
                                                       placeholder="Jane" value="<?php echo htmlspecialchars($customer['fullName']); ?>" required><!-- Thay thế th:field bằng giá trị PHP -->
                                                <small class="text-danger error-firstName"></small>
                                            </div>
                                        </div>
                                        <!--end col-md-6-->
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       pattern="^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$"
                                                       placeholder="janedoe@gmail.com" value="<?php echo htmlspecialchars($customer['email']); ?>"><!-- Thay thế th:field bằng giá trị PHP -->
                                                <small class="text-danger error-email"></small>
                                            </div>
                                            <!--end form-group-->
                                        </div>
                                        <!--end col-md-6-->

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                       placeholder="0123456789"
                                                       oninput="this.value = this.value.replace(/[^0-9]/g, ''); if (this.value.length > 10) this.value = this.value.slice(0, 10);"
                                                       value="<?php echo htmlspecialchars($customer['phone']); ?>"><!-- Thay thế th:field bằng giá trị PHP -->
                                                <small class="text-danger error-phone"></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="gender">Giới tính</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="MALE" <?php echo ($customer['gender'] == 'MALE') ? 'selected' : ''; ?>>Nam</option>
                                                    <option value="FEMALE" <?php echo ($customer['gender'] == 'FEMALE') ? 'selected' : ''; ?>>Nữ</option>
                                                </select><!-- Thay thế th:field bằng lựa chọn PHP -->
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="dob">Ngày sinh</label>
                                                <input style="height: 36px" type="date" class="form-control"
                                                       id="dob" name="dob"
                                                       placeholder="Enter your age (ex: 18)" value="<?php echo htmlspecialchars($customer['dob']); ?>"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="hometown">Địa chỉ</label>
                                                <input style="height: 36px" type="text" class="form-control"
                                                       id="hometown" name="hometown"
                                                       placeholder="Enter your hometown" value="<?php echo htmlspecialchars($customer['hometown']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="currentPassword">Mật khẩu hiện tại</label>
                                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                                       value="<?php echo htmlspecialchars($customer['password']); ?>">
                                                <small class="text-danger error-currentPassword"></small>
                                            </div>
                                        </div>
                                        <!--end col-md-6-->

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="newPassword">Mật khẩu mới</label>
                                                <input type="password" class="form-control" id="newPassword" name="newPassword"
                                                       placeholder="Enter your new password"
                                                       value="<?php echo htmlspecialchars($customer['newPassword']); ?>">
                                                <small class="text-danger error-newPassword"></small>
                                            </div>
                                        </div>
                                        <!--end col-md-6-->
                                    </div>
                                </section>

                                <div class="form-group">
                                    <button type="submit" onclick="return validatePassword()" class="btn btn-large btn-primary btn-rounded" id="submit">
                                        Lưu thay đổi
                                    </button>
                                </div>
                                <!-- end form-group -->
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </form>
                </div>
            </div>
            <!--end main-content-->
        </div>
        <!--end container-->
    </div>
    <!--end page-content-->

    <footer id="page-footer">
        <div class="row-one">
            <div class="container">
                <div class="logos">
                    <div class="logo">
                        <a href="#"><img src="../../static/assets/img/logo-1.png" alt="Logo 1"></a><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
                    </div>
                    <!--/ .logo-->
                    <div class="logo">
                        <a href="#"><img src="../../static/assets/img/logo-2.png" alt="Logo 2"></a><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
                    </div>
                    <!--/ .logo-->
                    <div class="logo">
                        <a href="#"><img src="../../static/assets/img/logo-3.png" alt="Logo 3"></a><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
                    </div>
                    <!--/ .logo-->
                    <div class="logo">
                        <a href="#"><img src="../../static/assets/img/logo-4.png" alt="Logo 4"></a><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
                    </div>
                    <!--/ .logo-->
                    <div class="logo">
                        <a href="#"><img src="../../static/assets/img/logo-5.png" alt="Logo 5"></a><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
                    </div>
                    <!--/ .logo-->
                </div>
                <!--/ .logos-->
            </div>
        </div>
        <!--end row-one-->
        <div class="row-two clearfix">
            <div class="container">
                <div class="copyright pull-left">(C) 2016 Your Company, All Rights Reserved</div>
                <div class="footer-nav pull-right">
                    <a href="/client/home">Home</a>
                    <a href="/about-us.php">About Us</a>
                    <a href="/listing.php">Listing</a>
                    <a href="/contact-us.php">Contact Us</a>
                </div>
            </div>
            <div class="bg-transfer"><img src="../../static/assets/img/footer-bg.jpg" alt="Footer Background"></div><!-- Thay thế th:src bằng src với đường dẫn tĩnh -->
        </div>
        <!--end row-two-->
    </footer>
    <!--end page-footer-->
</div>
<!--end page-wrapper-->
<a href="#page-header" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>

<!-- Modal -->
<div class="modal fade" id="sign-in-register" tabindex="-1" role="dialog">
    <div class="wrapper">
        <div class="inner">
            <div class="modal-dialog width-400px" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab-sign-in" role="tab" data-toggle="tab">
                                <h1>Sign In</h1></a></li>
                            <li role="presentation"><a href="#tab-register" role="tab" data-toggle="tab"><h1>
                                Register</h1></a></li>
                        </ul>
                    </div>
                    <!--end modal-header-->
                    <div class="modal-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tab-sign-in">
                                <form id="form-sign">
                                    <div class="form-group">
                                        <label for="form-sign-in-email">E-mail</label>
                                        <input type="text" class="form-control" id="form-sign-in-email"
                                               name="sign_in_email" placeholder="Login E-mail">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-sign-in-password">Password</label>
                                        <input type="password" class="form-control" id="form-sign-in-password"
                                               name="sign_in_password" placeholder="*****">
                                    </div>
                                    <!--end form-group-->
                                    <div class="clearfix action">
                                        <div class="form-group pull-right">
                                            <button type="submit" class="btn btn-primary btn-rounded">Sign In</button>
                                        </div>
                                        <div class="form-group pull-left">
                                            <label><input type="checkbox" name="1">Login Automatically</label>
                                        </div>
                                    </div>
                                    <!--end action-->
                                </form>
                                <!--end form-sign-in-->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab-register">
                                <form id="form-register">
                                    <div class="form-group">
                                        <label for="form-register-name">Name</label>
                                        <input type="text" class="form-control" id="form-register-name"
                                               name="register_name" placeholder="John">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-register-surname">Surname</label>
                                        <input type="text" class="form-control" id="form-register-surname"
                                               name="register_surname" placeholder="Doe">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-register-email">E-mail</label>
                                        <input type="text" class="form-control" id="form-register-email"
                                               name="register_email" placeholder="Login E-mail">
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="form-register-password">Password</label>
                                        <input type="password" class="form-control" id="form-register-password"
                                               name="register_password" placeholder="*****">
                                    </div>
                                    <!--end form-group-->
                                    <div class="clearfix action">
                                        <div class="form-group pull-right">
                                            <button type="submit" class="btn btn-primary btn-rounded">Sign In</button>
                                        </div>
                                        <div class="form-group pull-left">
                                            <label><input type="checkbox" name="1">Login Automatically</label>
                                        </div>
                                    </div>
                                    <!--end action-->
                                </form>
                                <!--end form-sign-in-->
                            </div>
                        </div>

                    </div>
                    <!--end modal-body-->
                    <div class="modal-footer">
                        <div class="center">
                            <div>Lost Password? <a href="#">Reset here</a></div>
                            <div>New to Accommondo? <a href="#">Register an account</a></div>
                        </div>
                    </div>
                    <!--end modal-footer-->
                </div>
                <!--end modal-content-->
            </div>
            <!--end modal-dialog-->
        </div>
    </div>
</div>
<!--end modal-->

<!-- JS Libraries -->
<!-- Vendor Libraries -->
<script src="../../static/assets/js/jquery-2.2.1.min.js"></script> <!-- jQuery 2.2.1 -->
<script src="../../static/assets/js/jquery-migrate-1.2.1.min.js"></script> <!-- jQuery Migrate -->
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script> <!-- Google Maps API -->
<script src="../../static/assets/bootstrap/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
<script src="../../static/assets/js/jquery.validate.min.js"></script> <!-- jQuery Validate -->
<script src="../../static/assets/js/bootstrap-datepicker.js"></script> <!-- Bootstrap Datepicker -->
<script src="../../static/assets/js/icheck.min.js"></script> <!-- iCheck -->
<script src="../../static/assets/js/owl.carousel.js"></script> <!-- Owl Carousel -->
<script src="../../static/assets/js/masonry.pkgd.min.js"></script> <!-- Masonry -->
<script src="../../static/assets/js/maps.js"></script> <!-- Custom Maps JS -->
<script src="../../static/assets/js/custom.js"></script> <!-- Custom JS -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Axios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery 3.6.0 -->

<script>
    function validatePassword() {
        let newPassword = document.getElementById("newPassword").value;
        let errorElement = document.querySelector(".error-newPassword");
        if(newPassword !== '') {
            errorElement.textContent = "";
            if (newPassword.length < 6) {
                errorElement.textContent = "Mật khẩu phải có ít nhất 6 ký tự";
                return false;
            }

            if (!/[A-Z]/.test(newPassword)) {
                errorElement.textContent = "Mật khẩu phải chứa ít nhất một ký tự viết hoa";
                return false;
            }

            if (!/[a-z]/.test(newPassword)) {
                errorElement.textContent = "Mật khẩu phải chứa ít nhất một ký tự viết thường";
                return false;
            }

            if (!/[!@#$%^&*(),.?":{}|<>]/.test(newPassword)) {
                errorElement.textContent = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt";
                return false;
            }
            return true;
        }
    }

    const inputPhone = document.getElementById('phone');
    const errorPhone = inputPhone.nextElementSibling;

    inputPhone.addEventListener('blur', () => {
        const phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(inputPhone.value)) {
            errorPhone.textContent = 'Số điện thoại gồm 10 số';
        } else {
            errorPhone.textContent = '';
        }
    });

    const inputMail = document.getElementById('email');
    const errorMail = inputMail.nextElementSibling;

    inputMail.addEventListener('blur', () => {
        const emailPattern = /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$/;
        if (!emailPattern.test(inputMail.value)) {
            errorMail.textContent = 'Email có dạng "miclebim12@gmail.com"';
        } else {
            errorMail.textContent = '';
        }
    });

    const inputFullName = document.getElementById('fullName');
    const errorFullName = inputFullName.nextElementSibling;

    inputFullName.addEventListener('blur', () => {
        const namePattern = /^[a-zA-ZxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđÁÂĐ ]+$/;
        if (!namePattern.test(inputFullName.value)) {
            errorFullName.textContent = 'Họ tên không chứa số và kí tự đặc biệt';
        } else {
            errorFullName.textContent = '';
        }
    });

    document.getElementById("dob").addEventListener("change", function () {
        var dob = new Date(this.value);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var m = today.getMonth() - dob.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
            age--;
        }

        if (age >= 18) {
            // Người dùng đủ tuổi, cho phép submit
            // Không làm gì
        } else {
            // Người dùng chưa đủ tuổi, ngăn chặn submit và thông báo
            alert("Phải trên 18 tuổi!");
            this.value = ''; // Xóa giá trị ngày sinh
        }
    });
</script>

</body>
</html>
