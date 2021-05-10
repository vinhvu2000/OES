<?php include 'includes/check_user.php';
include 'includes/check_reply.php';
$qrcodetxt = 'ID:' . $masv . ', NAME: ' . $ten . ' ' . $hotendem . ', GENDER: ' . $gioitinh . ', DEPARTMENT : ' . $mydepartment . ', CATEGORY : ' . $mycategory . '';


?>
<!DOCTYPE html>
<html>

<head>

    <title>OES | Hồ sơ</title>

    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="UTF-8">
    <meta name="description" content="Online Examination System" />
    <meta name="keywords" content="Online Examination System" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet" />
    <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/images/icon.png" rel="icon">
    <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/snack.css" rel="stylesheet" type="text/css" />
    <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
</head>

<body <?php if ($ms == "1") {
            print 'onload="myFunction()"';
        } ?> class="page-header-fixed">
    <div class="overlay"></div>
    <div class="menu-wrap">
        <nav class="profile-menu">
            <div class="profile">
                <?php
                if ($avatar == NULL) {
                    print ' <img width="60" src="../assets/images/' . $gioitinh . '.png" alt="' . $ten . '">';
                } else {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($avatar) . '" width="60" alt="' . $ten . '"/>';
                }

                ?>
                <span><?php echo "$hotendem"; ?> <?php echo "$ten"; ?></span>
            </div>
            <div class="profile-menu-list">
                <a href="profile.php"><i class="fa fa-user"></i><span>Hồ sơ</span></a>
                <a href="logout.php"><i class="fa fa-sign-out"></i><span>Đăng xuất</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Đóng</button>
    </div>

    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <a href="./" class="logo-text"><span><img src="../hnue.png" alt="" height="50" width="50"></span></a>
                </div>

                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-right">


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                    <span class="user-name"><?php echo "$hotendem"; ?> <?php echo "$ten"; ?><i class="fa fa-angle-down"></i></span>
                                    <?php
                                    if ($avatar == NULL) {
                                        print ' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/' . $gioitinh . '.png" alt="' . $ten . '">';
                                    } else {
                                        echo '<img width="40" height="40" src="data:image/jpeg;base64,' . base64_encode($avatar) . '" class="img-circle avatar"  alt="' . $ten . '"/>';
                                    }

                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Hồ sơ</a></li>
                                    <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Đăng xuất</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
                                    <span><i class="fa fa-sign-out m-r-xs"></i>Đăng xuất</span>
                                </a>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-sidebar sidebar">
            <div class="page-sidebar-inner slimscroll">
                <div class="sidebar-header">
                    <div class="sidebar-profile">
                        <a href="javascript:void(0);" id="profile-menu-link">
                            <div class="sidebar-profile-image">
                                <?php
                                if ($avatar == NULL) {
                                    print ' <img class="img-circle img-responsive" src="../assets/images/' . $gioitinh . '.png" alt="' . $ten . '">';
                                } else {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($avatar) . '" class="img-circle img-responsive"  alt="' . $ten . '"/>';
                                }

                                ?>

                            </div>
                            <div class="sidebar-profile-details">
                                <span><?php echo "$hotendem"; ?> <?php echo "$ten"; ?><br><small>OES Student</small></span>
                            </div>
                        </a>
                    </div>
                </div>
                <ul class="menu accordion-menu">
                    <li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span>
                            <p>Trang chủ</p>
                        </a></li>
                    <li><a href="subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span>
                            <p>Môn học</p>
                        </a></li>
                    <li><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span>
                            <p>Sinh viên</p>
                        </a></li>
                    <li><a href="examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span>
                            <p>Bài kiểm tra</p>
                        </a></li>
                    <li><a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span>
                            <p>Kết quả</p>
                        </a></li>

                </ul>
            </div>
        </div>
        <div class="page-inner">
            <div class="page-title">
                <h3>Hồ sơ sinh viên</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li class="active">Hồ sơ</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <?php
                                            if ($avatar == NULL) {
                                                print ' <img class="img-responsive" src="../assets/images/' . $gioitinh . '.png" alt="' . $ten . '">';
                                            } else {
                                                echo '<img src="data:image/jpeg;base64,' . base64_encode($avatar) . '" class="img-responsive"  alt="' . $ten . '"/>';
                                            }

                                            ?></div>
                                        <div class="col-md-6">
                                            <?php print '<img width="150" src="../assets/qrcode/qr_img.php?d=' . $qrcodetxt . '">'; ?>
                                        </div>

                                    </div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mã sinh viên</td>
                                                <td><b><?php echo $masv; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Tên</td>
                                                <td><b><?php echo $ten; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Họ và tên đệm</td>
                                                <td><b><?php echo $hotendem; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Giới tính</td>
                                                <td><b><?php echo $gioitinh == 'Male' ? 'Nam' : 'Nữ'; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Ngày sinh</td>
                                                <td><b><?php echo $ngaysinh; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td colspan="2">Address<br><i><?php echo $diachi; ?></i></td>


                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Email</td>
                                                <td><b><?php echo $email; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Số điện thoại</td>
                                                <td><b><?php echo $sdt; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>Lớp</td>
                                                <td><b><?php echo $mycategory; ?></b></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>Khoa</td>
                                                <td><b><?php echo $makhoa; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="col-md-7">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <h3>Cập nhật ảnh đại diện</h3>
                                        <form action="pages/new_dp.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Chọn ảnh để tải lên</label>
                                                <input type="file" name="image" accept="image/*" required autocomplete="off">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                            <?php
                                            if ($avatar == NULL) {
                                            } else {
                                                print '<a'; ?> onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh hiện tại?')" <?php print ' class="btn btn-danger" href="pages/drop_dp.php">Xóa ảnh</a>';
                                                                                                        }

                                                                                                            ?>
                                        </form>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-7">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <h3>Đổi mật khẩu</h3>
                                        <form action="pages/new_pw.php" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nhập mật khẩu mới</label>
                                                <input type="password" id="password" class="form-control" name="pass1" required placeholder="Nhập mật khẩu mới">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Xác nhận mật khẩu mới</label>
                                                <input type="password" id="confirm_password" class="form-control" name="pass2" required placeholder="Nhập lại mật khẩu mới">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                            <script>
                                                var password = document.getElementById("password"),
                                                    confirm_password = document.getElementById("confirm_password");

                                                function validatePassword() {
                                                    if (password.value != confirm_password.value) {
                                                        confirm_password.setCustomValidity("Passwords Don't Match");
                                                    } else {
                                                        confirm_password.setCustomValidity('');
                                                    }
                                                }

                                                password.onchange = validatePassword;
                                                confirm_password.onkeyup = validatePassword;
                                            </script>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

            </div>

        </div>
    </main>
    <?php if ($ms == "1") {
    ?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
                                                                                        } else {
                                                                                        }
                                                                                            ?>
    <div class="cd-overlay"></div>

    <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets/plugins/pace-master/pace.min.js"></script>
    <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/plugins/switchery/switchery.min.js"></script>
    <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
    <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
    <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
    <script src="../assets/plugins/waves/waves.min.js"></script>
    <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
    <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
    <script src="../assets/plugins/toastr/toastr.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
    <script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
    <script src="../assets/js/modern.js"></script>

    <script src="../assets/js/canvasjs.min.js"></script>

    <script>
        function myFunction() {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>

</body>


</html>