<?php
include "api.php";
?>

<div class="page active">
    <div class="page-header">
        <h1>Dashboard</h1>
        <p>Ringkasan Performa Terbaru</p>
    </div>

    <div class="stats-container">

        <div class="stat-card">
            <?php

            $query = "SELECT * from tb_konten;";
            $hasil = mysqli_query($conn, $query);
            $no = 1;
            $jum = mysqli_num_rows($hasil);

            ?>
            <p>Total Artikel</p>
            <h2><?php echo "$jum"; ?></h2>
        </div>

        <div class="stat-card">
            <?php 
            
            $query = "SELECT * from tb_laporan;";
            $hasil = mysqli_query($conn, $query);
            $no = 1;
            $jum = mysqli_num_rows($hasil);


            
            ?>
            <p>Total Laporan</p>
            <h2><?php echo "$jum"; ?></h2>
        </div>
        <div class="stat-card">
            <p>Total Pengguna Aktif</p>
            <h2 id="aktif">0</h2>
        </div>
    </div>

    <div class="chart-container">
        <div class="card">
            <canvas id="simpleChart" height="140"></canvas>
        </div>
        <div class="catatan">

            <?php

            $stmt = $conn->prepare("SELECT * FROM tb_catatan");
            $stmt->execute();
            $result = $stmt->get_result();


            ?>

            <table>
                <tr>
                    <th>DATE</th>
                    <th>CAPTION</th>

                </tr>
                <?php while ($data = $result->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <a href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Hapus catatan <?=$data['tanggal']?>')">

                            <?php echo $data['tanggal'] ?>

                        </a>
                    </td>
                    <td>
                        <a href="deletecatatan.php?id=<?= $data['id'] ?>" onclick="return confirm('Hapus catatan <?=$data['catatan']?>')">

                            <?php echo $data['catatan'] ?>

                        </a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <form action="upload.php" method="post">
                            <input type="text" name="catatan">
                            <input type="submit" name="simpan" value="simpan">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="populer2">

        <?php

        $stmt = $conn->prepare("SELECT * FROM tb_konten ORDER BY views DESC LIMIT 4");
        $stmt->execute();
        $result = $stmt->get_result();
        $no = 1;
        
        ?>
        <p>Artikel Populer</p>
        <table>
            <tr>
                <th  class="col-no">RANK</th>
                <th  class="col-judul">TITLE</th>
                <th  class="col-content">CONTENT</th>
                <th  class="col-gambarp">IMAGE</th>
                <th  class="col-tanggal">DATE</th>
                <th  class="col-viewp">VIEW</th>
                <th  class="col-actionp">Detail</th>

            </tr>
            <?php while ($data = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['judul']?></td>
                <td><?= substr($data['isi'], 0, 50) . "..." ?></td>
                <td><img src="../asset/konten/<?php echo $data['gambar']?>"></td>
                <td><?php echo $data['date']?></td>
                <td><?php echo $data['views']?></td>
                <td>

                    <a href="admin.php?page=detail&id=<?php echo $data['id']; ?>" class="action-btn btn-proses">

                        Detail

                    </a>

                </td>
            </tr>
            <?php } ?>
            
        </table>
    </div>