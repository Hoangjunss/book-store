<!DOCTYPE html>
<html lang="vi"> <!-- Thay đổi lang từ 'en' sang 'vi' nếu cần -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../static/assets/images/favicon.ico"><!-- Thay thế th:href bằng href với đường dẫn tĩnh -->

    <!-- App css -->
    <link href="../../static/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../static/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../static/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
</head>

<body class="authentication-bg bg-gradient">

<div class="account-pages pt-5 mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="index.html">
                                <span><img src="../../static/assets/img/logo.jpeg" alt="Logo" height="98"></span>
                            </a>
                            <h5 class="text-uppercase text-center font-bold mt-4">Thay đổi mật khẩu mới của bạn</h5>
                        </div>
                        <div id="notification-box"></div>
                        <!-- form -->
                        <form class="mt-3" action="/save-change-password" method="post" id="myForm"><!-- Thay thế th:action bằng action với đường dẫn tĩnh -->

                            <div class="form-group">
                                <label> Mật khẩu cũ của bạn</label>
                                <input class="form-control" type="password" required id="old_password"
                                       name="old_password"
                                       placeholder="Mật khẩu cũ">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Mật khẩu Mới</label>
                                <input class="form-control" type="password"
                                       required id="password" name="password"
                                       onkeyup='check();'
                                       placeholder="Nhập Mật Khẩu Mới">
                            </div>
                            
                            <div class="form-group">
                                <label> Xác nhận mật khẩu</label>
                                <input class="form-control" type="password" required id="confirm_password"
                                       name="confirm_password"
                                       onkeyup='check();'
                                       placeholder="Xác Nhận Mật Khẩu Mới">
                                <span id='message'></span>
                            </div>


                            <div class="form-group mb-0 text-center">

                                <button class="btn btn-gradient btn-block" onclick="showNotification('success', 'Mật khẩu đã được thay đổi thành công!');" type="submit">
                                    Đổi mật khẩu
                                </button>
                            </div>
                            <script>
                                const noti_box = document.querySelector("#notification-box");
                                
                                function showNotification(type, message) {
                                    let noti = document.createElement("div");
                                    noti.className = `notification ${type}`;
                                    noti.innerHTML = `
                                        <i class="fas fa-times close"></i>
                                        <div class="notification__title">
                                          <i class="fas fa-info-circle"></i>
                                          <span>${type.charAt(0).toUpperCase() + type.slice(1)}</span>
                                        </div>
                                        <div class="notification__detail">
                                          ${message}
                                        </div>
                                    `;

                                    const notiClose = noti.querySelector(".close");
                                    notiClose.addEventListener("click", e => {
                                        noti.remove();
                                    });

                                    noti_box.appendChild(noti);
                                    
                                    setTimeout(() => {
                                        noti.style.animation = "disappear 1s linear forwards";
                                    }, 2000);
                                    setTimeout(() => {
                                        noti.remove();
                                    }, 4000);
                                }

                                var check = function() {
                                    var password = document.getElementById('password').value.trim();
                                    var confirm_password = document.getElementById('confirm_password').value;
                                    if (password !== '' && !isValidPassword(password)) {
                                        document.querySelector('.error-password').innerText = 'Mật khẩu phải bao gồm ít nhất 6 kí tự, có chữ hoa, chữ thường, số và kí tự đặc biệt.';
                                    } else {
                                        document.querySelector('.error-password').innerText = "";
                                    }

                                    if (password === confirm_password && password !== '') {
                                        document.getElementById('message').style.color = 'green';
                                        document.getElementById('message').innerHTML = 'Mật Khẩu Trùng Khớp!';
                                    } else {
                                        document.getElementById('message').style.color = 'red';
                                        document.getElementById('message').innerHTML = 'Mật Khẩu Không Trùng Khớp!';
                                    }
                                }

                                function isValidPassword(password) {
                                    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
                                    return passwordRegex.test(password);
                                }
                            </script>

                        </form>
                        <p style="color: red"></p><!-- Thay thế th:text="${mess}" bằng JavaScript hoặc để trống -->
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">
                                    <a href="#" class="text-muted mb-0"><b>Quay Lại</b></a> 
                                    <a href="/home.html" class="text-dark ml-1"><b>Trang Chủ</b></a>
                                </p>
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

</body>

</html>
