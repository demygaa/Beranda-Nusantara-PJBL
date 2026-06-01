<?php
include "api.php";

if (isset($_POST['daftar'])) {
    $username = $_POST['username'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tb_akun (username,email,`password`) VALUES (?,?,?);");
    $stmt->bind_param(
        "sss",

        $username,
        $email,
        $hashedPassword
    );

    if ($stmt->execute()) {
        header("Location: registeruser.php?success=1");
        exit;
    }

}



?>