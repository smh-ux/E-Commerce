<?php
if (isset($_GET['id'])) {
    $sql = $pdo->prepare("DELETE FROM customers WHERE Customers_ID = ?");
    $sql->execute([$_GET['id']]);

    header("Location: index.php?page=admin");
    }
?>