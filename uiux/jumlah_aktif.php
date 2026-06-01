<?php
include "api.php";

$conn->query("DELETE FROM tb_pengguna_aktif WHERE last_active < NOW() - INTERVAL 10 SECOND");

$result = $conn->query("SELECT COUNT(*) as total FROM tb_pengguna_aktif");

$data = $result->fetch_assoc();

echo $data['total'];
?>