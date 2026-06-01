<?php
include "api.php";

if (isset($_POST['hapusartikel'])) {
    $id = $_POST['id'];

    $stmt= $conn->prepare("DELETE FROM tb_konten WHERE id=?");
    $stmt->bind_param("i",$id);
    
    if ($stmt->execute()) { ?>
        <script language="javascript">document.location.href="admin.php?page=kelolaartikel&hapus=1";</script>
    <?php }
}


?>