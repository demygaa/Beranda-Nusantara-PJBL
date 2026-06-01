<h1>Lupa Password</h1>

<form action="index.php?page=profile&tab=kirimotp" method="POST" class="profile-form">

    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $_SESSION['user']['email']?>" required>
    </div>

    <button type="submit" name="kirim_otp" class="save-btn">
        Kirim OTP
    </button>

</form>