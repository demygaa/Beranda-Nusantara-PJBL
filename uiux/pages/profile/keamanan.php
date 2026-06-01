<?php if (isset($_GET['success']) && $_GET['success'] == 1):  
   ?>
   

    <div class="success" id="success">
        Password berhasil diubah!
    </div>

<?php endif; ?>
<h1>Keamanan</h1>

<form class="profile-form" action="upload.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id']?>">

    <div class="input-group">
        <label>Password Lama</label>
        <input type="password" name="old_password">
    </div>

    <div class="input-group">
        <label>Password Baru</label>
        <input type="password" name="new_password">
    </div>

    <div class="input-group">
        <label>Konfirmasi Password</label>
        <input type="password" name="confirm_password">
    </div>
    <a href="index.php?page=profile&tab=lupapassword" class="forgot-link">
    Lupa Password?
</a>

    <button type="submit" class="save-btn" name="change_password">
        Simpan Password
    </button>

</form>

