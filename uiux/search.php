<?php
include "api.php";

header('Content-Type: application/json');

$q = $_GET['q'] ?? '';

$stmt = $conn->prepare("SELECT id, judul, gambar, daerah, kategori FROM tb_konten WHERE judul LIKE ? OR daerah LIKE ? OR kategori LIKE ? LIMIT 10");

$search = "%$q%";
$stmt->bind_param("sss", $search, $search, $search);
$stmt->execute();

$result = $stmt->get_result();

$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

if (count($data) === 0) {
  echo json_encode([
    "status" => "empty",
    "message" => "Artikel Tidak Ditemukan",
    "data" => []
  ]);
} else {
  echo json_encode([
    "status" => "success",
    "data" => $data
  ]);
}
?>