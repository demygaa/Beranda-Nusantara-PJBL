<?php if (isset($_GET['tambahpeta']) && $_GET['tambahpeta'] == 1): ?>


    <div class="success" id="terima">
        Lokasi berhasil ditambah!
    </div>

<?php endif; ?>
<?php if (isset($_GET['hapus']) && $_GET['hapus'] == 1): ?>


    <div class="success" id="hapus">
        Lokasi berhasil dihapus!
    </div>

<?php endif; ?>
<div class="page">
    <div class="page-header">
        <h1>Kelola Peta</h1>
        <p>Kelola lokasi pin provinsi pada peta budaya Indonesia</p>
    </div>

    <button id="droplokasi" class="tambah-btn">
        Tambahkan Lokasi Baru
    </button>

    <div class="form-peta">

        <form method="post" action="upload.php">
            <input type="hidden" name="redirect" value="kelolapeta">

            <h3>Nama Daerah / Provinsi</h3>
            <input type="text" name="daerah" placeholder="Masukkan nama daerah" required>

            <div class="map-picker">
                <img src="../asset/icon/petabudaya1.png" id="peta">

                <div id="marker"><img src="../asset/icon/lokasi.png" alt=""></div>

            </div>

            <input type="hidden" name="x" id="x">
            <input type="hidden" name="y" id="y">

            <button type="submit" name="tambahpeta">
                Tambah Lokasi
            </button>

        </form>
    </div>

    <div class="search-peta">

        <div class="page-headerp">
            <h1>Data Lokasi Peta</h1>
        </div>

        <form method="get">

            <input type="hidden" name="page" value="kelolapeta">

            <input type="text" name="search" placeholder="Cari daerah...">

            <button type="submit">
                search
            </button>

        </form>
    </div>

    <div class="table-peta">

        <table>

            <tr>
                <th class="col-no">NO</th>
                <th>Daerah</th>
                <th>Top</th>
                <th>Left</th>
                <th class="col-actionp">Action</th>
            </tr>

            <?php
            include "api.php";

            $search = $_GET['search'] ?? '';

            if ($search != '') {

                $stmt = $conn->prepare(
                    "SELECT * FROM tb_daerah WHERE daerah LIKE ?"
                );

                $like = "%$search%";

                $stmt->bind_param("s", $like);

            } else {

                $stmt = $conn->prepare(
                    "SELECT * FROM tb_daerah"
                );
            }

            $stmt->execute();

            $result = $stmt->get_result();
            $no = 1;

            while ($data = $result->fetch_assoc()):
                ?>

                <tr>

                    <td><?php echo $no++ ?></td>

                    <td><?= $data['daerah']; ?></td>

                    <td><?= $data['y']; ?></td>

                    <td><?= $data['x']; ?></td>

                    <td>
                        <a href="admin.php?page=detailpeta&id=<?= $data['id']; ?>" class="action-btn btn-proses">
                            Detail
                        </a>
                    </td>

                </tr>

            <?php endwhile; ?>

        </table>

    </div>
</div>