<!-- HERO -->
<section class="hero" id="homepage">
    <div class="hero-content">
        <h1 class="h1">MARI JELAJAHI<br>NUSANTARA KITA</h1>
        <p>KERAGAMAN BUDAYA INDONESIA KU</p>
        <a href="#peta"><button id="jelajahweb">Jelajahi Sekarang</button></a>
        <a href="#sectionmobile"><button id="jelajahmobile">Jelajahi Sekarang</button></a>
    </div>
</section>


<!-- <section class="video">
    <div class="playvid">
        <video autoplay muted loop playsinline class="bg-video">
        <source src="../asset/video/petapokonya.mp4" type="video/mp4">
    </video>
    </div>
    

    <div class="contentp">
        <h1>Pelajari Budaya Kita dengan lebih menyenangkan</h1>
        <div class="infoaja">
            <div class="line"></div>
             <p>Indonesia merupakan negara kepulauan yang memiliki keberagaman budaya yang sangat kaya. Setiap daerah memiliki ciri khas tersendiri, mulai dari bahasa, adat istiadat, rumah adat, pakaian tradisional, tarian, musik, hingga kuliner daerah. Keanekaragaman budaya tersebut menjadi identitas bangsa sekaligus warisan yang harus dijaga dan dilestarikan. Melalui keberagaman budaya yang dimiliki, Indonesia dikenal sebagai salah satu negara dengan kekayaan budaya terbesar di dunia.</p> 
        </div>
        
    </div> 
</section>  -->



<!-- section kotak -->
<section class="section-peta" id="sectionkotak">
    <h2>Budaya Beranda Nusantara</h2>


    <div class="content" id="sectioncontent">
        <img src="../asset/icon/sectionkotak.png" alt="Budaya Nusantara" class="sectionkotak" id="imageinfo">

        <div class="list">
            <h3 id="infografisweb"><span>Budaya</span> yang dicakup pada Peta Budaya Nusantara</h3>
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

<section id="sectionmobile" class="mobile">

    <?php

    $queryKonten = null;

    if (isset($_GET['search'])) {

        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $kategori = mysqli_real_escape_string($conn, $_GET['kategori'] ?? '');

        $sql = "SELECT * FROM tb_konten WHERE judul LIKE '%$search%'";

        if ($kategori != '') {
            $sql .= " AND kategori = '$kategori'";
        }

        $queryKonten = mysqli_query($conn, $sql);
    }

    ?>





    <h2>Cari Budaya Nusantara Disini</h2>

    <form action="index.php" method="GET">

        <input type="hidden" name="page" value="index">

        <input type="text" name="search" placeholder="Cari nama budaya">

        <select name="kategori">

            <option value="">Semua Kategori</option>
            <option value="tarian">Tarian</option>
            <option value="pakaian tradisional">Pakaian Tradisional</option>
            <option value="senjata alat perang">Senjata Alat Perang</option>
            <option value="seni pertunjukan drama">Seni Pertunjukan Drama</option>
            <option value="lagu">Lagu Daerah</option>
            <option value="alat musik">Alat Musik</option>
            <option value="batik">Batik</option>

        </select>

        <button type="submit" id="searchMobile">
            Cari
        </button>

    </form>

</section>
<section class="entry-search">

    <div>
        <h2>Data yang ditemukan</h2>
    </div>

    <?php if ($queryKonten && mysqli_num_rows($queryKonten) > 0) { ?>

        <?php while ($dataKonten = mysqli_fetch_assoc($queryKonten)) { ?>
            <a href="index.php?page=detail&id=<?php echo $dataKonten['id']; ?>">
                <div class="entry-card">

                    <img src="../asset/konten/<?php echo $dataKonten['gambar'] ?>" alt="">

                    <div class="info">
                        <h3><?= htmlspecialchars($dataKonten['judul']) ?></h3>
                        <p>
                            <?= substr(strip_tags($dataKonten['isi']), 0, 40) ?>...
                        </p>
                    </div>

                </div>
            </a>
        <?php } ?>

    <?php } elseif (isset($_GET['search'])) { ?>

        <p>Tidak ada data yang ditemukan.</p>

    <?php } ?>

</section>



<section class="kunjunganmobile">
    <h2>Artikel Populer</h2>
    <?php

    $stmt = $conn->prepare("SELECT * FROM tb_konten ORDER BY views DESC LIMIT 4");
    $stmt->execute();
    $result = $stmt->get_result();


    ?>
    <?php while ($data = $result->fetch_assoc()) { ?>
        <a href="index.php?page=detail&id=<?php echo $data['id']; ?>" class="detail-link">
            <div class="card-mobile">
                <div class="icon">
                    <img src="../asset/konten/<?php echo $data['gambar'] ?>">
                </div>
                <div class="isi">
                    <h2><?php echo $data['judul'] ?></h2>
                    <h5><?= substr($data['isi'], 0, 50) . "..." ?></h5>
                </div>
            </div>
        </a>
    <?php } ?>
</section>
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