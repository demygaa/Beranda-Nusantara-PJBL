<?php if (isset($_GET['success']) && $_GET['success'] == 1):  
   ?>
   

    <div class="success" id="success">
        Artikel berhasil dikirim!
    </div>

<?php endif; ?>
<h1>Artikel</h1>

<button id="tambah" class="tambah-btn">Tambahkan Artikel Sekarang!</button>

<div class="artikel-form">

    <form action="upload.php"  method="post" class="input" enctype="multipart/form-data">
        <div class="input-group">
            <label>Judul</label>
            <input type="text" placeholder="Masukkan judul" name="judul" required>

        </div>

        <div class="input-group">
            <label>Kategori</label>
            <div class="kategori">
                <select name="kategori" required>
                    <option value="Tarian">Tarian</option>
                    <option value="Alat Musik">Alat Musik</option>
                    <option value="Seni Pertunjukan Drama">Seni Pertunjukan Drama</option>
                    <option value="Senjata Alat Perang ">Senjata Alat Perang</option>
                    <option value="Batik">Batik</option>
                    <option value="Lagu Daerah">Lagu Daerah</option>
                    <option value="Pakaian tradisional">Pakaian tradisiona</option>
                </select>
            </div>
        </div>

        <div class="input-group">
            <label>Provinsi</label>
            <div class="kategori">
                <select name="daerah" required>
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
        </div>

        <div class="input-group">
            <label>Isi</label>
            <textarea rows="8" placeholder="Tulis isi artikel lengkap di sini..." name="content" required></textarea>
        </div>

        <div class="input-group">
            <label>Thumbanil</label>
            <input type="file" name="image" required>
        </div>

        <button type="submit" name="minta" class="save-btn">KIRIM</button>
    </form>
</div>

<?php
    $id =  $_SESSION['user']['id'];
    $stmt = $conn->prepare("SELECT * FROM tb_konten WHERE user_id = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $res = $stmt->get_result();
    
    $no = 1;
    ?>
    <h1>Daftar Artikel Diterima</h1>
    <div class="table-wrapper">
        <table>
            <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>DATE</th>
                <th>AKSI</th>
            </tr>
            <?php while ($data = $res->fetch_assoc()) {?>
            <tr>
                <td><?php echo $no++?></td>
                <td><?php  echo $data['judul']?></td>
                <td><?php echo $data['date']?></td>
                <td>
                    <a href="index.php?page=profile&tab=detail&id=<?php echo $data['id']; ?>" class="detail-btn">

                            Detail

                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>