<?php
if (isset($_GET['id'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = $pdo->prepare("UPDATE customers set 
        Name='{$name}', 
        Surname='{$lastname}',
        Username='{$username}',
        Password='{$password}' WHERE Customers_ID = ?");
        $sql->execute([$_GET['id']]);

        header("Location: index.php?page=admin");
    }
}
?>