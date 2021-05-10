<?php

// ----------------------------------------------------------------------------------------------------
// - Display Errors
// ----------------------------------------------------------------------------------------------------
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

// ----------------------------------------------------------------------------------------------------
// - Error Reporting
// ----------------------------------------------------------------------------------------------------
error_reporting(-1);

// ----------------------------------------------------------------------------------------------------
// - Shutdown Handler
// ----------------------------------------------------------------------------------------------------
function ShutdownHandler()
{
    if (@is_array($error = @error_get_last())) {
        return(@call_user_func_array('ErrorHandler', $error));
    };

    return(true);
};

register_shutdown_function('ShutdownHandler');

// ----------------------------------------------------------------------------------------------------
// - Error Handler
// ----------------------------------------------------------------------------------------------------
function ErrorHandler($type, $message, $file, $line)
{
    $_ERRORS = array(
        0x0001 => 'E_ERROR',
        0x0002 => 'E_WARNING',
        0x0004 => 'E_PARSE',
        0x0008 => 'E_NOTICE',
        0x0010 => 'E_CORE_ERROR',
        0x0020 => 'E_CORE_WARNING',
        0x0040 => 'E_COMPILE_ERROR',
        0x0080 => 'E_COMPILE_WARNING',
        0x0100 => 'E_USER_ERROR',
        0x0200 => 'E_USER_WARNING',
        0x0400 => 'E_USER_NOTICE',
        0x0800 => 'E_STRICT',
        0x1000 => 'E_RECOVERABLE_ERROR',
        0x2000 => 'E_DEPRECATED',
        0x4000 => 'E_USER_DEPRECATED'
    );

    if (!@is_string($name = @array_search($type, @array_flip($_ERRORS)))) {
        $name = 'E_UNKNOWN';
    };

    return(print(@sprintf("%s Error in file \xBB%s\xAB at line %d: %s\n", $name, @basename($file), $line, $message)));
};

$old_error_handler = set_error_handler("ErrorHandler");
include '../database/config.php';
$username = mysqli_real_escape_string($conn, $_POST['user']);
$password = md5($_POST['password']);
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/log.log", "a");
$time_start = microtime(true);
$sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
$time_end = microtime(true);
$time = $time_end-$time_start;
$time_start = microtime(true);
$sql1 = "SELECT * FROM sinhvien WHERE masv = '$username' ";
$result1 = $conn->query($sql1);
$time_end = microtime(true);
$time1 = $time_end-$time_start;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['vaitro']=$row['vaitro'];
        $trangthai = $row['trangthai'];
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $_SESSION['hotendem']=$row['hotendem'];
                $_SESSION['ten']=$row['ten'];
                $_SESSION['gioitinh']=$row['gioitinh'];
                $_SESSION['ngaysinh']=$row['ngaysinh'];
                $_SESSION['diachi']=$row['diachi'];
                $_SESSION['email']=$row['email'];
                $_SESSION['sdt']=$row['sdt'];
                $_SESSION['makhoa']=$row['makhoa'];
                $_SESSION['avatar']=$row['avatar'];
                $_SESSION['masv']=$row['masv'];
                $_SESSION['malop']= $row['malop'];
            }
        }

        fwrite($open, "[$now]: $username đăng nhập thành công \n");
        fclose($open);
        $sql = addslashes($sql);
        $sql1 = addslashes($sql1);
        $sql2 = "INSERT INTO sql_log(thoigian,user,query,time) VALUES ('$now','$username','$sql','$time'),('$now','$username','$sql1','$time1');";
        if (mysqli_query($conn, $sql2)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
        if ($trangthai == "0") {
            header("location:../?rp=0002");
        }
        $location = $_SESSION['vaitro'];
        header("location:../$location/");
    }
} else {
    $sql = addslashes($sql);
    $sql2 = "INSERT INTO sql_log(thoigian,user,query,time) VALUES ('$now','$username','$sql','$time');";
    if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    header("location:../?rp=0001");
}

$conn->close();
