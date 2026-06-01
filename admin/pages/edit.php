<?php
include "api.php";

$id = $_GET['id'] ?? "";


$stmt = $conn->prepare("SELECT * FROM tb_konten WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();



$kategori = $data['kategori'] ?? "";
$provinsi = $data['daerah'] ?? "";
?>



<div class="edit-page">

    <div class="edit-card">

        <h1 class="edit-title">
            Edit Artikel
        </h1>

        <form method="POST" action="upload.php" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="edit-group">
                <label>Judul Artikel</label>

                <input type="text" name="title" value="<?php echo $data['judul']; ?>">
            </div>

            <div class="edit-group">
                <label>Isi Artikel</label>

                <textarea name="content"><?php echo $data['isi']; ?></textarea>
            </div>

            <div class="edit-group">
                <label>Kategori</label>

                <select name="kategori">
                    <option value="">Kategori</option>
                    <option value="Tarian" <?php if ($kategori == 'tarian')
                        echo 'selected'; ?>>Tarian</option>
                    <option value="Pakaian tradisional" <?php if ($kategori == 'pakaian tradisional')
                        echo 'selected'; ?>>
                        Pakaian Tradisional</option>
                    <option value="Senjata alat perang" <?php if ($kategori == 'senjata alat perang')
                        echo 'selected'; ?>>
                        Senjata Alat perang</option>
                    <option value="Seni pertunjukan drama" <?php if ($kategori == 'Seni pertunjukan drama')
                        echo 'selected'; ?>>Seni
                        Pertunjukan Drama</option>
                    <option value="Lagu daerah" <?php if ($kategori == 'lagu daerah')
                        echo 'selected'; ?>>Lagu Daerah
                    </option>
                    <option value="Alat musik" <?php if ($kategori == 'alat musik')
                        echo 'selected'; ?>>Alat Musik
                    </option>
                    <option value="Batik" <?php if ($kategori == 'batik')
                        echo 'selected'; ?>>Batik</option>
                </select>
            </div>

            <div class="edit-group">

                <label>Provinsi</label>

                <select name="daerah">
                    <option value="">Pilih Provinsi</option>

                    <option value="Aceh" <?php if ($provinsi == 'Aceh')
                        echo 'selected'; ?>>Aceh</option>

                    <option value="Sumatera Utara" <?php if ($provinsi == 'Sumatera Utara')
                        echo 'selected'; ?>>
                        Sumatera Utara
                    </option>

                    <option value="Sumatera Selatan" <?php if ($provinsi == 'Sumatera Selatan')
                        echo 'selected'; ?>>
                        Sumatera Selatan
                    </option>

                    <option value="Sumatera Barat" <?php if ($provinsi == 'Sumatera Barat')
                        echo 'selected'; ?>>
                        Sumatera Barat
                    </option>

                    <option value="Bengkulu" <?php if ($provinsi == 'Bengkulu')
                        echo 'selected'; ?>>
                        Bengkulu
                    </option>

                    <option value="Riau" <?php if ($provinsi == 'Riau')
                        echo 'selected'; ?>>
                        Riau
                    </option>

                    <option value="Kepulauan Riau" <?php if ($provinsi == 'Kepulauan Riau')
                        echo 'selected'; ?>>
                        Kepulauan Riau
                    </option>

                    <option value="Jambi" <?php if ($provinsi == 'Jambi')
                        echo 'selected'; ?>>
                        Jambi
                    </option>

                    <option value="Lampung" <?php if ($provinsi == 'Lampung')
                        echo 'selected'; ?>>
                        Lampung
                    </option>

                    <option value="Kepulauan Bangka Belitung" <?php if ($provinsi == 'Kepulauan Bangka Belitung')
                        echo 'selected'; ?>>
                        Kepulauan Bangka Belitung
                    </option>

                    <!-- Jawa -->
                    <option value="DKI Jakarta" <?php if ($provinsi == 'DKI Jakarta')
                        echo 'selected'; ?>>
                        DKI Jakarta
                    </option>

                    <option value="Jawa Barat" <?php if ($provinsi == 'Jawa Barat')
                        echo 'selected'; ?>>
                        Jawa Barat
                    </option>

                    <option value="Jawa Tengah" <?php if ($provinsi == 'Jawa Tengah')
                        echo 'selected'; ?>>
                        Jawa Tengah
                    </option>

                    <option value="Jawa Timur" <?php if ($provinsi == 'Jawa Timur')
                        echo 'selected'; ?>>
                        Jawa Timur
                    </option>

                    <option value="Daerah Istimewa Yogyakarta" <?php if ($provinsi == 'Daerah Istimewa Yogyakarta')
                        echo 'selected'; ?>>
                        Daerah Istimewa Yogyakarta
                    </option>

                    <option value="Banten" <?php if ($provinsi == 'Banten')
                        echo 'selected'; ?>>
                        Banten
                    </option>

                    <option value="Kalimantan Barat" <?php if ($provinsi == 'Kalimantan Barat')
                        echo 'selected'; ?>>
                        Kalimantan Barat
                    </option>

                    <option value="Kalimantan Timur" <?php if ($provinsi == 'Kalimantan Timur')
                        echo 'selected'; ?>>
                        Kalimantan Timur
                    </option>

                    <option value="Kalimantan Selatan" <?php if ($provinsi == 'Kalimantan Selatan')
                        echo 'selected'; ?>>
                        Kalimantan Selatan
                    </option>

                    <option value="Kalimantan Tengah" <?php if ($provinsi == 'Kalimantan Tengah')
                        echo 'selected'; ?>>
                        Kalimantan Tengah
                    </option>

                    <option value="Kalimantan Utara" <?php if ($provinsi == 'Kalimantan Utara')
                        echo 'selected'; ?>>
                        Kalimantan Utara
                    </option>

                    <option value="Sulawesi Utara" <?php if ($provinsi == 'Sulawesi Utara')
                        echo 'selected'; ?>>
                        Sulawesi Utara
                    </option>

                    <option value="Sulawesi Tengah" <?php if ($provinsi == 'Sulawesi Tengah')
                        echo 'selected'; ?>>
                        Sulawesi Tengah
                    </option>

                    <option value="Sulawesi Selatan" <?php if ($provinsi == 'Sulawesi Selatan')
                        echo 'selected'; ?>>
                        Sulawesi Selatan
                    </option>

                    <option value="Sulawesi Tenggara" <?php if ($provinsi == 'Sulawesi Tenggara')
                        echo 'selected'; ?>>
                        Sulawesi Tenggara
                    </option>

                    <option value="Gorontalo" <?php if ($provinsi == 'Gorontalo')
                        echo 'selected'; ?>>
                        Gorontalo
                    </option>

                    <option value="Sulawesi Barat" <?php if ($provinsi == 'Sulawesi Barat')
                        echo 'selected'; ?>>
                        Sulawesi Barat
                    </option>

                    <option value="Bali" <?php if ($provinsi == 'Bali')
                        echo 'selected'; ?>>
                        Bali
                    </option>

                    <option value="Nusa Tenggara Barat" <?php if ($provinsi == 'Nusa Tenggara Barat')
                        echo 'selected'; ?>>
                        Nusa Tenggara Barat
                    </option>

                    <option value="Nusa Tenggara Timur" <?php if ($provinsi == 'Nusa Tenggara Timur')
                        echo 'selected'; ?>>
                        Nusa Tenggara Timur
                    </option>

                    <option value="Maluku" <?php if ($provinsi == 'Maluku')
                        echo 'selected'; ?>>
                        Maluku
                    </option>

                    <option value="Maluku Utara" <?php if ($provinsi == 'Maluku Utara')
                        echo 'selected'; ?>>
                        Maluku Utara
                    </option>

                    <option value="Papua" <?php if ($provinsi == 'Papua')
                        echo 'selected'; ?>>
                        Papua
                    </option>

                    <option value="Papua Barat" <?php if ($provinsi == 'Papua Barat')
                        echo 'selected'; ?>>
                        Papua Barat
                    </option>

                    <option value="Papua Selatan" <?php if ($provinsi == 'Papua Selatan')
                        echo 'selected'; ?>>
                        Papua Selatan
                    </option>

                    <option value="Papua Tengah" <?php if ($provinsi == 'Papua Tengah')
                        echo 'selected'; ?>>
                        Papua Tengah
                    </option>

                    <option value="Papua Pegunungan" <?php if ($provinsi == 'Papua Pegunungan')
                        echo 'selected'; ?>>
                        Papua Pegunungan
                    </option>

                    <option value="Papua Barat Daya" <?php if ($provinsi == 'Papua Barat Daya')
                        echo 'selected'; ?>>
                        Papua Barat Daya
                    </option>
                </select>

            </div>

            <div class="edit-group">
                <label>Gambar</label>
                <div class="edit-preview">
                    <img src="../asset/konten/<?php echo $data['gambar']; ?>">
                </div>
            </div>

            <div class="edit-group">

                <label class="upload-label">
                    Upload Gambar Baru
                </label>

                <input type="file" name="image" class="upload-input">

                <small class="upload-note">
                    Leave blank if you don't want to change the image
                </small>

            </div>


            <button type="submit" name="update" class="edit-button">
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>