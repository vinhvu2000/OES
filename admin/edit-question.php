<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';

include '../database/config.php';
if (isset($_GET['id'])) {
    $mach = mysqli_real_escape_string($conn, $_GET['id']);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);
    $sql = "SELECT * FROM cauhoi WHERE mach = '$mach'";
    $result = $conn->query($sql);
    $time_end = microtime(true);
    $time = $time_end-$time_start;
    $open2 = fopen("../../logs/sql.log", "a");

    fwrite($open2, "[$now]: $username | $sql | $time \n");
    fclose($open2);
    $sql2 = "INSERT INTO sql_log(thoigian,user,query,time) VALUES ('$now','$username','$sql','$time');";
    if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $type = $row['loaich'];
            $noidung = $row['noidung'];
            $dapan = $row['dapan'];
            $image = $row['image'];
            if ($type == "2") {
                $act = "tab2";
            } else {
                $array[1] = $row['dapan1'];
                $array[2] = $row['dapan2'];
                $array[3] = $row['dapan3'];
                $array[4] = $row['dapan4'];
                $array[5] = $row['dapan5'];
                $array[6] = $row['dapan6'];
                if (!isset($_GET['dem'])) {
                    $dem = 6;
                    foreach ($array as $s => $num) {
                        if ($num == '') {
                            unset($a[$s]);
                            $dem--;
                        }
                    }
                } else {
                    $dem = $_GET['dem'];
                }
            }
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

    <title>OES | Sửa câu hỏi</title>

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
                    <li class="active"><a href="examinations.php" class="waves-effect waves-button"><span
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
                    <li><a href="results.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-certificate"></span>
                            <p>Kết quả</p>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="page-inner">
            <div class="page-title">
                <h3>Sửa câu hỏi : <?php echo "$mach"; ?>
                </h3>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <?php
                                        if ($type == "1") {
                                            print '
                                            <form action="pages/update_question.php?id=' . $mach . '&type=1" method="POST" name="myform">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Câu hỏi</label>
                                                            <input type="text" value="' . $noidung . '" class="form-control" placeholder="Nhập câu hỏi" name="noidung" required autocomplete="off">
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
                                                                <input type="hidden" value="' . $dem . '" name="dem">';
                                            for ($i = 1; $i <= $dem; $i++) {
                                                $checked = $dapan == 'dapan' . $i ? 'checked' : '';
                                                echo '
                                                            <tr>
                                                                <th scope="row">' . $i . '.</th>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Đáp án ' . $i . '</label>
                                                                        <input type="text" value="' . $array[$i] . '" class="form-control" placeholder="Nhập đáp án ' . $i . '" name="dapan' . $i . '" autocomplete="off">
                                                                    </div>
                                                                </td>
                                                                <td><input type="checkbox" name="dapan[]" ' . $checked . ' value="dapan' . $i . '" ></td>
                                                            </tr>';
                                            }
                                            echo '
                                                            </tbody>
                                                        </table>';
                                            if ($dem < 6) {
                                                echo '<button type="submit" name="cong" class="btn btn-primary" onclick=" x = document.myform.dem.value;x++;document.myform.dem.value=x;">Thêm đáp án</button> ';
                                            }
                                            if ($dem > 0) {
                                                echo '<button type="submit" name="tru" class="btn btn-primary" onclick=" x = document.myform.dem.value;x--;document.myform.dem.value=x;">Xóa đáp án</button><br><br>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ảnh minh họa</label>
                                                            <input type="file" name="image" accept="image/*" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" value="false" name="check"></input>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" onclick="document.myform.check.value=' . 'true' . '">Cập nhật câu hỏi</button>
                                                    </form>';
                                            }

                                            //   <form action="pages/update_question.php?type=mc" method="POST">
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Câu hỏi</label>
                                            //             <input type="text" class="form-control" value="' . $question . '" placeholder="Enter question" name="question" required autocomplete="off">
                                            //             </div>

                                            //   <table class="table table-bordered">
                                            //     <thead>
                                            //         <tr>
                                            //             <th width="100">STT</th>
                                            //             <th>Đáp án</th>
                                            //             <th  width="100" >Câu trả lời</th>
                                            //         </tr>
                                            //     </thead>
                                            //     <tbody>
                                            //         <tr>
                                            //             <th scope="row" >1</th>
                                            //             <td>
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Đáp án A</label>
                                            //             <input type="text" value="' . $opt1 . '" class="form-control" placeholder="Nhập đáp án A" name="opt1" required autocomplete="off">
                                            //             </div>
                                            // 			</td>
                                            //             <td><input type="radio"';
                                            //         if ($ans == "option1") {
                                            //             print ' checked ';
                                            //         }
                                            //         print ' name="answer" value="option1" required></td>

                                            //         </tr>
                                            //         <tr>
                                            //             <th scope="row">2</th>
                                            //             <td>
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Đáp án B</label>
                                            //             <input type="text" class="form-control" value="' . $opt2 . '" placeholder="Nhập đáp án B" name="opt2" required autocomplete="off">
                                            //             </div>
                                            // 			</td>
                                            //             <td><input type="radio"';
                                            //         if ($ans == "option2") {
                                            //             print ' checked="true" ';
                                            //         }
                                            //         print ' name="answer" value="option2" required></td>

                                            //         </tr>
                                            //         <tr>
                                            //             <th scope="row">3</th>
                                            //             <td>
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Đáp án C</label>
                                            //             <input type="text" class="form-control" value="' . $opt3 . '" placeholder="Nhập đáp án C" name="opt3" required autocomplete="off">
                                            //             </div>
                                            // 			</td>
                                            //             <td><input type="radio"';
                                            //         if ($ans == "option3") {
                                            //             print ' checked="true" ';
                                            //         }
                                            //         print ' name="answer" value="option3" required></td>

                                            //         </tr>

                                            // 		<tr>
                                            //             <th scope="row">3</th>
                                            //             <td>
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Đáp án D</label>
                                            //             <input type="text" class="form-control" value="' . $opt4 . '" placeholder="Nhập đáp án D" name="opt4" required autocomplete="off">
                                            //             </div>
                                            // 			</td>
                                            //             <td><input type="radio"';
                                            //         if ($ans == "option4") {
                                            //             print ' checked="true" ';
                                            //         }
                                            //         print ' name="answer" value="option4" required></td>

                                            //         </tr>
                                            //     </tbody>
                                            // </table>
                                            // <input type="hidden" name="type" value="MC">
                                            // <input type="hidden" name="question_id" value="' . $question_id . '">

                                            //  <button type="submit" class="btn btn-primary">Submit</button>



                                            // 			</form>';
                                            //     } else {
                                            //         print '
                                            //      <form action="pages/update_question.php?type=fib" method="POST">
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Câu hỏi</label>
                                            //             <input type="text" class="form-control"  value="' . $question . '" placeholder="Nhập câu hỏi" name="question" required autocomplete="off">
                                            //             </div>
                                            // 			<div class="form-group">
                                            //             <label for="exampleInputEmail1">Đáp án</label>
                                            //             <input type="text" class="form-control"  value="' . $ans . '" placeholder="Nhập đáp án" name="answer" required autocomplete="off">
                                            //             </div>
                                            //      <input type="hidden" name="question_id"  value="' . $question_id . '">
                                            //     <button type="submit" class="btn btn-primary">Sửa</button>
                                            //    </form>';
                                        } else {
                                            print ' 
                                        <form action="pages/update_question.php?type=2&id=' . $mach . '" method="POST">
                                        	<div class="form-group">
                                                <label for="exampleInputEmail1">Câu hỏi</label>
                                                <input type="text" class="form-control"  value="' . $noidung . '" placeholder="Nhập câu hỏi" name="noidung" required autocomplete="off">
                                            </div>
                                        	<div class="form-group">
                                                <label for="exampleInputEmail1">Đáp án</label>
                                                <input type="text" class="form-control"  value="' . $dapan . '" placeholder="Nhập đáp án" name="answer" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ảnh minh họa</label>
                                                <input type="file" name="image" accept="image/*" autocomplete="off">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Cập nhật câu hỏi</button>
                                        </form>';
                                        }
                                        ?>
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