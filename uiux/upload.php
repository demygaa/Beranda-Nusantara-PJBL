<?php
session_start();
include "api.php";
if (isset($_GET['search'])) {
    $search = $_GET['search'] ?? '';

    if ($search == '') {
        header("Location:index.php");
        exit;
    }

    $search = mysqli_real_escape_string($conn, $search);


    $queryDaerah = mysqli_query($conn, "SELECT * FROM tb_daerah WHERE daerah LIKE '%$search%'");

    if (mysqli_num_rows($queryDaerah) > 0) {

        $dataDaerah = mysqli_fetch_assoc($queryDaerah);

        header("Location:index.php?page=homepage&daerah=" . $dataDaerah['daerah'] . "#peta");
        exit;
    }



    $queryKonten = mysqli_query($conn, "SELECT * FROM tb_konten WHERE judul LIKE '%$search%'");

    if (mysqli_num_rows($queryKonten) > 0) {

        $dataKonten = mysqli_fetch_assoc($queryKonten);

        header("Location:index.php?page=detail&id=" . $dataKonten['id']);
        exit;
    }

    $queryKategori = mysqli_query($conn, "SELECT * FROM tb_konten WHERE kategori LIKE '%$search%'");

    if (mysqli_num_rows($queryKategori) > 0) {
        $dataKategori = mysqli_fetch_assoc($queryKategori);
        header("Location:index.php?page=listcard&kategori=" . $dataKategori['kategori']);
        exit;
    }


    header("Location:index.php?page=homepage&notfound=1");
}

if (isset($_POST['update'])) {

    $id = $_SESSION['user']['id'];

    $username = $_POST['username'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("SELECT profile FROM tb_akun WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = $res->fetch_assoc();

    $profile = $data['profile'];

    if (!empty($_FILES['profile']['name'])) {

        $fileName = time() . "_" . $_FILES['profile']['name'];
        $tmp = $_FILES['profile']['tmp_name'];

        move_uploaded_file($tmp, "../asset/profile/" . $fileName);

        $profile = $fileName;
    }

    $stmt = $conn->prepare("UPDATE tb_akun SET username=?, bio=?, profile=? WHERE id=?");

    $stmt->bind_param("sssi", $username, $bio, $profile, $id);

    if (!$stmt->execute()) {
        die("Error SQL: " . $stmt->error);
    }

    header("Location: index.php?page=profile&tab=editProfile&success=1");
    exit;
}


if (isset($_POST['minta'])) {


    $user_id = $_SESSION['user']['id'];
    $title = $_POST['judul'];
    $kategori = $_POST['kategori'];

    

    $daerah = $_POST['daerah'] ?? "";
    $content = $_POST['content'] ?? "";


    if (empty($_FILES['image']['name'])) {
        die("Gambar wajib diupload!");
    }

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($ext, $allowed)) {
        die("format gambar tidak valid");
    }

    $image_baru = time() . '_' . basename($image);
    $target = "../asset/konten/" . $image_baru;

    if (!move_uploaded_file($tmp, $target)) {
        die("Gagal upload gambar!");
    }

    $stmt = $conn->prepare("
        INSERT INTO tb_sementara 
        (user_id, judul, kategori, daerah, isi, gambar)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "isssss",
        $user_id,
        $title,
        $kategori,
        $daerah,
        $content,
        $image_baru
    );

    if (!$stmt->execute()) {
        die("SQL ERROR: " . $stmt->error);
    }

    header("Location: index.php?page=profile&tab=artikel&success=1");
    exit;
}

if (isset($_POST['change_password'])) {

    $id = $_POST['id'];

    $oldpas = $_POST['old_password'];
    $newpas = $_POST['new_password'];
    $conpas = $_POST['confirm_password'];

    $stmt = $conn->prepare("SELECT * FROM tb_akun WHERE id = ?");

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $res = $stmt->get_result();
    $data = $res->fetch_assoc();

    if (!password_verify($oldpas, $data['password'])) {

        header("Location:index.php?page=profile&tab=keamanan&old=wrong");
        exit;
    }

    if ($newpas !== $conpas) {

        header("Location:index.php?page=profile&tab=keamanan&match=0");
        exit;
    }

    $hash = password_hash($newpas, PASSWORD_DEFAULT);

    $update = $conn->prepare("UPDATE tb_akun SET password=? WHERE id=?");

    $update->bind_param("si", $hash, $id);

    if ($update->execute()) {

        header("Location:index.php?page=profile&tab=keamanan&success=1");
        exit;

    } else {

        header("Location:index.php?page=profile&tab=keamanan&db=error");
        exit;
    }
}



?>