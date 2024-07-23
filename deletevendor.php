<?php
if (isset($_GET['id'])) {
    $sql = $pdo->prepare("DELETE FROM vendors WHERE Vendors_ID = ?");
    $sql->execute([$_GET['id']]);

    header("Location: index.php?page=admin");
    }
?>