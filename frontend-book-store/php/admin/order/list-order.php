<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Danh sách đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../../static/assets_admin/images/favicon.ico" type="image/x-icon"/>

    <!-- Third party CSS -->
    <link href="../../../static/assets_admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>

    <!-- App CSS -->
    <link href="../../../static/assets_admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../static/assets_admin/css/app.min.css" rel="stylesheet" type="text/css"/>

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
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Nhập email">
                                </div>
                            </div>
                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Số sản phẩm</th>
                                    <th>Tổng giá trị</th>
                                    <th>Phí ship</th>
                                    <th>Số tiền phải trả</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            <nav aria-label="...">
                                <ul class="pagination" id="pageId" style="float: right;">
                                </ul>
                            </nav>
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
                        2017 - 2019 &copy; Abstack theme by <a href="">Coderthemes</a>
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

<!-- Responsive examples -->
<script src="../../../static/assets_admin/libs/datatables/dataTables.responsive.min.js"></script>
<script src="../../../static/assets_admin/libs/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatables init -->
<script src="../../../static/assets_admin/js/pages/datatables.init.js"></script>

<!-- App JS -->
<script src="../../../static/assets_admin/js/app.min.js"></script>
<script>
    // Hàm xóa đơn hàng
    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            if (confirm("Bạn có chắc chắn là muốn xoá?")) {
                window.location.href = '/admin/product/deleteProduct/' + id + '.html';
            }
        });
    });


    $(document).ready(function () {
        initData();
    });


    function initData() {
        let page = 0;
        let size = 5;
        let objFilter = {
            name: null
        };
        getOrders(page, size, objFilter);
    }

    function getOrders(page, size, objectFilter) {
        let bodyTable = $('#datatable-buttons > tbody');
        bodyTable.empty();
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/orderListAdmin?page=" + page + "&size=" + size,
            contentType: "application/json",
            data: JSON.stringify(objectFilter),
            dataType: "json",
            success: function (response) {
                console.log(response);
                let users = response?.data?.content;
                for (let i = 0; i < users.length; i++) {
                    let data = users[i];
                    let row = '<tr>' +
                        '<td>' + data.id + '</td>' +
                        '<td>' + data.email + '</td>' +
                        '<td>' + (data.detailCount !== null ? data.detailCount : 0) + '</td>' +
                        '<td>' + (data.totalCost !== null ? formatCurrency(data.totalCost) : '0 VND') + '</td>' +
                        '<td>' + (data.shippingFee !== null ? formatCurrency(data.shippingFee) : '0 VND') + '</td>' +
                        '<td>' + (data.fullCost !== null ? formatCurrency(data.fullCost) : '0 VND') + '</td>' +
                        '<td>' + data.createdDate + '</td>' +
                        '<td>' +
                        '<select id="statusSelect-' + data.id + '" class="status-select" data-order-id="' + data.id + '">' +
                        '<option value="1" ' + (data.status === 1 ? 'selected' : '') + '>PENDING</option>' +
                        '<option value="0" ' + (data.status === 0 ? 'selected' : '') + '>CANCELED</option>' +
                        '<option value="2" ' + (data.status === 2 ? 'selected' : '') + '>SUCCEEDED</option>' +
                        '</select>' +
                        '</td></tr>';
                    $('#datatable-buttons tbody').append(row);
                }

                // Phân trang
                let totalPage = response.data.totalPages;
                let currentPage = response.data.pageable.pageNumber;
                if (totalPage > 0) {
                    $("#pageId").empty();
                    let pages = '<li class="page-item"><a class="page-link" onclick="changePage(' + (currentPage - 1) + ',5,event)" href="#">Previous</a></li>';
                    for (let i = 0; i < totalPage; i++) {
                        if (currentPage === i) {
                            pages += '<li class="page-item active">' +
                                '<a class="page-link" onclick="changePage(' + i + ',5,event)" href="#">' + (i + 1) + '</a></li>';
                        } else {
                            pages += '<li class="page-item">' +
                                '<a class="page-link" onclick="changePage(' + i + ',5,event)" href="#">' + (i + 1) + '</a></li>';
                        }
                    }
                    pages += '<li class="page-item"><a class="page-link" onclick="changePage(' + (currentPage + 1) + ',5,event)" href="#">Next</a></li>';
                    $("#pageId").append(pages);
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    }

    // Xử lý khi thay đổi trạng thái đơn hàng
    $(document).on('change', '.status-select', function () {
        var orderId = $(this).data('order-id');
        var newStatus = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/admin/order/updateStatus.html',
            data: {
                orderId: orderId,
                newStatus: newStatus
            },
            success: function (response) {
                console.log('Update successful');
                // Bạn có thể thêm thông báo thành công ở đây
            },
            error: function (error) {
                console.error('Error updating status:', error.responseText);
                // Bạn có thể thêm thông báo lỗi ở đây
            }
        });
    });

    // Định dạng tiền tệ
    function formatCurrency(value) {
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        return formatter.format(value);
    }

    // Tìm kiếm theo email
    function searchCondition(page, size) {
        let filter = {};
        filter.email = $("#email").val() === '' ? null : $("#email").val();
        getOrders(page, size, filter);
    }

    // Thay đổi trang
    function changePage(page, size, event) {
        event.preventDefault();
        searchCondition(page, size);
    }


</script>
</body>
</html>