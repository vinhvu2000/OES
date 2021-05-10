<?php include 'includes/check_user.php';
if (isset($_SESSION['mabkt'])) {
    $mabkt=$_SESSION['mabkt'];
    $masv = $_SESSION['user'];
    include '../database/config.php';

    $sql = "SELECT * FROM diem INNER JOIN baikt ON diem.mabkt=baikt.mabkt INNER JOIN monhoc on monhoc.mamh = baikt.mamh WHERE baikt.mabkt = '$mabkt' AND masv='$masv' ";
    $result = $conn->query($sql);
   // echo $sql;
    if ($conn->query($sql) == TRUE) {
        //echo "<br>Thành công!";
        //header("location:../assessment-info.php");
      }
      else
      {
       // echo "<br>Lỗi!";
        //header("location:../take-assessment.php?id=$mabkt");
      }
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            //echo print_r($row, true);
            $tenbkt = $row['tenbkt'];
            $tenmh = $row['tenmh'];
            $score = $row['diem'];
            $trangthai = $row['trangthai'];
            //$next_retake = $row['next_retake'];
            $taking_date = $row['thoigian'];
        }
    } else {
        //header("location:./");
    }
    $sql1 = "SELECT * FROM diem WHERE masv = '$masv' AND mabkt = '$mabkt' AND diem = (SELECT MAX(diem) FROM diem WHERE masv = '$masv' AND mabkt = '$mabkt') ";
    if ($conn->query($sql1) == TRUE) {
         while ($row = $result->fetch_assoc()){
            $trangthai = $row['trangthai'];
         }
      }
    // $conn->close();
} else {

    //header("location:./");
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>OES | Kết quả làm bài</title>

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
                    <li class="active"><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span>
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
                <h3>Kết quả bài kiểm tra</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="examinations.php">Bài kiểm tra</a></li>
                        <li class="active"><?php echo "$tenbkt"; ?></li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row col-md-12">
                    <div class="col-md-6">

                        <div class="row">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Thông tin</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats">
                                        <table class="table">
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Tên bài</td>
                                                    <td><?php echo "$tenbkt"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Tên môn</td>
                                                    <td><?php echo "$tenmh"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Họ và tên</td>
                                                    <td><?php echo "$hotendem $ten"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Điểm số</td>
                                                    <td>
                                                    <?php
                                                        $sql = "SELECT * FROM diem INNER JOIN baikt ON diem.mabkt=baikt.mabkt INNER JOIN monhoc on monhoc.mamh = baikt.mamh WHERE baikt.mabkt = '$mabkt' AND masv='$masv' ";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {

                                                            while ($row = $result->fetch_assoc()) {
                                                                //echo print_r($row, true);
                                                                $tenbkt = $row['tenbkt'];
                                                                $tenmh = $row['tenmh'];
                                                                $score = $row['diem'];
                                                                $trangthai = $row['trangthai'];
                                                                //$next_retake = $row['next_retake'];
                                                                $taking_date = $row['thoigian'];
                                                                print''.$score.' % <br>';
                                                            }
                                                        } 
                                                        
                                                    ?>
                                                    
                                                    </td>
                                                    
                                                </tr>
                                                <!-- <tr>
                                                    <th scope="row">5</th>
                                                    <td>Kiểm tra lại vào</td>
                                                    <td><?php //echo "$next_retake"; ?></td>
                                                </tr> -->


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h3 class="panel-title">Thông báo</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                if ($trangthai == "1") {
                                    print '
                                <div class="alert alert-success" role="alert">
                                        Tuyệt vời! Bạn đã vượt qua bài kiểm tra này.
                                    </div>';
                                } else {
                                    print '
                                <div class="alert alert-danger" role="alert">
                                       Oh no! Bạn cần cố gắng nhiều hơn.
                                    </div>';
                                }

                                ?>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </main>
<?php $conn->close();?>
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