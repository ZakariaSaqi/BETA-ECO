<?php
if (!isset($_COOKIE['visited'])) {
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $insertQuery = "INSERT INTO visitors (ip_address, visit_date) VALUES ('$ipAddress', NOW())";
    $pdo->query($insertQuery);
    setcookie('visited', true, time() + 86400);
}

$countQuery = "SELECT COUNT(*) AS total_visitors FROM visitors";
$result = $pdo->query($countQuery);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalVisitors = $row['total_visitors'];


?>
