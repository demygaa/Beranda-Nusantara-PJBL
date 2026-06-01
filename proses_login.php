<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include "api.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM tb_akun WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        echo "Email tidak ditemukan";
        exit;
    }

    if (!password_verify($password, $data['password'])) {
        echo "Password salah";
        exit;
    }

    unset($_SESSION['user']);
    unset($_SESSION['admin']);

   
    if ($data['level'] === 'admin') {

        $_SESSION['admin'] = [
            'id' => $data['id'],
            'email' => $data['email'],
            'username' => $data['username'],
            'level' => $data['level'],
            'profile' => $data['profile']
        ];

        header("Location: admin/admin.php");
        exit;

    } else {

        $_SESSION['user'] = [
            'id' => $data['id'],
            'email' => $data['email'],
            'username' => $data['username'],
            'level' => $data['level'],
            'profile' => $data['profile']
        ];

        header("Location: uiux/index.php");
        exit;
    }
}
?>