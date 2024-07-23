<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $address  = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO customers(
        Name,
        Surname,
        EMail,
        Phone_number,
        Address,
        Username,
        Password
    ) VALUES (
        '{$name}', 
        '{$surname}',
        '{$email}',
        '{$phonenumber}',
        '{$address}',
        '{$username}',
        '{$password}')";

    $pdo->exec($sql);

    header("Location: index.php?page=login");
}
?>