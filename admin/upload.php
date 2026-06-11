<?php
session_start();

include "api.php";
if (isset($_POST['simpan'])) {
    $isi = $_POST['catatan'] ?? "";
    $stmt = $conn->prepare("INSERT INTO tb_catatan (catatan) VALUES (?)");
    $stmt->bind_param("s", $isi);

    if ($stmt->execute()) { ?>
        <script language="javascript">document.location.href = "admin.php?page=dashboard";</script>
    <?php }
}


if (isset($_POST['upload'])) {

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $kategori = trim($_POST['kategori']);
    $daerah = trim($_POST['daerah']);
    $content = trim($_POST['content']);

    if ($daerah == "") {
        die("Pilih provinsi terlebih dahulu");
    }

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
        die("Upload gambar gagal");
    }

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    $allowed = ['jpg','jpeg','png','gif','webp'];

    if (!in_array($ext, $allowed)) {
        die("Format gambar tidak valid");
    }

    $image_baru =
        uniqid() . "." . $ext;

    $target =
        "../asset/konten/" . $image_baru;

    if (move_uploaded_file($tmp, $target)) {

        $stmt = $conn->prepare("INSERT INTO tb_konten (user_id, judul, kategori, daerah, isi, gambar) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "isssss",
            $id,
            $title,
            $kategori,
            $daerah,
            $content,
            $image_baru
        );

        if ($stmt->execute()) {

            header(
                "Location: admin.php?page=kelolaartikel&success=1"
            );

            exit();

        } else {

            echo $stmt->error;

        }

    } else {

        echo "Gagal upload gambar";

    }
}


if (isset($_POST['status'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];
    $isi = $_POST['isi'];


    $q = $conn->prepare("SELECT user_id FROM tb_laporan WHERE id=?");
    $q->bind_param("i", $id);
    $q->execute();
    $res = $q->get_result()->fetch_assoc();

    $user_id = $res['user_id'];


    if ($status == "proses") {


        $stmt = $conn->prepare("UPDATE tb_laporan SET status=? WHERE id=?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();


        $pesan = "Laporan kamu " . $isi . " sedang diproses oleh admin";

        $notif = $conn->prepare("INSERT INTO tb_notifikasi (user_id, pesan) VALUES (?, ?)");
        $notif->bind_param("is", $user_id, $pesan);
        $notif->execute();
    } elseif ($status == "selesai") {


        $pesan = "Laporan kamu " . $isi . " sudah selesai diproses";

        $notif = $conn->prepare("INSERT INTO tb_notifikasi (user_id, pesan) VALUES (?, ?)");
        $notif->bind_param("is", $user_id, $pesan);
        $notif->execute();

        $del = $conn->prepare("DELETE FROM tb_laporan WHERE id=?");
        $del->bind_param("i", $id);
        $del->execute();
    }


    header("Location: admin.php?page=laporan");
    exit;
}

if (isset($_POST['terima'])) {

    $id = $_POST['id'];

    $ambil = $conn->prepare("SELECT * FROM tb_sementara WHERE id=?");
    $ambil->bind_param("i", $id);
    $ambil->execute();

    $result = $ambil->get_result();
    $data = $result->fetch_assoc();

    $insert = $conn->prepare("INSERT INTO tb_konten (user_id,judul,kategori,isi,gambar,date) VALUES (?,?,?,?,?,?)");
    $insert->bind_param(
        "isssss",
        $data['user_id'],
        $data['judul'],
        $data['kategori'],
        $data['isi'],
        $data['gambar'],
        $data['date']
    );



    if ($insert->execute()) {

        $hapus = $conn->prepare("DELETE FROM tb_sementara WHERE id=?");
        $hapus->bind_param("i", $id);
        $hapus->execute();

        ?>
        <script>
            document.location.href = "admin.php?page=kelolaartikel&terima=1";
        </script>
        <?php

    } else {
        echo $insert->error;
    }


}
if (isset($_POST['tolak'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM tb_sementara WHERE id = ?");
    $stmt->bind_param("i",$id);
    
    if ($stmt->execute()) { ?>
        <script>
            document.location.href = "admin.php?page=kelolaartikel&hapus=1";
        </script>
    <?php }
    

}
if (isset($_POST['kirimpesan'])) {
    $isi = $_POST['pesan'];
    $user_id = $_SESSION['user']['id'];

    $stmt = $conn->prepare("INSERT INTO tb_laporan (user_id, isi) VALUES (?, ?)");

    $stmt->bind_param("is", $user_id, $isi);

    if ($stmt->execute()) {

        header("Location: ../uiux/index.php?page=kontak");
        exit;

    } else {
        echo "Gagal mengirim";
    }


}

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'] ?? "";
    $kategori = $_POST['kategori'];
    $daerah = $_POST['daerah'];

    $image = $_FILES['image']['name'] ?? "";
    $image_baru = time() . '_' . basename($image);

    $tmp = $_FILES['image']['tmp_name'];
    $target = "../asset/konten/" . $image_baru;

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];


    if ($image != "") {

        if (!in_array($ext, $allowed)) {
            die("Format gambar tidak valid");
        }

        if (move_uploaded_file($tmp, $target)) {

            $sql = "UPDATE tb_konten SET
                judul='$title',
                kategori='$kategori',
                daerah='$daerah',
                isi='$content',
                gambar='$image_baru'
                WHERE id='$id'";

        }

    } else {


        $sql = "UPDATE tb_konten SET
            judul='$title',
            kategori='$kategori',
            daerah='$daerah',
            isi='$content'
            WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {

        header("Location: ../admin/admin.php?page=kelolaartikel&edit=1");

    } else {

        echo "Error: " . $conn->error;

    }

}

if (isset($_POST['tambahpeta'])) {

    $id = $_POST['id'] ?? '';
    $daerah = trim($_POST['daerah']);

    $x = (float) $_POST['x'];
    $y = (float) $_POST['y'];

    $redirect = $_POST['redirect'] ?? '';

    
    if ($id != '') {
        $stmt = $conn->prepare("UPDATE tb_daerah SET daerah = ?, `y` = ?, `x` = ? WHERE id = ?");
        $stmt->bind_param(
            "sddi",
            $daerah,
            $y,
            $x,
            $id

        );
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_daerah (daerah,`y`,`x`) VALUES (?,?,?)");
        $stmt->bind_param(
            "sdd",
            $daerah,
            $y,
            $x
        );

    }

    if ($stmt->execute()) {
        if ($id == '') {
            $id = $conn->insert_id;
        }
        if ($redirect == 'kelolapeta') {
            header("Location: admin.php?page=kelolapeta&id=$id&tambahpeta=1");
            exit;
        } else if ($redirect == 'detailpeta') {
            header("Location: admin.php?page=detailpeta&id=$id&success=1");
            exit;
        }
        exit;

    } else { ?>
        <p>Gagal Tambah Peta</p>
    <?php }
}

if (isset($_POST['hapuspeta'])) {
    $id = $_POST['id'] ?? "";

    $stmt = $conn->prepare("DELETE FROM tb_daerah WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) { ?>


        <script>
            document.location.href = "admin.php?page=kelolapeta&hapus=1";
        </script>
    <?php }

}

?>