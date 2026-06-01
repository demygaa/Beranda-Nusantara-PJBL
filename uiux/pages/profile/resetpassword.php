<?php



include "../api.php";


if (!isset($_SESSION['otp_verified'])) {

    header("Location: lupapassword.php");
    exit;
}


if (isset($_POST['reset'])) {

    $password_baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password_baru != $konfirmasi) {

        $error = "Konfirmasi password tidak sama!";

    } else {

        $hash = password_hash($password_baru, PASSWORD_DEFAULT);

        $email = $_SESSION['reset_email'];

        $stmt = $conn->prepare("
            UPDATE tb_akun 
            SET 
                password=?,
                otp_code=NULL,
                otp_expired=NULL
            WHERE email=?
        ");

        $stmt->bind_param("ss", $hash, $email);

        if ($stmt->execute()) {

            unset($_SESSION['otp_verified']);
            unset($_SESSION['reset_email']);

            header("Location: index.php?page=profile&tab=keamanan&success=1");
            exit;

        } else {

            $error = "Gagal reset password!";
        }
    }
}
?>

<h1>Reset Password</h1>

<form method="POST" class="profile-form">

    <div class="input-group">
        <label>Password Baru</label>
        <input type="password" name="password_baru" required>
    </div>

    <div class="input-group">
        <label>Konfirmasi Password</label>
        <input type="password" name="konfirmasi" required>
    </div>

    <button type="submit" name="reset" class="save-btn">
        Reset Password
    </button>

</form>

<?php if (isset($error)) { ?>
    <p style="color:red;">
        <?php echo $error; ?>
    </p>
<?php } ?>