<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/log.log", "a");
fwrite($open, "[$now]: admin truy cập tab câu hỏi\n");
fclose($open);

if (isset($_GET['id'])) {
    $_SESSION['mamh'] = substr($_GET['id'], 0, 7);
    $_SESSION['mabkt'] = $_GET['id'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>OES | Add Questions</title>
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
                placeholder="Tìm kiếm sinh viên theo tên hoặc mã sinh viên..." required>
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
        <div class="page-sidebar sidebar">
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
                <h3>Thêm câu hỏi</h3>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div role="tabpanel">

                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab5" role="tab"
                                                        data-toggle="tab">Chọn đáp án chính xác</a></li>
                                                <li role="presentation"><a href="#tab6" role="tab"
                                                        data-toggle="tab">Điền vào chỗ chống</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                                    <form action="pages/add_type1.php" method="POST" name="myform">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Chọn môn học</label>
                                                            <select class="form-control" name="mamh" required
                                                                onchange="this.form.submit()">
                                                                <option value="" selected disabled>-Chọn môn học-
                                                                </option>
                                                                <?php
                                                                include '../database/config.php';

                                                                $sql = "SELECT * FROM monhoc WHERE trangthai = '1' ORDER BY tenmh";
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
                                                                        $selected = ($_SESSION['mamh'] == $row['mamh'] ? 'selected' : '');
                                                                        echo '<option value ="' . $row['mamh'] . '" ' . $selected . '>' . $row['tenmh'] . '</option>';
                                                                    }
                                                                }
                                                               
                                                                $conn->close();
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tên bài kiểm tra</label>
                                                            <select class="form-control" name="mabkt" required
                                                                onchange="this.form.submit()">
                                                                <option value="" selected disabled>-Chọn bài kiểm tra-
                                                                </option>
                                                                <?php
                                                                $id = $_SESSION['mamh'];
                                                                include '../database/config.php';
                                                 
                                                                $sql = "SELECT * FROM baikt WHERE mamh ='$id' ORDER BY tenbkt";
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
                                                                        $selected = ($_SESSION['mabkt'] == $row['mabkt'] ? 'selected' : '');
                                                                        print '<option value="' . $row['mabkt'] . '"' . $selected . '>' . $row['tenbkt'] . '</option>';
                                                                    }
                                                                }
                                                               
                                                                $conn->close();
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Câu hỏi</label>
                                                            <input type="text"
                                                                value="<?php echo $_SESSION['cauhoi'] ?>"
                                                                class="form-control" placeholder="Nhập câu hỏi"
                                                                name="cauhoi" required autocomplete="off">
                                                        </div>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th width="100">Số thứ tự</th>
                                                                    <th>Câu trả lời</th>
                                                                    <th width="100">Đáp án</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <input type="hidden"
                                                                    value="<?php echo $_SESSION['dem']; ?>"
                                                                    name="dem">
                                                                <?php
                                                                for ($i = 1; $i <= $_SESSION['dem']; $i++) {
                                                                    $checked = $_SESSION['dapan'] == 'dapan' . $i ? 'checked' : '';
                                                                    echo '
                                                            <tr>
                                                                <th scope="row">' . $i . '.</th>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Đáp án ' . $i . '</label>
                                                                        <input type="text" value="' . $_SESSION['dapan' . $i . ''] . '" class="form-control" placeholder="Nhập đáp án ' . $i . '" name="dapan' . $i . '" autocomplete="off">
                                                                    </div>
                                                                </td>
                                                                <td><input type="checkbox" name="dapan[]" ' . $checked . ' value="dapan' . $i . '" ></td>
                                                            </tr>';
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                        <?php if ($_SESSION['dem'] < 6) {
                                                                    echo '<button type="submit" name="cong" class="btn btn-primary" onclick=" x = document.myform.dem.value;x++;document.myform.dem.value=x;">Thêm đáp án</button>';
                                                                } ?>
                                                        <?php if ($_SESSION['dem'] > 0) {
                                                                    echo '<button type="submit" name="tru" class="btn btn-primary" onclick=" x = document.myform.dem.value;x--;document.myform.dem.value=x;">Xóa đáp án</button><br><br>';
                                                                } ?>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ảnh minh họa</label>
                                                            <input type="file" name="image" accept="image/*"
                                                                autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                value="<?php echo 'false'; ?>"
                                                                name="check"></input>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"
                                                            onclick="document.myform.check.value='true';">Thêm câu
                                                            hỏi</button>
                                                    </form>
                                                </div>


                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                                    <form action="pages/add_type2.php?type=fib" method="POST"
                                                        name="myform2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Chọn môn học</label>
                                                            <select class="form-control" name="mamh" required
                                                                onchange="this.form.submit()">
                                                                <option value="" selected disabled>-Chọn môn học-
                                                                </option>
                                                                <?php
                                                                include '../database/config.php';

                                                                $sql = "SELECT * FROM monhoc WHERE trangthai = '1' ORDER BY tenmh";
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
                                                                        $selected = ($_SESSION['mamh'] == $row['mamh'] ? 'selected' : '');
                                                                        echo '<option value ="' . $row['mamh'] . '" ' . $selected . '>' . $row['tenmh'] . '</option>';
                                                                    }
                                                                }
                                                                
                                                                
                                                                $conn->close();
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tên bài kiểm tra</label>
                                                            <select class="form-control" name="mabkt" required
                                                                onchange="this.form.submit()">
                                                                <option value="" selected disabled>-Chọn bài kiểm tra-
                                                                </option>
                                                                <?php
                                                                $id = $_SESSION['mamh'];
                                                                include '../database/config.php';
  
                                                                $sql = "SELECT * FROM baikt WHERE mamh ='$id' ORDER BY tenbkt";
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
                                                                        $selected = ($_SESSION['mabkt'] == $row['mabkt'] ? 'selected' : '');
                                                                        print '<option value="' . $row['mabkt'] . '"' . $selected . '>' . $row['tenbkt'] . '</option>';
                                                                    }
                                                                }
                                                                
                                                               
                                                                $conn->close();
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Câu hỏi</label>
                                                            <input type="text"
                                                                value="<?php echo $_SESSION['cauhoi'] ?>"
                                                                class="form-control" placeholder="Nhập câu hỏi"
                                                                name="cauhoi2" required autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Câu trả lời</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nhập câu trả lời" name="answer" required
                                                                autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden"
                                                                value="<?php echo 'false'; ?>"
                                                                name="check2"></input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ảnh minh họa</label>
                                                            <input type="file" name="image2" accept="image/*"
                                                                autocomplete="off">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"
                                                            onclick="document.myform2.check2.value='true';">Thêm câu
                                                            hỏi</button>
                                                    </form>
                                                </div>

                                            </div>
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