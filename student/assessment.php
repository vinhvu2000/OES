<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include 'includes/check_user.php';
include 'includes/check_reply.php';
include '../includes/uniques.php';
if (isset($_SESSION['mabkt'])) {
    include '../database/config.php';
    $mabkt = $_SESSION['mabkt'];
    $maltc = $_SESSION['maltc'];
    $retake_status = $_SESSION['student_retake'];
    $tgnop = date('Y-m-d h-i-s', time());
    // if ($retake_status == "1") {
    //     $sql = "DELETE FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$mabkt'";

    //     if ($conn->query($sql) === TRUE) {
    //     } else {
    //     }
    // }


    $sql = "SELECT * FROM baikt WHERE mabkt = '$mabkt' AND maltc = '$maltc' AND trangthai = '1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $tenbkt = $row['tenbkt'];
            $subject = $row['subject'];//chi lay dc ma mon hoc
            $deadline = $row['deadline'];
            $thoigian = $row['thoigian'];
            $diemtoithieu = $row['diemtoithieu'];// diem toi thieu
            //$reexam = $row['re_exam'];
            //$terms = $row['terms'];
            $trangthai = $row['trangthai'];
            $today_date = date('Y/m/d');
            //$next_retake = date('m/d/Y', strtotime($today_date . ' + ' . $reexam . ' days'));

            //$today_date = date('m/d/Y');
        }
    } else {
        header("location:examinations.php");
    }
} else {
    header("location:take-assessment.php?id=$mabkt");
}



// $sql = "SELECT * FROM diem WHERE masv = '$masv'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     while ($row = $result->fetch_assoc()) {
//        // header("location:./take-assessment.php?id=$mabkt");
//     }
// } 
// else {
//     $myname = "$hotendem $ten";
//     $recid = 'RS' . get_rand_numbers(14) . '';

//     $sql = "INSERT INTO tbl_assessment_records (record_id, student_id, student_name, exam_name, exam_id, score, status, next_retake, date)
//     VALUES ('$recid', '$myid', '$myname', '$tenbkt', '$mabkt', '0', 'FAIL', '$next_retake', '$today_date')";

//     if ($conn->query($sql) === TRUE) {
//     } else {
//     }
// }

//$myname = "$hotendem $ten";
//$recid = 'RS' . get_rand_numbers(14) . '';



?>
<!DOCTYPE html>
<html>

<head>
    <title>OES | Kiểm tra</title>
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
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script>
    </script>

</head>

<body <?php if ($ms == "1") {
            print 'onload="myFunction()"';
        } ?> class="page-header-fixed page-horizontal-bar">
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

    <main class="page-content content-wrap container">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <a class="logo-text"><span>
                            <div id="quiz-time-left"></div>
                        </span></a>
                </div>

                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-left">


                        </ul>
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
        <div class="horizontal-bar sidebar">
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
                                <span><?php echo "$hotendem"; ?> <?php echo "$ten"; ?></span><br><small>OES Student</small></span>
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
                <h3>Bài kiểm tra</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li><a href="examinations.php">Bài kiểm tra</a></li>
                        <li class="active"><?php echo "$tenbkt"; ?></li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="tabs-below" role="tabpanel">
                                <form action="pages/submit_assessment.php" method="POST" name="quiz" id="quiz_form">
                                    <div class="tab-content">
                                        <?php
                                        include '../database/config.php';
                                        $sql = "SELECT * FROM cauhoi WHERE mabkt = '$mabkt'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $qno = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                $qsid = $row['mach'];
                                                $qs = $row['noidung'];
                                                $type = $row['loaich'];
                                                $dapan1 = $row['dapan1'];
                                                $dapan2 = $row['dapan2'];
                                                $dapan3 = $row['dapan3'];
                                                $dapan4 = $row['dapan4'];
                                                $dapan5 = $row['dapan5'];
                                                $dapan6 = $row['dapan6'];
                                                $ans = $row['dapan'];
                                                $enan = $row[$ans];
                                                $arr1 = explode('|',$row['dapan']);
                                                $arr1 = count($arr1);
                                                
                                                if ($type == "2") {
                                                    if ($qno == "1") {
                                                        print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="text" name="an' . $qno . '"  class="form-control" placeholder="Nhập câu trả lời của bạn" autocomplete="off">
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($ans) . '">
                                             <input type="hidden" name="mach' . $qno . '" value="' . $qsid . '">
                                             </div>
											';
                                                    } else {
                                                        print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="text" name="an' . $qno . '"  class="form-control" placeholder="Nhập câu trả lời của bạn" autocomplete="off">
					                         <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($ans) . '">
                                             <input type="hidden" name="mach' . $qno . '" value="' . $qsid . '">
                                             </div>
											';
                                                    }

                                                    $qno = $qno + 1;
                                                } else if($type =="1") {

                                                    if ($qno == "1") {

                                                        print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan1 . '"> ' . $dapan1 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan2 . '"> ' . $dapan2 . '</p>';
											 if ( $dapan3 != "") {
                                                print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan3 . '"> ' . $dapan3 . '</p>';
                                            }                                             
                                            if ( $dapan4 != "") {
                                                print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan4 . '"> ' . $dapan4 . '</p>';
                                                }
                                            if ( $dapan5 != "") {
                                                print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan5 . '"> ' . $dapan5 . '</p>';
                                            }                                             
                                            if ( $dapan6 != "") {
                                                print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan6 . '"> ' . $dapan6 . '</p>';
                                                }
                                             print '
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($enan) . '">
                                             <input type="hidden" name="mach' . $qno . '" value="' . $qsid . '">
                                             </div>
											';
                                                    } else {
                                                        print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan1 . '"> ' . $dapan1 . '</p>
											 <p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan2 . '"> ' . $dapan2 . '</p>';
											 if ( $dapan3 != "") {
                                                print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan3 . '"> ' . $dapan3 . '</p>';
                                            }                                             
                                            if ( $dapan4 != "") {
                                                print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan4 . '"> ' . $dapan4 . '</p>';
                                                }
                                             if ( $dapan5 != "") {
                                                 print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan5 . '"> ' . $dapan5 . '</p>';
                                             }                                             
                                             if ( $dapan6 != "") {
                                                 print '<p><input type="radio" name="an' . $qno . '"  class="form-control" value="' . $dapan6 . '"> ' . $dapan6 . '</p>';
                                                 }
                                              print '
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($enan) . '">
                                             <input type="hidden" name="mach' . $qno . '" value="' . $qsid . '">
                                             </div>
											';
                                                    }

                                                    $qno = $qno + 1;
                                                }
                                                else
                                                {
                                                    if ($qno == "1") {

                                                        print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan1 . '"> ' . $dapan1 . '</p>
											 <p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan2 . '"> ' . $dapan2 . '</p>';
											 if ( $dapan3 != "") {
                                                print '<p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan3 . '"> ' . $dapan3 . '</p>';
                                            }                                             
                                            if ( $dapan4 != "") {
                                                print '<p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan4 . '"> ' . $dapan4 . '</p>';
                                                }
                                             if ( $dapan5 != "") {
                                                 print '<p><input type="radio" name="an' . $qno . '[]"  class="form-control" value="' . $dapan5 . '"> ' . $dapan5 . '</p>';
                                             }                                             
                                             if ( $dapan6 != "") {
                                                 print '<p><input type="radio" name="an' . $qno . '[]"  class="form-control" value="' . $dapan6 . '"> ' . $dapan6 . '</p>';
                                                 }
                                              print '
											 <input type="hidden" name="qst' . $qno . '[]" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '[]" value="' . base64_encode($enan) . '">
                                             <input type="hidden" name="mach' . $qno . '" value="' . $qsid . '">
                                             </div>
											';
                                            print '<script>
                                            var max_limit = '.$arr1.'; // Max Limit
                                            $(document).ready(function (){
                                            $(".form-control:input:checkbox").each(function (index){
                                                this.checked = (".form-control:input:checkbox" < max_limit);
                                            }).change(function (){
                                                if ($(".form-control:input:checkbox:checked").length > max_limit){
                                                    this.checked = false;
                                                }
                                            });
                                            });
                                            </script>';
                                                    } else {
                                                        print '
											<div role="tabpanel" class="tab-pane fade in" id="tab' . $qno . '">
                                             <p><b>' . $qno . '.</b> ' . $qs . '</p>
											 <p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan1 . '"> ' . $dapan1 . '</p>
											 <p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan2 . '"> ' . $dapan2 . '</p>';
											 if ( $dapan3 != "") {
                                                print '<p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan3 . '"> ' . $dapan3 . '</p>';
                                            }                                             
                                            if ( $dapan4 != "") {
                                                print '<p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan4 . '"> ' . $dapan4 . '</p>';
                                                }
                                             if ( $dapan5 != "") {
                                                 print '<p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan5 . '"> ' . $dapan5 . '</p>';
                                             }                                             
                                             if ( $dapan6 != "") {
                                                 print '<p><input type="checkbox" name="an' . $qno . '[]"  class="form-control" value="' . $dapan6 . '"> ' . $dapan6 . '</p>';
                                                 }
                                              print '
											 <input type="hidden" name="qst' . $qno . '" value="' . base64_encode($qs) . '">
											 <input type="hidden" name="ran' . $qno . '" value="' . base64_encode($enan) . '">
                                             <input type="hidden" name="mach' . $qno . '" value="' . $qsid . '">
                                             </div>
											';
                                            print '<script>
                                            var max_limit = '.$arr1.'; // Max Limit
                                            $(document).ready(function (){
                                            $(".form-control:input:checkbox").each(function (index){
                                                this.checked = (".form-control:input:checkbox" < max_limit);
                                            }).change(function (){
                                                if ($(".form-control:input:checkbox:checked").length > max_limit){
                                                    this.checked = false;
                                                }
                                            });
                                            });
                                            </script>';
                                                    }

                                                    $qno = $qno + 1;
                                                }
                                            }
                                        } else {
                                        }
                                        
                                        ?>

                                    </div>


                                    <ul class="nav nav-tabs" role="tablist">
                                        <?php
                                        include '../database/config.php';
                                        $sql = "SELECT * FROM cauhoi WHERE mabkt = '$mabkt'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $qno = 1;
                                            $total_questions = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $total_questions++;
                                                if ($qno == "1") {
                                                    print '<li role="presentation" class="active"><a href="#tab' . $qno . '" role="tab" data-toggle="tab">' . $qno . '</a></li>';
                                                } else {
                                                    print '<li role="presentation"><a href="#tab' . $qno . '" role="tab" data-toggle="tab">' . $qno . '</a></li>';
                                                }

                                                $qno = $qno + 1;
                                            }
                                        } else {
                                        }

                                        ?>
                                        <input type="hidden" name="tq" value="<?php echo "$total_questions"; ?>">
                                        <input type="hidden" name="eid" value="<?php echo "$mabkt"; ?>">
                                        <input type="hidden" name="pm" value="<?php echo "$diemtoithieu"; ?>">
                                        <input type="hidden" name="ri" value="<?php echo "$tgnop"; ?>">

                                    </ul>


                            </div>
                            <br><input onclick="return confirm('Bạn có chắc chắn muốn nộp bài?')" class="btn btn-success" type="submit" value="Nộp bài">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> 
        <div>
        


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
    <script src="../assets/js/modern.min.js"></script>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    
    <script>
        function myFunction() {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>

    <script type="text/javascript">
        var max_time = <?php echo "$thoigian" ?>;
        var c_seconds = 0;
        var total_seconds = 60 * max_time;
        max_time = parseInt(total_seconds / 60);
        c_seconds = parseInt(total_seconds % 60);
        document.getElementById("quiz-time-left").innerHTML = '' + max_time + ':' + c_seconds + 'Min';

        function init() {
            document.getElementById("quiz-time-left").innerHTML = '' + max_time + ':' + c_seconds + ' Min';
            setTimeout("CheckTime()", 999);
        }

        function CheckTime() {
            document.getElementById("quiz-time-left").innerHTML = '' + max_time + ':' + c_seconds + ' Min';
            if (total_seconds <= 0) {
                setTimeout('document.quiz.submit()', 1);

            } else {
                total_seconds = total_seconds - 1;
                max_time = parseInt(total_seconds / 60);
                c_seconds = parseInt(total_seconds % 60);
                setTimeout("CheckTime()", 999);
            }

        }
        init();
    </script>
</body>

</html>