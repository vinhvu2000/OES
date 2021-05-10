<?php include 'includes/check_user.php';
include 'includes/fetch_records.php';
?>
<!DOCTYPE html>
<html>

<head>

    <title>OES | Sinh viên</title>

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
    <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

</head>

<body class="page-header-fixed">
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
        <button class="close-button" id="close-button">Close Menu</button>
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
                    <li class="active"><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span>
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
                <h3>Danh sách sinh viên trong lớp</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li class="active">Danh sách sinh viên học cùng lớp</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body">
                                <?php
                                //         include '../database/config.php';

                                //         $sql = "SELECT * FROM sinhvien WHERE makhoa = '$makhoa' ORDER BY masv";
                                //         $result = $conn->query($sql);

                                //         if ($result->num_rows > 0) {

                                //             while ($row = $result->fetch_assoc()) {
                                //                 $user_avatar = $row['avatar'];
                                //                 $user_gender = $row['gioitinh'];
                                //                 print '
                                // 	<div class="search-item clearfix">
                                //     <div class="pull-left m-r-md">
                                // 	';
                                //                 if ($user_avatar == NULL) {
                                //                     print ' <img class="img-circle" width="80" src="../assets/images/' . ($user_gender == 'Nam' ? 'Male' : 'Female') . '.png" alt="' . $row['ten'] . '">';
                                //                 } else {
                                //                     echo '<img src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" class="img-circle" width="80"  alt="' . $row['ten'] . '"/>';
                                //                 }
                                //                 print '	

                                //     </div>
                                //     <h3 class="no-m m-t-xs"><a href="javascript:void(0);">' . $row['hotendem'] . ' ' . $row['ten'] . '</a></h3>
                                //     <p>' . $row['email'] . '<br>' . $user_gender . '</p>
                                //    </div>';
                                //             }
                                //         } else {
                                //             echo "Không có dữ liệu";
                                //         }
                                //         $conn->close();
                                
                                // include '../database/config.php';
                                // $sql = "SELECT * FROM dangki INNER JOIN loptinchi ON dangki.maltc = loptinchi.maltc INNER JOIN monhoc ON monhoc.mamh = loptinchi.mamh WHERE dangki.masv = '$masv'";
                                // $result = $conn->query($sql);
                                // if ($result->num_rows > 0) {
                                //     $tabno = 1;
                                //     while ($row = $result->fetch_assoc()) {
                                //         print '
                                //         <div class="panel panel-default">
                                //         <div class="panel-heading" role="tab" id="heading' . $tabno . '">
                                //         <h4 class="panel-title">
                                //         <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $tabno . '" aria-expanded="false" aria-controls="collapse' . $tabno . '">
                                //         ' . $row['tenmh'] . '
                                //         </a>
                                //         </h4>
                                //         </div>';
                                //         $maltc = $row['maltc'];
                                        // $sql1 = "SELECT * FROM (SELECT * FROM dangki WHERE maltc = '$maltc') as dk INNER JOIN sinhvien ON dk.masv = sinhvien.masv ";
                                        // $result1 = $conn->query($sql1);
                                        // if ($result1->num_rows > 0) {
                                        //     while ($row1 = $result1->fetch_assoc()) {
                                //                 $user_avatar = $row1['avatar'];
                                //                 $user_gender = $row1['gioitinh'];
                                //                 print '
                                //                 <div id="collapse' . $tabno . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $tabno . '">
                                //                 <div class="panel-body">
                                //                     <div class="search-item clearfix">
                                //                     <div class="pull-left m-r-md">
                                //                     ';
                                //                 if ($user_avatar == NULL) {
                                //                     print ' <img class="img-circle" width="80" src="../assets/images/' . ($user_gender == 'Nam' ? 'Male' : 'Female') . '.png" alt="' . $row1['ten'] . '">';
                                //                 } else {
                                //                     echo '<img src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" class="img-circle" width="80"  alt="' . $row1['ten'] . '"/>';
                                //                 }
                                //                 print '	
                                //                     </div>
                                //                     <h3 class="no-m m-t-xs"><a href="javascript:void(0);">' . $row1['hotendem'] . ' ' . $row1['ten'] . '</a></h3>
                                //                     <p>' . $row1['email'] . '<br>' . $user_gender . '</p>
                                                    
                                //                 </div>';
                                //             }
                                //         }
                                //         print '
                                //         </div>
                                //         </div>
                                //         </div>';
                                //         $tabno++;
                                //     }
                                // } else {
                                //     print '
                                //         <div class="alert alert-info" role="alert">
                                //         Không tìm thấy dữ liệu.
                                //         </div>';
                                // }
                                // $conn->close();

                                
?>

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    include '../database/config.php';
                                    $sql = "SELECT * FROM dangki INNER JOIN loptinchi ON dangki.maltc = loptinchi.maltc INNER JOIN monhoc ON monhoc.mamh = loptinchi.mamh WHERE dangki.masv = '$masv'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $tabno = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            print '
                                            <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading' . $tabno . '">
                                            <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $tabno . '" aria-expanded="false" aria-controls="collapse' . $tabno . '">
                                            ' . $row['tenmh'] . '
                                            </a>
                                            </h4>
                                            </div>
                                            <div id="collapse' . $tabno . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $tabno . '">
                                            <div class="panel-body" style = "display:;"> ';
                                            $maltc = $row['maltc'];
                                            $sql1 = "SELECT * FROM (SELECT * FROM dangki WHERE maltc = '$maltc') as dk INNER JOIN sinhvien ON dk.masv = sinhvien.masv ";
                                            $result1 = $conn->query($sql1);
                                            if ($result1->num_rows > 0) {
                                                while ($row1 = $result1->fetch_assoc()) {
                                                    if ($user_avatar == NULL) {
                                                    print ' <img class="img-circle" width="80" src="../assets/images/' . ($row1['gioitinh'] == 'Nam' ? 'Male' : 'Female') . '.png" alt="' . $row1['ten'] . '">';
                                                } else {
                                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" class="img-circle" width="80"  alt="' . $row1['ten'] . '"/>';
                                                }
                                                print '	
                                                    <h3 class="no-m m-t-xs"><a href="javascript:void(0);">' . $row1['hotendem'] . ' ' . $row1['ten'] . '</a></h3>
                                                    <p>' . $row1['email'] . '<br>' . $user_gender . '</p>';
                                                }
                                            }
                                            print'
                                            </div>
                                            </div>
                                            </div>';
                                                                                        $tabno++;
                                        }
                                    }
                                        else {
                                                                                    print '
                                            <div class="alert alert-info" role="alert">
                                            Không tìm thấy dữ liệu.
                                            </div>';
                                    }
                                    $conn->close();

                                    ?>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

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



</body>


</html>