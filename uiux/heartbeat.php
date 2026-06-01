<?php
include "api.php";

$tab_id = $_POST['tab_id'] ?? '';

if ($tab_id != '') {

    $stmt = $conn->prepare("
        INSERT INTO tb_pengguna_aktif (session_id, last_active)
        VALUES (?, NOW())
        ON DUPLICATE KEY UPDATE
        last_active = NOW()
    ");

    $stmt->bind_param("s", $tab_id);
    $stmt->execute();
}
?>