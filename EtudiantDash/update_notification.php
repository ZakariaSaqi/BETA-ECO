<?php
require('../connexion.php');
session_start();

// Assuming you have a database connection established already

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_notification') {
  $user_id = $_POST['user_id'];

  // Update the etat_notif value to 0 for the logged-in user
  $reqUpdate = "UPDATE notification SET etat_notif = 0 WHERE etat_notif = 1 AND id_user = :user_id";
  $stmtUpdate = $pdo->prepare($reqUpdate);
  $stmtUpdate->bindParam(':user_id', $user_id);
  $stmtUpdate->execute();

  // Return a response (optional)
  echo "Notification status updated successfully.";
}
?>
