
<?php
include "cek.php";
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

$allowed = ['dashboard', 'kelolaartikel', 'laporan', 'edit', 'detail', 'kelolapeta', 'detailpeta', 'detailisi', 'detailpermintaan'];

if (!in_array($page, $allowed)) {
    $page = 'dashboard';
}
?>

<?php include 'templates/header.php' ?>
<?php include 'templates/sidebar.php' ?>

<div>
    <div>
        <?php include "pages/$page.php"; ?>
    </div>

    <?php include "templates/footer.php"; ?>
</div>