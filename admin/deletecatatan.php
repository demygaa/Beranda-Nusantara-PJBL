<?php

include "api.php";


$id = (int) $_GET['id'];
$query = "DELETE from tb_catatan where id='$id'";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
?>

<script language="javascript">document.location.href="admin.php?page=dashboard";</script>

<?php    
} else {
    echo "gagal delete";
}
?>