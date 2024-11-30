<?php 
    session_start();
    if (!isset($_SESSION['flower'])) {
        $_SESSION['flower'] = [];
    }
    $stt = $_GET['this_id'] - 1;
    unset($_SESSION['flower'][$stt]);
    header('location: admin.php');
?>