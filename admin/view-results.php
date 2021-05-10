<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';

if (isset($_GET['eid'])) {
    include '../database/config.php';
    $exam_id = $_GET['eid'];
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);

    $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $exam_name = $row['exam_name'];
        }
    } else {
    }
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    $conn->close();
} else {
    header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>OES | Kết quả <?php echo "$exam_name" ?>
    </title>

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
    <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"
        type="text/css">
    <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/images/icon.png" rel="icon">
    <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css" />
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/snack.css" rel="stylesheet" type="text/css" />
    <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
    <link href="../assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
        type="text/css" />

</head>

<body <?php if ($ms == "1") {
    print 'onload="myFunction()"';
} ?> class="page-header-fixed">
    <div class="overlay"></div>
    <div class="menu-wrap">
        <nav class="profile-menu">
            <div class="profile">
                <?php
                if ($myavatar == null) {
                    print ' <img width="60" src="../assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
                } else {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($myavatar) . '" width="60" alt="' . $myfname . '"/>';
                }

                ?>
                <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span>
            </div>
            <div class="profile-menu-list">
                <a href="profile.php"><i class="fa fa-user"></i><span>Hồ sơ</span></a>
                <a href="logout.php"><i class="fa fa-sign-out"></i><span>Đăng xuất</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Đóng</button>
    </div>
    <form class="search-form" action="search.php" method="GET">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control search-input" placeholder="Search student..."
                required>
            <span class="input-group-btn">
                <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i
                        class="fa fa-times"></i></button>
            </span>
        </div>
    </form>
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <a href="./" class="logo-text"><img src="../hnue.png" alt="" height="50" width="50"></span></a>
                </div>
                <div class="search-button">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                            class="fa fa-search"></i></a>
                </div>
                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="javascript:void(0);"
                                    class="waves-effect waves-button waves-classic show-search"><i
                                        class="fa fa-search"></i></a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                                    data-toggle="dropdown">
                                    <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i
                                            class="fa fa-angle-down"></i></span>
                                    <?php
                                    if ($myavatar == null) {
                                        print ' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
                                    } else {
                                        echo '<img width="40" height="40" src="data:image/jpeg;base64,' . base64_encode($myavatar) . '" class="img-circle avatar"  alt="' . $myfname . '"/>';
                                    }

                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Hồ sơ</a>
                                    </li>
                                    <li role="presentation"><a href="logout.php"><i
                                                class="fa fa-sign-out m-r-xs"></i>Đăng xuất</a></li>
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
                                if ($myavatar == null) {
                                    print ' <img class="img-circle img-responsive" src="../assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
                                } else {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($myavatar) . '" class="img-circle img-responsive"  alt="' . $myfname . '"/>';
                                }

                                ?>

                            </div>
                            <div class="sidebar-profile-details">
                                <span><?php echo "$myfname"; ?>
                                    <?php echo "$mylname"; ?><br><small>OES
                                        Administrator</small></span>
                            </div>
                        </a>
                    </div>
                </div>
                <ul class="menu accordion-menu">
                    <li><a href="./" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-home"></span>
                            <p>Trang chủ</p>
                        </a></li>
                    <li><a href="departments.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-folder-open"></span>
                            <p>Khoa</p>
                        </a></li>
                    <li><a href="categories.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon glyphicon-tags"></span>
                            <p>Lớp</p>
                        </a></li>
                    <li><a href="subject.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon glyphicon-file"></span>
                            <p>Môn học</p>
                        </a></li>
                    <li><a href="students.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon glyphicon-user"></span>
                            <p>Sinh viên</p>
                        </a></li>
                    <li><a href="examinations.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-book"></span>
                            <p>Bài kiểm tra</p>
                        </a></li>
                    <li><a href="questions.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-question-sign"></span>
                            <p>Câu hỏi</p>
                        </a></li>
                    <li><a href="notice.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-th-list"></span>
                            <p>Thông báo</p>
                        </a></li>
                    <li class="active"><a href="results.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-certificate"></span>
                            <p>Kết quả</p>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="page-inner">
            <div class="page-title">
                <h3>Kết quả <?php echo "$exam_name" ?>
                </h3>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <?php
                                            include '../database/config.php';
                                            $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

                                            $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Mã sinh viên</th>
												<th>Họ và tên</th>
                                                <th>Điểm số</th>
                                                <th>Trạng thái</th>
												<th>Ngày làm</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mã sinh viên</th>
                                                <th>Họ và tên</th>
                                                <th>Điểm số</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày làm</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                while ($row = $result->fetch_assoc()) {
                                                    print '
										       <tr>
                                                <td>' . $row['student_id'] . '</td>
												<td>' . $row['student_name'] . '</td>
                                                <td><b>' . $row['score'] . '%</b></td>
												<td>' . $row['status'] . '</td>
												<td>' . $row['date'] . '</td>
												<td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Tùy chọn
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                  
													<li><a'; ?> onclick = "return confirm('Cho phép <?php echo $row['student_name']; ?>
                                            làm lại bài kiểm tra ?')" <?php print ' href="pages/re-activate.php?rid=' . $row['record_id'] . '&eid=' . $exam_id . '">Làm lại</a></li>
									
													
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                                }

                                                print '
									   </tbody>
                                       </table>  ';
                                            } else {
                                                print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
                                            }
                                            $time_end = microtime(true);
$time = $time_end - $time_start;
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/sql.log", "a");
fwrite($open, "[$now]: $username | $sql | $time \n");
fclose($open);
                                                                                                                                                $conn->close();

                                                                                                                                                        ?>




                                        </div>
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
                                                                                                                                                            ?>
    <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?>
    </div> <?php
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
    <script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
    <script src="../assets/plugins/moment/moment.js"></script>
    <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
    <script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../assets/js/modern.min.js"></script>
    <script src="../assets/js/pages/table-data.js"></script>
    <script src="../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../assets/plugins/summernote-master/summernote.min.js"></script>
    <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="../assets/js/pages/form-elements.js"></script>


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