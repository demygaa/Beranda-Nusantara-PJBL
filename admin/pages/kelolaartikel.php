<?php include "api.php"; ?>
<?php if (isset($_GET['tambahartikel']) && $_GET['tambahartikel'] == 1):  ?>
   

    <div class="success" id="success">
        Artikel berhasil ditambah!
    </div>

<?php endif; ?>
<?php if (isset($_GET['terima']) && $_GET['terima'] == 1):  ?>
   

    <div class="success" id="terima">
        Artikel berhasil diterima!
    </div>

<?php endif; ?>
<?php if (isset($_GET['edit']) && $_GET['edit'] == 1):  ?>
   

    <div class="success" id="edit">
        Artikel berhasil diedit!
    </div>

<?php endif; ?>
<?php if (isset($_GET['hapus']) && $_GET['hapus'] == 1):  ?>
   

    <div class="success" id="hapus">
        Artikel berhasil dihapus!
    </div>

<?php endif; ?>

<div class="page">
    <div class="page-header">
        <h1>Kelola Artikel</h1>
    </div>
    <button id="drop" class="tambah-btn">Tambahkan Artikel Baru</button>

    <!-- <div class="form-kelola">
        <h3>Judul Artikel</h3>
        <input type="text" placeholder="Masukkan judul artikel...">

        <h3>Kategori</h3>
        <input type="text" placeholder="Contoh: Tarian, Batik, Alat Musik">

        <h3>Isi Informasi</h3>
        <textarea rows="8" placeholder="Tulis isi artikel lengkap di sini..."></textarea>

        <h3>Tambahkan Foto</h3>
        <label
            style="background:var(--primary); color:white; padding:14px 24px; border-radius:12px; cursor:pointer; display:inline-block;">
            Pilih Foto
            <input type="file" id="fotoArtikel" hidden>
        </label>

        <br><br>
        <button>Simpan Artikel</button>
    </div> -->

    <form action="upload.php" method="post" enctype="multipart/form-data" class="form-kelola">
        <input type="hidden" name="id" value="<?php echo $_SESSION['admin']['id']?>">
        <h3>Judul Artikel</h3>
        <input type="text" placeholder="Masukkan judul artikel..." name="title" required>

        <h3>Kategori</h3>
        <div class="kategori">
            <select name="kategori">
                <option value="Tarian">Tarian</option>
                <option value="Alat Musik">Alat Musik</option>
                <option value="Seni Pertunjukan Drama">Seni Pertunjukan Drama</option>
                <option value="Senjata Alat Perang ">Senjata Alat Perang</option>
                <option value="Batik">Batik</option>
                <option value="Lagu Daerah">Lagu Daerah</option>
                <option value="Pakaian tradisional">Pakaian tradisional</option>
            </select>
        </div>

        <h3>Provinsi</h3>

        <div class="kategori">
            <select name="daerah">
                <option value="">Pilih Provinsi</option>


                <option value="Aceh">Aceh</option>
                <option value="Sumatera Utara">Sumatera Utara</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Sumatera Barat">Sumatera Barat</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Riau">Riau</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Lampung">Lampung</option>
                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>


                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                <option value="Banten">Banten</option>


                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>


                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>


                <option value="Bali">Bali</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>


                <option value="Maluku">Maluku</option>
                <option value="Maluku Utara">Maluku Utara</option>


                <option value="Papua">Papua</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Papua Selatan">Papua Selatan</option>
                <option value="Papua Tengah">Papua Tengah</option>
                <option value="Papua Pegunungan">Papua Pegunungan</option>
                <option value="Papua Barat Daya">Papua Barat Daya</option>
            </select>
        </div>


        <!-- <input type="text" placeholder="Contoh: Tarian, Batik, Alat Musik" name="kategori" required> -->

        <h3>Isi Informasi</h3>
        <textarea rows="8" placeholder="Tulis isi artikel lengkap di sini..." name="content" required></textarea>

        <h3>Tambahkan Foto</h3>
        <input type="file" name="image" required>
        <br><br>

        <button type="submit" name="upload">Upload</button>

    </form>
    <div class="page-headerp">
        <h1>Permintaan User</h1>
    </div>
    <div class="populer2">

        <table>
            <tr>
                <th class="col-no">NO</th>
                <th class="col-email">EMAIL</th>
                <th class="col-judulper">JUDUL</th>
                <th class="col-kategori">KATEGORI</th>
                <th class="col-gambarper">GAMBAR</th>
                <th class="col-tanggal">TANGGAL</th>
                <th class="col-actionper">ACTION</th>
            </tr>
            <?php

            $stmt = $conn->prepare("SELECT tb_sementara.*, tb_akun.email FROM tb_sementara JOIN tb_akun ON tb_sementara.user_id = tb_akun.id");
            if (!$stmt) {
                die($conn->error);
            }

            $stmt->execute();
            $result = $stmt->get_result();


            $no = 1;
            ?>
            <?php while ($data = $result->fetch_assoc()) {


                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?= substr($data['email'], 0, 30) . "..." ?></td>
                    <td><?php echo $data['judul'] ?></td>
                    <td><?php echo $data['kategori'] ?></td>
                    <input type="hidden" name="isi" value="<?php echo $data['isi']; ?>">
                    <td><img src="../asset/konten/<?php echo $data['gambar']; ?>" width="50"></td>
                    <td><?php echo $data['date'] ?></td>
                    <td>
                        <a href="admin.php?page=detailpermintaan&id=<?= $data['id']; ?>" class="action-btn btn-proses">Detail</a>
                    </td>
                    <!-- <td>
                        <form method="POST" action="upload.php">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?>">

                            <button type="submit" name="terima" class="action-btn btn-selesai">
                                Terima
                            </button>
                        </form>
                    </td> -->


                </tr>
            <?php } ?>

        </table>
    </div>


    <div class="page-headerp">
        <h1>Daftar Artikel</h1>
    </div>

    <?php

    $search = $_GET['search'] ?? '';
    $kategori = $_GET['kategori'] ?? '';

    $limit = 5;

    $pageAktif = $_GET['halaman'] ?? 1;

    $start = ($pageAktif - 1) * $limit;

    $query = "SELECT * FROM tb_konten WHERE 1=1";

    $params = [];
    $types = "";

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

    $query .= " ORDER BY `date` DESC LIMIT ?, ?";

    $params[] = $start;
    $params[] = $limit;

    $types .= "ii";

    $stmt = $conn->prepare($query);

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();

    $result = $stmt->get_result();


    $totalQuery = "SELECT COUNT(*) as total FROM tb_konten WHERE 1=1";

    $totalParams = [];
    $totalTypes = "";

    if ($search != '') {

        $totalQuery .= " AND judul LIKE ?";

        $cari = "%$search%";

        $totalParams[] = $cari;

        $totalTypes .= "s";
    }

    if ($kategori != '') {

        $totalQuery .= " AND kategori = ?";

        $totalParams[] = $kategori;

        $totalTypes .= "s";
    }

    $totalStmt = $conn->prepare($totalQuery);

    if (!empty($totalParams)) {
        $totalStmt->bind_param($totalTypes, ...$totalParams);
    }

    $totalStmt->execute();

    $totalResult = $totalStmt->get_result();

    $totalData = $totalResult->fetch_assoc()['total'];

    $totalHalaman = ceil($totalData / $limit);

    $no = $start + 1;

    ?>


    <form method="GET" action="admin.php" class="container-search search">

        <input type="hidden" name="page" value="kelolaartikel">

        <div>

            <input type="text" name="search" value="<?php echo $search; ?>">

            <button name="cari">search</button>

            <?php if ($search != '') { ?>

                <a href="admin.php?page=kelolaartikel">
                    <img src="../asset/icon/xicon.png">
                </a>

            <?php } ?>

        </div>

        <div>

            <select name="kategori" onchange="this.form.submit()">

                <option value="">Kategori</option>

                <option value="tarian" <?php if ($kategori == 'tarian')
                    echo 'selected'; ?>>
                    Tarian
                </option>

                <option value="pakaian tradisional" <?php if ($kategori == 'pakaian tradisional')
                    echo 'selected'; ?>>
                    Pakaian Tradisional
                </option>

                <option value="senjata alat perang" <?php if ($kategori == 'senjata alat perang')
                    echo 'selected'; ?>>
                    Senjata Alat perang
                </option>

                <option value="seni pertunjukan drama" <?php if ($kategori == 'seni pertunjukan drama')
                    echo 'selected'; ?>>
                    Seni Pertunjukan Drama
                </option>

                <option value="lagu daerah" <?php if ($kategori == 'lagu daerah')
                    echo 'selected'; ?>>
                    Lagu Daerah
                </option>

                <option value="alat musik" <?php if ($kategori == 'alat musik')
                    echo 'selected'; ?>>
                    Alat Musik
                </option>

                <option value="batik" <?php if ($kategori == 'batik')
                    echo 'selected'; ?>>
                    Batik
                </option>

            </select>

            <?php if ($kategori != '') { ?>

                <a href="admin.php?page=kelolaartikel">
                    <img src="../asset/icon/xicon.png">
                </a>

            <?php } ?>

        </div>

    </form>


    <div class="populer2">

        <table>

            <tr>
                <th class="col-no">NO</th>
                <th>TITLE</th>
                <th>KATEGORI</th>
                <th class="col-contentart">CONTENT</th>
                <th>IMAGE</th>
                <th class="col-tanggalart">DATE</th>
                <th class="col-actiondftr">ACTION</th>
            </tr>

            <?php while ($data = $result->fetch_assoc()) { ?>

                <tr>

                    <td><?php echo $no++ ?></td>

                    <td><?php echo $data['judul'] ?></td>

                    <td><?php echo $data['kategori'] ?></td>

                    <td><?= substr($data['isi'], 0, 25) . "..." ?></td>

                    <td>
                        <img src="../asset/konten/<?php echo $data['gambar']; ?>" width="100">
                    </td>

                    <td><?php echo $data['date'] ?></td>

                    <td class="column-button">
                        <a href="admin.php?page=edit&id=<?php echo $data['id']; ?>" class="action-btn btn-edit">
                            Edit
                        </a>
                        <form method="POST" action="delete.php">

                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                            <button type="submit" name="hapusartikel" class="action-btn btn-hapus">
                                Hapus
                            </button>

                        </form>

                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>


    <div class="pagination">

        <?php for ($i = 1; $i <= $totalHalaman; $i++) { ?>

            <a href="admin.php?page=kelolaartikel&halaman=<?php echo $i; ?>&search=<?php echo $search; ?>&kategori=<?php echo $kategori; ?>"
                class="<?php echo ($pageAktif == $i) ? 'active' : ''; ?>">

                <?php echo $i; ?>

            </a>

        <?php } ?>

    </div>