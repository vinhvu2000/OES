<?php
include '../database/config.php';
include '../includes/uniques.php';

use  PHPMailer\PHPMailer\PHPMailer;
session_start();
$myemail = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "SELECT * FROM sinhvien WHERE email = '$myemail'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $myemail = $row['email'];
        $myfname = $row['hotendem'];
        $mylname = $row['ten'];
        $myfullname = "$hotendem $ten";
        $code = get_rand_alphanumeric(10);
        $_SESSION['code'] = $code;
        $_SESSION['mail'] = $myemail;
        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";
        require_once "../PHPMailer/Exception.php";
        $mail = new PHPMailer();

        //smtp settings:
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vinhvu5112000@gmail.com';
        $mail->Password = 'dragondomain';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->CharSet = 'UTF-8';
        //email settings:
        $message = "Xin chào $myfullname, Chúng tôi nhận được yêu cầu đặt lại mật khẩu tài khoản của bạn trên hệ thống <b>Online Examination System</b>.<br>Đây là mã đặt lại mật khẩu của bạn <b style='font-size:20px;color:red;background-color:lightgrey;'>$code</b>.<br> Nếu bạn không yêu cầu nó hãy bỏ qua và tăng cường bảo mật tài khoản.<br>Trân trọng! ";
        $mail->isHTML(true);
        $mail->setFrom("vinhvu5112000@gmail.com", "Admin");
        $mail->addAddress($myemail, $myfullname);
        $mail->Subject = 'OES Password Reset';
        $mail->Body    = $message;

        if (!$mail->send()) {
        } else {
            header("location:../change_password.php?rp=0065");
        }
    }
} else {
    header("location:../forgot_pw.php?rp=0066");
}
$conn->close();
