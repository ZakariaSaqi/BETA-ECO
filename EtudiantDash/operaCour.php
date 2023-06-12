<?php
ob_start();
session_start();
if (!isset($_SESSION['ida'])) {
    header('location:../login.php');
} else {
    require_once('../connexion.php');
    ?>
    <html lang="en">

    <head>
        <title>Admin - Opération</title>
        <?php include('links.html') ?>
    </head>
   <?php
   if ($_GET['action'] == 'Telecharger') {
        $id = $_GET['id'];
        $reqdown = "SELECT cours FROM cours WHERE id_cours=$id";
        $resdown = $pdo->query($reqdown);
        $rowdown = $resdown->fetch(PDO::FETCH_ASSOC);
        if (!empty($rowdown['cours'])) {
            $file = $rowdown['cours'];

            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . basename($file));
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
            readfile($file);
            exit; // Stop script execution after the file is downloaded
        }
        header('location:cours.php');
    }



}
?>

</html>
<?php ob_end_flush(); ?>