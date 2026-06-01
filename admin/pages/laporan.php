<?php include "api.php"; 

$stmt = $conn->prepare("SELECT tb_laporan.*, tb_akun.email, tb_akun.username FROM tb_laporan JOIN tb_akun ON tb_laporan.user_id = tb_akun.id");
$stmt->execute();
$result = $stmt->get_result();

$no = 1;

?>


<div id="laporan" class="page">
    <div class="page-header">
        <h1>Laporan User</h1>
        <p>Daftar laporan yang masuk dari pengguna</p>
    </div>

    <div class="laporan-table">
        <table>
            <thead>
                <tr>
                    <th class="col-no">No</th>
                    <th>Email Pengguna</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $result->fetch_assoc()) { ?>
                <tr>
                    <td class="col-no"><?php echo $no++ ?></td>
                    <td class="email-col"><?php echo $data['email']?></td>
                    <td class="laporan-col"><?php echo $data['isi']?></td>
                    <td><span class="status <?php echo $data['status']; ?>""><?php  echo ucfirst($data['status']);?></span></td>
                    <td>
                        <form action="upload.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="isi" value="<?php echo $data['isi']?>">
                        <button type="submit" name="status" value="proses" class="action-btn btn-proses">
                            Proses
                        </button>

                        <button type="submit" name="status" value="selesai" class="action-btn btn-selesai">
                            Selesai
                        </button>
                    </form>
                    </td>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>