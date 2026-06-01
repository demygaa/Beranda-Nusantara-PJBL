
<?php
session_start();
include "api.php";


$page = isset($_GET['page']) ? $_GET['page'] : 'homepage';

$allowed = ['homepage', 'kontak', 'laporan', 'detail', 'listcard', 'profile','editProfile', 'artikel', 'notifikasi', 'keamanan'];

if (!in_array($page, $allowed)) {
    $page = 'homepage';
}
?>

<?php include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>

<div>
    <div>
        <?php include "pages/$page.php"; ?>
    </div>

    <?php include "templates/footer.php"; ?>
</div>