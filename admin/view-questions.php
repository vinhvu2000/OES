<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';
if (isset($_GET['id'])) {
    include '../database/config.php';
    $mabkt = mysqli_real_escape_string($conn, $_GET['id']);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $sql = "SELECT * FROM baikt WHERE mabkt = '$mabkt'";
    $time_start = microtime(true);
    $result = $conn->query($sql);
    $time_end = microtime(true);
    $time = $time_end-$time_start;
    $open2 = fopen("../logs/sql.log", "a");
    fwrite($open2, "[$now]: $username | $sql | $time \n");
    fclose($open2);
    $sql = addslashes($sql);
    $sql2 = "insert into sql_log(thoigian,user,query,time) values ('$now','$username','$sql','$time');";
    if (mysqli_query($conn, $sql2)) {
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tenbkt = $row['tenbkt'];
        }
    } else {
        header("location:./");
    }
} else {
    header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>OES | Xem bài kiểm tra</title>
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
} ?> class="page-header-fixed page-horizontal-bar">
    <div class="overlay"></div>
    <div class="menu-wrap">
        <nav class="profile-menu">
            <div class="profile">
                <img width="60" src="../assets/images/Male.png" alt="admin">
                <span>Admin</span>
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
            <input type="text" name="keyword" class="form-control search-input"
                placeholder="Tìm kiếm sinh viên theo mã hoặc họ tên sinh viên..." required>
            <span class="input-group-btn">
                <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i
                        class="fa fa-times"></i></button>
            </span>
        </div>
    </form>
    <main class="page-content content-wrap container">
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
                        <ul class="nav navbar-nav navbar-left">
                            <li>


                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <li>
                                <a href="javascript:void(0);"
                                    class="waves-effect waves-button waves-classic show-search"><i
                                        class="fa fa-search"></i></a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                                    data-toggle="dropdown">
                                    <span class="user-name"><?php echo "$ten"; ?><i
                                            class="fa fa-angle-down"></i></span>
                                    <img class="img-circle avatar" width="40" height="40"
                                        src="../assets/images/Male.png" alt="admin">
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
        <div class="horizontal-bar sidebar">
            <div class="page-sidebar-inner slimscroll">
                <div class="sidebar-header">
                    <div class="sidebar-profile">
                        <a href="javascript:void(0);" id="profile-menu-link">
                            <div class="sidebar-profile-image">
                                <img class="img-circle img-responsive" src="../assets/images/Male.png" alt="admin">
                            </div>
                            <div class="sidebar-profile-details">
                                <span>Admin<br><small>OES Administrator</small></span>
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
                    <li class="active"><a href="questions.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-question-sign"></span>
                            <p>Câu hỏi</p>
                        </a></li>
                    <li><a href="notice.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-th-list"></span>
                            <p>Thông báo</p>
                        </a></li>
                    <li><a href="results.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-certificate"></span>
                            <p>Kết quả</p>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="page-inner">
            <div class="page-title">
                <h3>Xem bài kiểm tra</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Trang chủ</a></li>
                        <li><a href="examinations.php">Bài kiểm tra</a></li>
                        <li class="active"><?php echo "$tenbkt"; ?>
                        </li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="tabs-below" role="tabpanel">

                                <div class="tab-content">
                                    <?php
                                    include '../database/config.php';
                                    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';

                                    $sql = "SELECT * FROM cauhoi WHERE mabkt = '$mabkt'";
                                    $time_start = microtime(true);
$result = $conn->query($sql);
$time_end = microtime(true);
$time = $time_end-$time_start;
$open2 = fopen("../logs/sql.log", "a");
fwrite($open2, "[$now]: $username | $sql | $time \n");
fclose($open2);
$sql = addslashes($sql);
$sql2 = "insert into sql_log(thoigian,user,query,time) values ('$now','$username','$sql','$time');";
 if (mysqli_query($conn, $sql2)) {
 }
                                    if ($result->num_rows > 0) {
                                        $soch = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $type = $row['loaich'];
                                            $noidung = $row['noidung'];
                                            $dapan = $row['dapan'];
                                            $dapan1 = $row['dapan1'];
                                            $dapan2 = $row['dapan2'];
                                            $dapan3 = $row['dapan3'];
                                            $dapan4 = $row['dapan4'];
                                            $dapan5 = $row['dapan5'];
                                            $dapan6 = $row['dapan6'];
                                            if ($dapan1 == '') {
                                                $type = '2';
                                            } else {
                                                $type = '1';
                                            }

                                            if ($type == "2") {
                                                print '
											<div role="tabpanel" class="tab-pane ' . ($soch == 1 ? 'active' : '') . ' fade in" id="tab' . $soch . '">
                                                <p><b>' . $soch . '.</b> ' . $noidung . '</p>
											    <p><input type="text" name="' . $soch . '"  class="form-control" placeholder="Nhập câu trả lời">
											    <hr>
											    <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id=' . $row['mach'] . '"><i class="fa fa-pencil"></i></a>
											    <a'; ?> onclick = "return confirm('Bạn có chắc chắn muốn xóa câu hỏi
                                    này?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id=' . $row['mach'] . '&eid=' . $mabkt . '"><i class="fa fa-trash-o"></i></a>
                                            </div>';
                                            } else {
                                                print '
											<div role="tabpanel" class="tab-pane ' . ($soch == 1 ? 'active' : '') . ' fade in" id="tab' . $soch . '">
                                                <p><b>' . $soch . '.</b> ' . $noidung . '</p>';
                                                for ($i = 1; $i <= 6; $i++) {
                                                    if ($row['dapan' . $i . ''] == '') {
                                                        break;
                                                    } else {
                                                        print '<p><input type="checkbox" name="' . $soch . '"  class="form-control" value=' . $row['dapan' . $i . ''] . '> ' . $row['dapan' . $i . ''] . '</p>';
                                                    }
                                                }
                                                print '<hr>
                                                <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id=' . $row['mach'] . '"><i class="fa fa-pencil"></i></a>
                                                <a'; ?> onclick = "return confirm('Bạn có
                                    chắc chắn muốn xóa câu hỏi này?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id=' . $row['mach'] . '&eid=' . $mabkt . '"><i class="fa fa-trash-o"></i></a>
                                                </div>';
                                            }

                                            $soch = $soch + 1;
                                        }
                                    }
   
                                                                                                                                ?>

                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php
                                    include '../database/config.php';
                                    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';

                                    $sql = "SELECT * FROM cauhoi WHERE mabkt = '$mabkt'";
                                    $time_start = microtime(true);
$result = $conn->query($sql);
$time_end = microtime(true);
$time = $time_end-$time_start;
$open2 = fopen("../logs/sql.log", "a");
fwrite($open2, "[$now]: $username | $sql | $time \n");
fclose($open2);
$sql = addslashes($sql);
$sql2 = "insert into sql_log(thoigian,user,query,time) values ('$now','$username','$sql','$time');";
 if (mysqli_query($conn, $sql2)) {
 }

                                    if ($result->num_rows > 0) {
                                        $soch = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            if ($soch == "1") {
                                                print '<li role="presentation" class="active"><a href="#tab' . $soch . '" role="tab" data-toggle="tab">Q' . $soch . '</a></li>';
                                            } else {
                                                print '<li role="presentation"><a href="#tab' . $soch . '" role="tab" data-toggle="tab">Q' . $soch . '</a></li>';
                                            }

                                            $soch = $soch + 1;
                                        }
                                    } else {
                                    }

                                    ?>

                                </ul>
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
    <script src="../assets/js/modern.min.js"></script>
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