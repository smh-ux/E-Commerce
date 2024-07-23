<?php
if (isset($_SESSION['loggedinAdmin'])) {
    unset($_SESSION['loggedinAdmin']);
}

if (isset($_SESSION['loggedinCustomer'])) {
    unset($_SESSION['loggedinCustomer']);
}

session_destroy();

header('Location: index.php');

?>