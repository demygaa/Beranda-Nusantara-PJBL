<?php

include "../api.php";

$daerah = $_GET['daerah'];

$query = mysqli_query($conn, "SELECT * FROM tb_konten WHERE daerah LIKE '%$daerah%'");

while($data = mysqli_fetch_assoc($query)) {
?>

<div class="card-popup">

    <img src="../asset/konten/<?php echo $data['gambar']; ?>">

    <div>
        <h3>
            <?php echo $data['judul']; ?>
        </h3>

        <p>
            <?php echo $data['kategori']; ?>
        </p>

    </div>

    <div class="button">
        <a href="index.php?page=detail&id=<?php echo $data['id']; ?>" class="button">
            Detail
        </a>
    </div>

</div>

<?php } ?>