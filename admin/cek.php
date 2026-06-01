<?php
session_start();

if (
    !isset($_SESSION['admin']) ||
    $_SESSION['admin']['level'] !== 'admin'
) {
    header("Location: ../loginadmin.php");
    exit();
}
?>