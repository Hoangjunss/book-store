<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Cập nhật sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../../static/assets_admin/images/favicon.ico" type="image/x-icon"/>

    <!-- App CSS -->
    <link href="../../../static/assets_admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/css/app.min.css" rel="stylesheet" type="text/css"/>

    <style>
        .profile-picture img {
            max-width: 200px;
            max-height: 200px;
            width: auto;
            height: auto;
        }
        .form-group img {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="../../../static/assets_admin/images/flags/vietnam.jpg" alt="user-image" class="mr-1" height="12">
                    <span class="align-middle">Vietnam <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="../../../static/assets_admin/images/flags/us.jpg" alt="user-image" class="mr-1"
                             height="12"> <span class="align-middle">English</span>
                    </a>
                </div>
            </li>


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="#" class="text-dark">
                                    <small>Xoá hết</small>
                                </a>
                            </span>Thông báo
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min
                                ago</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days
                                ago</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days
                                ago</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                            <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary"><i class="mdi mdi-heart"></i></div>
                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days
                                ago</small></p>
                        </a>

                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1">admin@example.com <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Chào mừng!</h6>
                    </div>

                    <!-- item-->
                    <a href="../profile.php" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Thông tin cá nhân</span>
                    </a>

                    <!-- item-->
                    <a href="/logout.html" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="#" class="logo text-center">
                <span class="logo-lg">
                    <img src="../../../static/assets_admin/images/logo-light.png" alt="Logo" height="16">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-sm-text-dark">U</span> -->
                    <img src="../../../static/assets_admin/images/logo-sm.png" alt="Logo" height="24">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

        </ul>
    </div>
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">QUẢN LÝ</li>

                    <li>
                        <a href="../dashboard.php">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="../user/list-user.php">
                            <i class="fe-briefcase"></i>
                            Quản lý user
                        </a>
                    </li>
                    <li>
                        <a href="../category/list-category.php">
                            <i class="fe-disc"></i>
                            Quản lý loại sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="../product/list-product.php">
                            <i class="fe-box"></i>
                            Quản lý sản phẩm
                        </a>
                    </li>

                    <li>
                        <a href="../order/list-order.php">
                            <i class="fe-layout"></i>
                            Quản lý đơn hàng
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Validation</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Cập nhật thông tin sản phẩm</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-lg">
                        <div class="card-box">
                            <form class="parsley-examples" action="/admin/product/update.html" id="myForm"
                                  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="">

                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" required
                                           placeholder="Type something" name="productName" id="productName"/>
                                </div>

                                <div class="form-group">
                                    <label>Ảnh thumbnail</label>
                                    <br>
                                    <img id="thumbnailPreview" src="../../../static/assets_admin/images/default-thumbnail.png" alt="Thumbnail" class="image">
                                    <br>
                                    <br>
                                    <label for="fileThumbnail">Chọn ảnh:</label>
                                    <input type="file" name="fileThumbnail" id="fileThumbnail" onchange="previewThumbnail(this)"/>
                                </div>

                                <script>
                                    function previewThumbnail(input) {
                                        let preview = document.getElementById('thumbnailPreview');
                                        let file = input.files[0];

                                        if (file) {
                                            let reader = new FileReader();

                                            reader.onload = function (e) {
                                                preview.src = e.target.result;
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <div>
                                        <input type="number" id="amount" class="form-control" required
                                               name="amount" placeholder="Nhập số lượng sản phẩm"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Giá nhập</label>
                                    <div>
                                        <input type="text" id="price" class="form-control" required
                                               placeholder="100.000 VND"
                                               onfocus="clearValue(this)"
                                               oninput="formatCurrencyPrice(this)"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <div>
                                        <input type="text" id="salePrice" class="form-control" required
                                               placeholder="100.000 VND"
                                               onfocus="clearValue(this)"
                                               oninput="formatCurrencySalePrice(this)"/>
                                        <div id="error-message" style="color: red;"></div>
                                    </div>
                                </div>

                                <input type="hidden" id="hiddenPrice" name="price" value=""/>
                                <input type="hidden" id="hiddenSalePrice" name="salePrice" value=""/>

                                <script>
                                    function formatCurrencyPrice(input) {
                                        let numericValue = input.value.replace(/[^\d]/g, '');
                                        input.value = formatNumberWithCommas(numericValue);

                                        document.getElementById('hiddenPrice').value = numericValue;
                                    }

                                    function formatCurrencySalePrice(input) {
                                        let numericValue = input.value.replace(/[^\d]/g, '');
                                        input.value = formatNumberWithCommas(numericValue);

                                        document.getElementById('hiddenSalePrice').value = numericValue;
                                    }

                                    function formatNumberWithCommas(value) {
                                        return Number(value).toLocaleString('en-US');
                                    }

                                    function clearValue(input) {
                                        input.value = '';
                                    }
                                </script>


                                <div class="form-group">
                                    <label>Loại sản phẩm</label>
                                    <div>
                                        <select class="form-control mb-4 col-4" id="category" name="categoryId"
                                                aria-label="Default select example">
                                            <option value="0">Tất cả</option>
                                            <option value="1">Thời trang nam</option>
                                            <option value="2">Thời trang nữ</option>
                                            <option value="3">Bé yêu</option>
                                            <!-- Thêm các loại sản phẩm khác nếu cần -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">ACTIVE</option>
                                            <option value="0">INACTIVE</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-gradient waves-effect waves-light">
                                            Lưu thay đổi
                                        </button>
                                        <button type="reset" class="btn btn-light waves-effect ml-1">
                                            <a href="list-product.php" style="color: inherit; text-decoration: none;">Danh sách sản phẩm</a>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <!-- Phần danh sách hình ảnh sản phẩm -->
                                <div id="imagesContainer">
                                    <!-- Đây là ví dụ về một hình ảnh, bạn có thể thêm nhiều hình ảnh theo cách này hoặc sử dụng JavaScript để nạp dữ liệu động -->
                                    <div class="profile-picture single-file-preview">
                                        <img src="../../../static/assets_admin/images/products/sample-image.jpg" alt="Sample Image" class="image">
                                        <div class="description">
                                            <p>Mô tả hình ảnh</p>
                                        </div>
                                        <div class="input">
                                            <input name="file1" type="file" class="d-none">
                                            <input value="1" type="hidden" class="d-none" name="imageId" id="imageId1">
                                            <button type="button" class="btn-edit" style="background-color: yellow; color: black"
                                                    onclick="showEditForm('1')">Sửa
                                            </button>
                                            <div class="edit-reply-form" id="editForm_1" style="display: none;">
                                                <form action="/admin/image/update.html" method="post">
                                                    <input type="hidden" value="1" name="imageId" id="imageId">
                                                    <input type="hidden" value="" name="productIdEditDesc" id="productIdEditDesc">
                                                    <textarea name="editedContent" id="editedContent"></textarea>
                                                    <button type="submit" class="btn-confirm"
                                                            style="background-color: green; color: white">Xác nhận
                                                    </button>
                                                    <button type="button" class="btn-close"
                                                            style="background-color: red; color: white"
                                                            onclick="hideEditForm('1')">Đóng
                                                    </button>
                                                </form>
                                            </div>
                                            <button class="btn btn-danger delete-button" type="button" onclick="deleteImage(1, 1)">
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Thêm các hình ảnh khác tương tự -->
                                </div>
                            </div>

                            <script>
                                function showEditForm(id) {
                                    console.log('editForm_' + id);
                                    document.getElementById('editForm_' + id).style.display = 'block';
                                }

                                function hideEditForm(id) {
                                    document.getElementById('editForm_' + id).style.display = 'none';
                                }

                                function deleteImage(productId, imageId) {
                                    var confirmation = confirm("Bạn có chắc chắn muốn xóa ảnh này?");
                                    if (confirmation) {
                                        window.location.href = '/admin/product/deleteImage/' + productId + '/' + imageId + '.html';
                                    }
                                }
                            </script>

                            <br>
                            <br>

                            <form action="/admin/product/upload.html" id="uploadForm" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="idInput" name="idInput" value=""/>
                                <label for="editor">Viết mô tả:</label>
                                <div id="editor"></div>

                                <label for="imageInput">Chọn ảnh:</label>
                                <input type="file" name="file" id="imageInput"/>
                                <button type="submit">Upload Image</button>

                                <input id="contentTextArea" name="content" type="hidden"/>
                            </form>



                            <script>
                                document.getElementById('uploadForm').addEventListener('submit', function (event) {
                                    let fileInput = document.getElementById('imageInput');
                                    let file = fileInput.files[0];

                                    if (file) {
                                        let maxSize = 2;
                                        if (file.size > maxSize * 1024 * 1024) {
                                            alert('Kích thước file không được vượt quá 2MB.');
                                            event.preventDefault();
                                            return;
                                        }

                                        let allowedFormats = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                                        if (allowedFormats.indexOf(file.type) === -1) {
                                            alert('Định dạng file không được hỗ trợ. Vui lòng chọn ảnh có định dạng JPEG, PNG hoặc GIF.');
                                            event.preventDefault();
                                            return;
                                        }
                                    }
                                });
                            </script>


                            <script>
                                window.addEventListener("load", (e) => {
                                    ClassicEditor
                                        .create(document.querySelector('#editor'), {
                                            // CKEditor config
                                            toolbar: {
                                                items: [
                                                    'heading', '|',
                                                    'fontfamily', 'fontsize', '|',
                                                    'alignment', '|',
                                                    'fontColor', 'fontBackgroundColor', '|',
                                                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                                    'link', '|',
                                                    'bulletedList', 'numberedList', 'todoList', '|',
                                                    'code', 'codeBlock', 'blockQuote', '|',
                                                    'undo', 'redo'
                                                ],
                                                shouldNotGroupWhenFull: true
                                            }
                                        })
                                        .then(editor => {
                                            editor.model.document.on('change:data', () => {
                                                const content = editor.getData();
                                                const tempElement = document.createElement('div');
                                                tempElement.innerHTML = content;

                                                const textContent = tempElement.querySelector('p') ? tempElement.querySelector('p').textContent : '';

                                                document.getElementById('contentTextArea').value = textContent;
                                            });
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                });
                            </script>


                        </div>
                    </div>

                </div>
                <!-- end row -->


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2017 - 2019 &copy; Dashboard theme by <a href="">SWP391</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h5 class="m-0 text-white">Settings</h5>
    </div>
    <div class="slimscroll-menu">
        <hr class="mt-0">
        <h5 class="pl-3">Basic Settings</h5>
        <hr class="mb-0"/>


        <div class="p-3">
            <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                <label class="custom-control-label" for="customCheck1">Notifications</label>
            </div>
            <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                <label class="custom-control-label" for="customCheck2">API Access</label>
            </div>
            <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="customCheck3">
                <label class="custom-control-label" for="customCheck3">Auto Updates</label>
            </div>
            <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                <label class="custom-control-label" for="customCheck4">Online Status</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck5">
                <label class="custom-control-label" for="customCheck5">Auto Payout</label>
            </div>
        </div>

        <!-- Messages -->
        <hr class="mt-0"/>
        <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">24</span></h5>
        <hr class="mb-0"/>
        <div class="p-3">
            <div class="inbox-widget">
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../../static/assets_admin/images/users/avatar-1.jpg"
                                                     class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);">Chadengle</a></p>
                    <p class="inbox-item-text">Hey! there I'm available...</p>
                    <p class="inbox-item-date">13:40 PM</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../../static/assets_admin/images/users/avatar-2.jpg"
                                                     class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);">Tomaslau</a></p>
                    <p class="inbox-item-text">I've finished it! See you so...</p>
                    <p class="inbox-item-date">13:34 PM</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../../static/assets_admin/images/users/avatar-3.jpg"
                                                     class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);">Stillnotdavid</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                    <p class="inbox-item-date">13:17 PM</p>
                </div>

                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../../static/assets_admin/images/users/avatar-4.jpg"
                                                     class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);">Kurafire</a></p>
                    <p class="inbox-item-text">Nice to meet you</p>
                    <p class="inbox-item-date">12:20 PM</p>

                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="../../../static/assets_admin/images/users/avatar-5.jpg"
                                                     class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);">Shahedk</a></p>
                    <p class="inbox-item-text">Hey! there I'm available...</p>
                    <p class="inbox-item-date">10:15 AM</p>

                </div>
            </div> <!-- end inbox-widget -->
        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor JS -->
<script src="../../../static/assets_admin/js/vendor.min.js"></script>

<!-- Required datatable js -->
<script src="../../../static/assets_admin/libs/datatables/jquery.dataTables.min.js"></script>
<script src="../../../static/assets_admin/libs/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../../../static/assets_admin/libs/datatables/dataTables.buttons.min.js"></script>
<script src="../../../static/assets_admin/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="../../../static/assets_admin/libs/jszip/jszip.min.js"></script>
<script src="../../../static/assets_admin/libs/pdfmake/pdfmake.min.js"></script>
<script src="../../../static/assets_admin/libs/pdfmake/vfs_fonts.js"></script>
<script src="../../../static/assets_admin/libs/datatables/buttons.html5.min.js"></script>
<script src="../../../static/assets_admin/libs/datatables/buttons.print.min.js"></script>
<script src="../../../static/assets_admin/js/jquery.min.js"></script>
<script src="../../../static/assets_admin/js/popper.min.js"></script>
<script src="../../../static/assets_admin/js/bootstrap.min.js"></script>
<!-- Responsive examples -->
<script src="../../../static/assets_admin/libs/datatables/dataTables.responsive.min.js"></script>
<script src="../../../static/assets_admin/libs/datatables/responsive.bootstrap4.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<!-- Datatables init -->
<script src="../../../static/assets_admin/js/pages/datatables.init.js"></script>

<!-- App JS -->
<script src="../../../static/assets_admin/js/app.min.js"></script>
<script>
    document.getElementById('salePrice').addEventListener('input', function () {
        var price = parseFloat(document.getElementById('hiddenPrice').value);
        var salePrice = parseFloat(document.getElementById('hiddenSalePrice').value);
        var errorMessageDiv = document.getElementById('error-message');

        if (isNaN(price) || isNaN(salePrice) || salePrice < price) {
            errorMessageDiv.textContent = 'Giá bán phải lớn hơn hoặc bằng giá.';
            this.setCustomValidity('Giá bán phải lớn hơn hoặc bằng giá.');
        } else {
            errorMessageDiv.textContent = '';
            this.setCustomValidity('');
        }
    });

    function deleteImage(productId, imageId) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa ảnh này?");
        if (confirmation) {
            window.location.href = '/admin/product/deleteImage/' + productId + '/' + imageId + '.html';
        }
    }

</script>
</body>
</html>
