<?php
include "api.php";
$id = $_GET['id'] ?? "";


$conn->query("UPDATE tb_konten SET views = views + 1 WHERE id = $id");

// $stmt = $conn->prepare("SELECT * FROM tb_konten WHERE id = ?");
// $stmt->bind_param("i", $id);
// $stmt->execute();
// $result = $stmt->get_result();
// $data = $result->fetch_assoc();
$stmt = $conn->prepare("
    SELECT tb_konten.*, tb_akun.username 
    FROM tb_konten
    JOIN tb_akun 
    ON tb_konten.user_id = tb_akun.id
    WHERE tb_konten.id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();




?>

<section class="detail-container">

    <div class="detail-content">

        <!-- CATEGORY -->
        <span class="detail-category">
            + <?php echo $data['kategori'] ?>
        </span>


        <!-- TITLE -->
        <h1 class="detail-title">
            Kebudayaan <?php echo $data['kategori'] ?> <?php echo $data['judul'] ?>
        </h1>
        <!-- INFO -->
        <div class="detail-info">
            <span><?php echo $data['username']?></span>
            <span>•</span>
            <span><?php echo $data['date'] ?></span>


        </div>


        <!-- BAGIAN PENARIK -->
        <img src="../asset/konten/<?php echo $data['gambar'] ?>" class="thumbnail">


        <?php
        $paragraf = explode("\n", $data['isi']);

        foreach ($paragraf as $p) {
            if (trim($p) != "") {
                echo "<p>$p</p>";
            }
        }
        ?>
        <!-- 
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Similique magnam ducimus dignissimos, illum amet quisquam.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolores rem molestias saepe suscipit adipisci aspernatur
            expedita laboriosam maxime recusandae reiciendis.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolores rem molestias saepe suscipit adipisci aspernatur
            expedita laboriosam maxime recusandae reiciendis.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolores rem molestias saepe suscipit adipisci aspernatur
            expedita laboriosam maxime recusandae reiciendis.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolores rem molestias saepe suscipit adipisci aspernatur
            expedita laboriosam maxime recusandae reiciendis.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolores rem molestias saepe suscipit adipisci aspernatur
            expedita laboriosam maxime recusandae reiciendis.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolores rem molestias saepe suscipit adipisci aspernatur
            expedita laboriosam maxime recusandae reiciendis.
        </p>
        <GAMBAR TENGAH -->
         <!-- <class="middle-image">

                <img src="https://picsum.photos/1200/600">

                <small>
                    Ilustrasi perkembangan teknologi AI modern
                </small>

            </div> -->


        <!-- LANJUT ARTIKEL -->
        <!-- <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Laboriosam debitis quas harum impedit facere cumque,
            molestiae eligendi autem dolorum maiores.
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Quae accusamus voluptate molestias asperiores amet.
        </p> -->

    </div>

</section>


<!-- REKOMENDASI -->
<section class="recommend-container">

    <?php

    $stmt = $conn->prepare("SELECT * FROM tb_konten WHERE id != ? ORDER BY views DESC LIMIT 4");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    ?>

    <h2>Rekomendasi Artikel</h2>

    <div class="recommend-wrapper">
        <?php while ($data = $result->fetch_assoc()) { ?>
            <div class="recommend-card">
                
                    <img src="../asset/konten/<?php echo $data['gambar'] ?>">
                    <div class="recommend-body">
                        <div>
                            <span>
                                + <?php echo $data['kategori'] ?>
                            </span>

                            <h3>
                                <?php echo $data['judul'] ?>
                            </h3>
                            <p>
                                <?= substr($data['isi'], 0, 30) . "..." ?>
                            </p>
                        </div>
                        <div>
                            <a href="index.php?page=detail&id=<?php echo $data['id'] ?>" class="detail-link">
                                <button class="detail">Detail</button>
                            </a>
                            
                        </div>



                    </div>
                

            </div>
        <?php } ?>
    </div>
</section>