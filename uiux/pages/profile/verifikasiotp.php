<?php



include "../api.php";

if (isset($_POST['verifikasi'])) {

    $otp = $_POST['otp'];
    $email = $_SESSION['reset_email'];

    $stmt = $conn->prepare("
        SELECT * FROM tb_akun 
        WHERE email=? 
        AND otp_code=? 
        AND otp_expired > NOW()
    ");

    $stmt->bind_param("ss", $email, $otp);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $_SESSION['otp_verified'] = true;

        header("Location: index.php?page=profile&tab=resetpassword");
        exit;

    } else {

        $error = "OTP salah atau sudah expired!";
    }
}
?>

<h1>Verifikasi OTP</h1>

<form method="POST" class="profile-form">

    <div class="input-group">
        <label>Masukkan OTP</label>
        <input type="text" name="otp" required>
    </div>
    <?php if (isset($error)) { ?>
        <p style="color:red;">
            <?php echo $error; ?>
        </p>
    <?php } ?>
    <button type="submit" name="verifikasi" class="save-btn">
        Verifikasi
    </button>

</form>