<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE Username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    $stmt1 = $pdo->prepare("SELECT * FROM customers WHERE Username = ?");
    $stmt1->execute(([$username]));
    $row1 = $stmt1->fetch();

    $stmt2 = $pdo->prepare("SELECT * FROM vendors WHERE Username = ?");
    $stmt2->execute(([$username]));
    $row2 = $stmt2->fetch();

    $hash = password_hash($password, PASSWORD_DEFAULT);

    if ($row && password_verify($row["Password"], $hash)) { 
        session_regenerate_id();
        $_SESSION['loggedinAdmin'] = TRUE;
        unset($_SESSION['loggedinCustomer']);
        unset($_SESSION['loggedinVendor']);
        header("Location: index.php?page=admin");
        exit;
    } else if ($row2 && password_verify($row2["Password"], $hash)) {
        session_regenerate_id();
        $_SESSION['loggedinVendor'] = TRUE;
        unset($_SESSION['loggedinAdmin']);
        unset($_SESSION['loggedinCustomer']);
        header("Location: index.php?page=vendor");
        exit;
    } else {
        if ($row1 && password_verify($row1["Password"], $hash)) {
            session_regenerate_id();
            $_SESSION['loggedinCustomer'] = TRUE;
            unset($_SESSION['loggedinAdmin']);
            unset($_SESSION['loggedinVendor']);
            header("Location: index.php");
            exit;
        } 
        echo "Incorrect Password or Username.";
    }
}

?>