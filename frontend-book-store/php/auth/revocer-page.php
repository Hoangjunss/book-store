<!DOCTYPE html>
<html lang="vi"> <!-- Thay đổi lang từ 'en' sang 'vi' vì nội dung bằng tiếng Việt -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <!--
    <link rel="shortcut icon" href="/static/images/favicon.ico">
    -->

    <!-- App css -->
    <link href="../../static/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../static/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../static/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

    <style>
        /* Thêm CSS tùy chỉnh nếu cần */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 5px;
            color: #fff;
            z-index: 1000;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .notification.success {
            background-color: #28a745;
        }
        .notification.error {
            background-color: #dc3545;
        }
        .notification .close {
            margin-left: 10px;
            cursor: pointer;
        }
        @keyframes disappear {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>

<body class="authentication-bg bg-gradient">

<div class="account-pages pt-5 mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">

                            <a href="Homepage.html">
                                <span><img src="../../static/assets/img/logo.jpeg" alt="Logo" height="98"></span>
                            </a>
                            <h5 class="text-uppercase text-center font-bold mt-4">Nhập OTP Của Bạn</h5>

                        </div>

                        <div id="notification-box"></div>
                        <!-- form -->
                        <form class="mt-3" action="/confirm-otp" method="post" id="myForm"><!-- Thay thế th:action bằng action với đường dẫn tĩnh -->

                            <div class="form-group">
                                <input class="form-control" type="text"
                                       id="otp"
                                       name="otp"
                                       placeholder="Nhập OTP bao gồm 6 chữ số." required/>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-gradient btn-block" onclick="showSuccessToast();" type="submit">
                                    Xác Nhận OTP
                                </button>
                            </div>
                            <script>
                                const noti_box = document.querySelector("#notification-box");

                                function showSuccessToast() {
                                    showNotification('success', 'Bạn đã xác nhận OTP thành công!');
                                }

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
                            </script>

                        </form>
                        <!-- <p style="color: red" th:text="${mess}"></p> --> <!-- Loại bỏ th:text và để trống hoặc sử dụng JavaScript nếu cần -->
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Bạn không nhận được email? <a href="/re-send.html"
                                                                                       class="text-dark ml-1"><b>Gửi Lại</b></a></p>
                                <p class="text-muted mb-0">Bạn đã có tài khoản? <a href="/login.html"
                                                                                       class="text-dark ml-1"><b>Đăng Nhập</b></a></p>

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
