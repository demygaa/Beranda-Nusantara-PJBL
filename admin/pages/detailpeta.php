<?php
include "api.php";

$id = $_GET['id'] ?? "";


$stmt = $conn->prepare("SELECT * FROM tb_daerah WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan");
}
if (isset($_GET['success'])): ?>

    <style>
        .notif {
            position: fixed;

            top: 50px;
            left: 50%;

            transform: translate(-50%, -50%);

            width: fit-content;

            display: none;
            justify-content: center;
            align-items: center;

            background: white;
            color: black;
            font-size: 15px;

            padding: 15px 25px;
            border-radius: 12px;

            font-weight: 500;
            z-index: 9999;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="notif" id="notif">
        Data berhasil disimpan daerah = <?php echo $data['daerah'] ?> top = <?php echo $data['y'] ?> left =
        <?php echo $data['x'] ?>
    </div>

    <script>

        const notif = document.getElementById("notif");

        notif.style.display = "flex";

        setTimeout(() => {
            notif.style.display = "none";
        }, 3000);

    </script>

<?php endif;
?>
<h2 class="page-header" id="peta">Kelola Lokasi Peta</h2>

<div class="form-petap">

    <form method="post" action="upload.php">

    <input type="hidden" name="redirect" value="detailpeta">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <h3>Nama Daerah / Provinsi</h3>
    <input type="text" name="daerah" value="<?= $data['daerah']; ?>">

    <div class="map-pickeredit">
        <img src="../asset/icon/petabudaya1.png" class="peta-edit">

        <div class="marker-edit">
            <img src="../asset/icon/lokasi.png" alt="">
        </div>
    </div>

    <input type="hidden" name="x" class="x-edit" value="<?= $data['x']; ?>">
    <input type="hidden" name="y" class="y-edit" value="<?= $data['y']; ?>">

    <div>
        <button type="submit" name="tambahpeta">Simpan</button>
        <button type="submit" name="hapuspeta" class="hapus">Hapus</button>
    </div>

</form>
</div>
<h2 class="page-header">Artikel Yang Bersangkutan Dengan Daerah <?php echo $data['daerah'] ?></h2>
<?php

$search = $_GET['search'] ?? '';
$daerah = $data['daerah'] ?? '';
$kategori = $_GET['kategori'] ?? '';

$query = "SELECT * FROM tb_konten WHERE daerah = ?";

$params = [];
$types = "s";

$params[] = $daerah;

if ($search != '') {

    $query .= " AND judul LIKE ?";

    $cari = "%$search%";

    $params[] = $cari;

    $types .= "s";
}

if ($kategori != '') {

    $query .= " AND kategori = ?";

    $params[] = $kategori;

    $types .= "s";
}

$stmt = $conn->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$result = $stmt->get_result();



?>

<form method="GET" action="admin.php" class="container-search search">
    <div>
        <input type="hidden" name="page" value="detailpeta">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="search" value="<?php echo $search; ?>">
        <button name="cari">search</button>
        <?php if ($search != '') { ?>

            <a href="admin.php?page=detailpeta&id=<?= $id ?>&#peta">
                <img src="../asset/icon/xicon.png">
            </a>

        <?php } ?>
    </div>


    <div>
        <select name="kategori" onchange="this.form.submit()">
            <option value="">Kategori</option>
            <option value="tarian" <?php if ($kategori == 'tarian')
                echo 'selected'; ?>>Tarian</option>
            <option value="pakaian tradisional" <?php if ($kategori == 'pakaian tradisional')
                echo 'selected'; ?>>
                Pakaian Tradisional</option>
            <option value="senjata alat perang" <?php if ($kategori == 'senjata alat perang')
                echo 'selected'; ?>>
                Senjata Alat perang</option>
            <option value="seni pertunjukan drama" <?php if ($kategori == 'seni pertunjukan drama')
                echo 'selected'; ?>>
                Seni
                Pertunjukan Drama</option>
            <option value="lagu daerah" <?php if ($kategori == 'lagu daerah')
                echo 'selected'; ?>>Lagu Daerah</option>
            <option value="alat musik" <?php if ($kategori == 'alat musik')
                echo 'selected'; ?>>Alat Musik</option>
            <option value="batik" <?php if ($kategori == 'batik')
                echo 'selected'; ?>>Batik</option>
        </select>
        <?php if ($kategori != '') { ?>

            <a href="admin.php?page=detailpeta">
                <img src="../asset/icon/xicon.png">
            </a>

        <?php } ?>
    </div>
</form>
<div class="listbudaya">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="listcard">
            <div>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <img src="../asset/konten/<?php echo $row['gambar'] ?>" alt="">
                <span>+ <?php echo $row['kategori'] ?></span>
                <h2><?php echo $row['judul'] ?></h2>
                <p><?php echo $row['daerah'] ?></p>
            </div>
            <div>
                <button onclick="location.href='admin.php?page=detailisi&id=<?= $row['id'] ?>'">
                    Detail
                </button>
            </div>
        </div>

    <?php } ?>
</div>