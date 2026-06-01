<?php
$tab = $_GET['tab'] ?? 'editProfile';

$allowed = ['editProfile', 'artikel', 'notifikasi', 'keamanan', 'lupapassword', 'kirimotp', 'verifikasiotp', 'resetpassword', 'detail'];


if (!in_array($tab, $allowed)) {
    $tab = 'editProfile';
}

$file = "pages/profile/$tab.php";


?>

<div class="profile-layout">

    <?php include "templates/sidebar_profile.php"; ?>

    <div class="profile-content">

        <?php
        if (file_exists($file)) {
            include $file;
        } else {
            include "pages/profile/editProfile.php";
        }
        ?>

    </div>

</div>