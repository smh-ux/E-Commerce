<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $describe = $_POST['describe'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $file = $_POST['file'];

    $lines = explode("\n", $describe);

    $html = "<ul>\n";

    foreach ($lines as $line) {
        $html .= "  <li>" . htmlspecialchars($line) . "</li>\n";
    }

    $html .= "</ul>\n";

    $combine = $title . $html;

    if ($category == "Technology") {
        $category = 11;
    } else if ($category == "Fashion") {
        $category = 22;
    }

    $stmt2 = $pdo->prepare("SELECT * FROM vendors");
    $stmt2->execute();
    $vendor = $stmt2->fetch();
    
    $sql = "INSERT INTO products(
        Name,
        Desc,
        Price,
        Quantity,
        Img
        Categories_ID,
        Vendors_ID
    ) VALUES (
        '{$name}', 
        '{$combine}',
        '{$price}',
        '{$quantity}',
        '{$file}',
        '{$category}',
        '{$vendor}')";

    $pdo->exec($sql);
    
    header("Location: index.php?page=vendor");
    exit;
}
?>