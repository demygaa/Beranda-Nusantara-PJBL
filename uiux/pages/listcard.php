<?php
include "api.php";

$kategori = $_GET['kategori'] ?? '';

$stmt = $conn->prepare("SELECT * FROM tb_konten WHERE kategori = ?");
$stmt->bind_param("s", $kategori);
$stmt->execute();

$result = $stmt->get_result();


?>

<section class="listcard-container">


    <div class="listbudaya">
        <?php while ($data = $result->fetch_assoc()) { ?>
        <div class="listcard">
            <div>
                <img src="../asset/konten/<?php echo $data['gambar']?>" alt="">
                <span>+ <?php echo $data['kategori']?></span>
                <h2><?php echo $data['judul']?></h2>
                <p><?php echo $data['daerah']?></p>
            </div>
            <div>
                <button onclick="location.href='index.php?page=detail&id=<?php echo $data['id']?>'">Detail</button>
            </div>
        </div>
        <?php } ?>
    </div>


</section>