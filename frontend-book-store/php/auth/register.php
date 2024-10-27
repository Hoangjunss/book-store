<!DOCTYPE html>
<html lang="vi"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <title>Đăng Ký</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../static/assets/images/favicon.ico"><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->

    <!-- App css -->
    <link href="../../static/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../static/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../static/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body class="authentication-bg bg-gradient">

<div class="account-pages pt-5 mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="login.php">
                                <span><img src="../../static/assets/img/logo.jpeg" alt="Logo" height="98"></span><!-- Thay thế th:href và th:src bằng href và src với đường dẫn tĩnh -->
                            </a>
                            <h5 class="text-uppercase text-center font-bold mt-4">ĐĂNG KÝ</h5>
                        </div>

                        <!-- form -->
                        <form class="mt-3" action="/save" method="post" id="myForm"><!-- Thay thế th:action và th:object bằng action và method của form -->

                            <div class="form-group">
                                <label>Họ tên đầy đủ</label>
                                <input class="form-control" type="text"
                                       name="fullName"
                                       id="fullName"
                                       placeholder="Nhập họ tên đầy đủ: " required/>
                                <!-- 
                                <div class="alert alert-warning">
                                     Thay thế th:if và th:errors bằng các thông báo lỗi tĩnh hoặc xử lý bằng JavaScript nếu cần
                                </div>
                                -->
                            </div>

                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input class="form-control" type="date" id="dob" name="dob"
                                       placeholder="Chọn ngày sinh" required>
                                <!-- 
                                <div class="alert alert-warning">
                                     Thay thế th:if và th:errors bằng các thông báo lỗi tĩnh hoặc xử lý bằng JavaScript nếu cần 
                                </div>
                                -->
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input class="form-control" type="email" name="email"
                                       id="email" required
                                       placeholder="Nhập email: ">
                                <!-- 
                                <div class="alert alert-warning">
                                   Thay thế th:if và th:errors bằng các thông báo lỗi tĩnh hoặc xử lý bằng JavaScript nếu cần 
                                </div>
                                -->
                                <p style="color: red"></p><!-- Thay thế th:text bằng JavaScript hoặc để trống -->
                            </div>

                            <div class="form-group">
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="male" name="gender"
                                           value="1" checked>
                                    <label for="male">Nam </label>
                                </div>
                                <div class="radio form-check-inline">
                                    <input type="radio" id="female" name="gender"
                                           value="0">
                                    <label for="female"> Nữ </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="(0)123 456 7890"
                                       oninput="this.value = this.value.replace(/[^0-9]/g, ''); if (this.value.length > 10) this.value = this.value.slice(0, 10);">
                                <small class="text-danger error-phone"></small>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ cụ thể</label>
                                <input class="form-control" type="text"
                                       name="address"
                                       id="address"
                                       placeholder="Nhập địa chỉ: " required/>
                                <!-- 
                                <div class="alert alert-warning">
                                     Thay thế th:if và th:errors bằng các thông báo lỗi tĩnh hoặc xử lý bằng JavaScript nếu cần 
                                </div>
                                -->
                            </div>
                            <div class="form-group">
                                <script>
                                    var check = function () {
                                        var password = document.getElementById('password').value.trim();
                                        if (password !== '' && !isValidPassword(password)) {
                                            document.querySelector('.error-password').innerText = 'Mật khẩu phải bao gồm ít nhất 6 kí tự, có chữ hoa, chữ thường, số và kí tự đặc biệt.';
                                        }
                                        else {
                                            document.querySelector('.error-password').innerText = "";
                                        }

                                        var confirm_password = document.getElementById('confirm_password').value;
                                        if (password === confirm_password && password !== '') {
                                            document.getElementById('message').style.color = 'green';
                                            document.getElementById('message').innerHTML = 'Mật Khẩu Trùng Khớp!';
                                        } else {
                                            document.getElementById('message').style.color = 'red';
                                            document.getElementById('message').innerHTML = 'Mật Khẩu Không Trùng Khớp!';
                                        }
                                    }
                                </script>
                                <label for="password">Mật khẩu</label>
                                <input class="form-control" type="password" name="password"
                                       required id="password" 
                                       onkeyup='check();'
                                       placeholder="Nhập mật khẩu: ">
                                <small class="text-danger error-password"></small>
                            </div>
                            <div class="form-group">
                                <label> Xác nhận mật khẩu: </label>
                                <input class="form-control" type="password" required id="confirm_password"
                                       name="confirm_password"
                                       onkeyup='check();'
                                       placeholder="Xác nhận mật khẩu: ">
                                <span id='message'></span>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-gradient btn-block" type="submit"> Đăng ký xác nhận
                                </button>
                            </div>
                        </form>
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Đã có tài khoản? <a href="login.php"
                                                                               class="text-dark ml-1"><b>Đăng
                                    Nhập</b></a></p><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->


            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="../../static/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="../../static/assets/js/app.min.js"></script>
<script src="../../static/assets/js/myjs.js"></script>
<script>
    document.getElementById('myForm').addEventListener('submit', function (event) {
        var passwordInput = document.getElementById('password');
        var password = passwordInput.value.trim();

        if (password !== '' && !isValidPassword(password)) {
            document.querySelector('.error-password').innerText = 'Mật khẩu phải bao gồm ít nhất 6 kí tự, có chữ hoa, chữ thường, số và kí tự đặc biệt.';
            event.preventDefault();
        }

    });

    function isValidPassword(password) {
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        return passwordRegex.test(password);
    }

    const inputPhone = document.getElementById('phone');
    const errorPhone = document.querySelector('.error-phone');

    inputPhone.addEventListener('blur', () => {

        if (!inputPhone.value.match(/^\d{10}$/)) {
            errorPhone.textContent = 'Số điện thoại phải gồm 10 số.';
        } else {
            errorPhone.textContent = '';
        }
    });
</script>
</body>

</html>
