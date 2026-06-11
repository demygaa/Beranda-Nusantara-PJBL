<?php if (isset($_GET['success']) && $_GET['success'] == 1):
    ?>


    <div class="success" id="success">
        Profil berhasil diperbarui,Silahkan login ulang!
    </div>

<?php endif; ?>
<?php

$id = $_SESSION['user']['id'];

$stmt = $conn->prepare("SELECT * FROM tb_akun WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$data = $res->fetch_assoc();

?>

<h1>Edit Profile</h1>

<form method="POST" enctype="multipart/form-data" action="upload.php">

    <input type="file" id="profileUpload" name="profile" accept="image/*" hidden onchange="previewImage(this)">

    <div class="profile-top">
        <div class="profile-user">
            <img class="previewImg" src="../asset/profile/<?php echo $data['profile'] ?>">

            <div>
                <h3><?php echo $data['username'] ?></h3>
                <p><?php echo $data['bio'] ?></p>
            </div>
        </div>

        <label for="profileUpload" class="change-btn">
            Change Photo
        </label>
    </div>


    <div class="profile-top-mobile">
        <div class="profile-user-mobile">
            <img class="previewImg" src="../asset/profile/<?php echo $data['profile'] ?>">
        </div>

        <label for="profileUpload" class="change-btn-mobile">
            Change Photo
        </label>
    </div>

    <div class="profile-form">

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $data['username'] ?>">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" value="<?php echo $data['email'] ?>" readonly>
        </div>

        <div class="input-group">
            <label>Bio</label>
            <textarea name="bio"><?php echo $data['bio'] ?></textarea>
        </div>

        <button class="save-btn" type="submit" name="update">
            Simpan Perubahan
        </button>

    </div>

</form>