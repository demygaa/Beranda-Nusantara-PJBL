<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "api.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['kirim_otp'])) {

    $email = $_POST['email'];


    $stmt = $conn->prepare("SELECT * FROM tb_akun WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        die("Email tidak ditemukan!");
    }

    $otp = rand(100000, 999999);


    $update = $conn->prepare("
        UPDATE tb_akun 
        SET otp_code=?, 
            otp_expired=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
        WHERE email=?
    ");

    $update->bind_param("ss", $otp, $email);
    $update->execute();


    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'elah23206@gmail.com';
        $mail->Password = 'cslr bmxt kpgz lcph';

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('elah23206@gmail.com', 'Beranda Nusantara');

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Kode OTP Reset Password';

        $mail->Body = "
            <h2>Reset Password</h2>
            <p>Kode OTP kamu:</p>
            <h1>$otp</h1>
            <p>OTP berlaku 5 menit.</p>
        ";

        $mail->send();

        $_SESSION['reset_email'] = $email;

        header("Location: verifikasiotp.php");
        exit;

    } catch (Exception $e) {

        echo "Gagal kirim email: {$mail->ErrorInfo}";
    }
}

ob_end_flush();
?>