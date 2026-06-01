<?php

include "api.php";

$user_id = $_SESSION['user']['id'];

$stmt = $conn->prepare("
SELECT * FROM tb_notifikasi 
WHERE user_id=? 
ORDER BY created_at DESC
");

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();


function labelWaktu($date) {
    $time = strtotime($date);
    $today = strtotime(date('Y-m-d'));
    $yesterday = strtotime(date('Y-m-d', strtotime('-1 day')));

    if ($time >= $today) return "Hari ini";
    if ($time >= $yesterday) return "Kemarin";
    return date('d M Y', $time);
}

$lastLabel = "";

?>

<div class="notif-container">

    <?php while ($row = $result->fetch_assoc()) { 

        $label = labelWaktu($row['created_at']);

        if ($label != $lastLabel) {
            echo "<div class='notif-group-label'>$label</div>";
            $lastLabel = $label;
        }
    ?>

        <div class="notif-card <?php echo $row['status_baca'] == 0 ? 'unread' : '' ?>">

            <div class="notif-text">
                <?php echo $row['pesan']; ?>
            </div>

            <div class="notif-time">
                <?php echo date('H:i', strtotime($row['created_at'])); ?>
            </div>

        </div>

    <?php } ?>

</div>