<!-- HERO -->
<section class="hero" id="homepage">
    <div class="hero-content">
        <h1 class="h1">MARI JELAJAHI<br>NUSANTARA KITA</h1>
        <p>KERAGAMAN BUDAYA INDONESIA KU</p>
        <a href="#peta"><button>Jelajahi Sekarang</button></a>
    </div>
</section>

<!-- section kotak -->
<section class="section-peta" id="sectionkotak">
    <h2>Budaya Beranda Nusantara</h2>

    <div class="content" id="sectioncontent">
        <img src="../asset/icon/sectionkotak.png" alt="Budaya Nusantara" class="sectionkotak">

        <div class="list">
            <h3><span>Budaya</span> yang dicakup pada Peta Budaya Nusantara</h3>
            <ul>
                <li>
                    <div class="iconblue">
                        <img src="../asset/icon/tarian.png" width="40" height="55">
                    </div>
                    <p class="bold">Tarian</p>
                </li>
                <li>
                    <div class="icon">
                        <img src="../asset/icon/pakaiantradisional.png" width="40" height="55">
                    </div>
                    <p class="bold">Pakaian Tradisional</p>
                </li>
                <li>
                    <div class="iconblue">
                        <img src="../asset/icon/senjatalatperang.png" width="40" height="55">
                    </div>
                    <p class="bold">Senjata Alat Perang</p>
                </li>
                <li>
                    <div class="icon">
                        <img src="../asset/icon/senipertunjukandrama.png" width="40" height="55">
                    </div>
                    <p class="bold">Seni Pertunjukan Drama</p>
                </li>
                <li>
                    <div class="iconblue">
                        <img src="../asset/icon/senimusik.png" width="40" height="55">
                    </div>
                    <p class="bold">Lagu Daerah</p>
                </li>
                <li>
                    <div class="icon">
                        <img src="../asset/icon/alatmusik.png" width="40" height="55">
                    </div>
                    <p class="bold">Alat Musik</p>
                </li>
                <li>
                    <div class="iconblue">
                        <img src="../asset/icon/batik.png" width="30" height="45">
                    </div>
                    <p class="bold">Batik</p>
                </li>
            </ul>
        </div>
    </div>
</section>

<!--sectionpeta-->
<section class="petabudaya" id="peta">
    <h2>Peta Budaya Interaktif</h2>

    <div class="map-container">

        <img src="../asset/icon/petabudaya1.png" class="peta">

        <?php
        $cariDaerah = $_GET['daerah'] ?? '';
        $query = mysqli_query($conn, "SELECT * FROM tb_daerah");

        while ($data = mysqli_fetch_assoc($query)) {

            $active = '';

            if (strtolower($cariDaerah) == strtolower($data['daerah'])) {
                $active = 'active-pin';
            }

            if ($cariDaerah != '') {

                if (strtolower($cariDaerah) != strtolower($data['daerah'])) {
                    continue;
                }

            }

            ?>

            <div class="pin-wrapper <?php echo $active; ?>" data-daerah="<?php echo $data['daerah']; ?>"
                onclick="showPopup('<?php echo $data['daerah']; ?>')" style="
                top: <?php echo $data['y']; ?>%;
                left: <?php echo $data['x']; ?>%;
                
            ">

                <img src="../asset/icon/lokasi.png" class="pin">

                <span class="tooltip">
                    <?php echo $data['daerah']; ?>
                </span>

            </div>

        <?php } ?>

        <div class="popup" id="popup">

            <div class="popup-content">

                <div class="popup-header">

                    <h2 id="popup-title"></h2>

                    <button class="close-btn" onclick="closePopup()">
                        X
                    </button>

                </div>

                <div class="popup-scroll">
                    <div id="popup-body">

                    </div>
                </div>



            </div>

        </div>

    </div>
</section>
<!--section pengunjungan-->
<section class="kunjungan">
    <h2>Pengunjungan Terbanyak</h2>

    <?php

    $stmt = $conn->prepare("SELECT * FROM tb_konten ORDER BY views DESC LIMIT 4");
    $stmt->execute();
    $result = $stmt->get_result();


    ?>
    <div class="card-container">
        <?php while ($data = $result->fetch_assoc()) { ?>
            <a href="index.php?page=detail&id=<?php echo $data['id']; ?>" class="detail-link">
                <div class="card" id="detail">
                    <div>
                        <img src="../asset/konten/<?php echo $data['gambar']; ?>"></td>
                    </div>

                    <span class="category">+ <?php echo $data['kategori']; ?></span>
                    <h3><?php echo $data['judul'] ?></h3>
                    <h5><?= substr($data['isi'], 0, 300) . "..." ?></h5>
                </div>
            </a>

        <?php } ?>

    </div>
</section>