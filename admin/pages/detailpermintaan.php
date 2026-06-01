<?php
include "api.php";

$id = $_GET['id'] ?? "";
$stmt = $conn->prepare("SELECT * FROM tb_sementara WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<link rel="stylesheet" href="../css/detail.css">

<div class="detail-page">

    <div class="detail-card">

        <div class="detail-header">

            <img src="../asset/konten/<?php echo $data['gambar']; ?>" class="detail-image">

            <div class="detail-info">

                <span class="detail-category">
                    <?php echo $data['kategori']; ?>
                </span>

                <h1 class="detail-title">
                    <?php echo $data['judul']; ?>
                </h1>

            </div>

        </div>

        <div class="detail-content">

            <?php
            $paragraf = explode("\n", $data['isi']);

            foreach ($paragraf as $p) {

                if (trim($p) != "") {

                    echo "<p>$p</p>";
                }

            }
            ?>

        </div>
        <form method="POST" action="upload.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?>">

            <button type="submit" name="terima" class="action-btn btn-selesai">
                Terima
            </button>
            <button type="submit" name="tolak" class="action-btn btn-hapus">
                Tolak
            </button>
        </form>

    </div>

</div>