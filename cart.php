<?php
if (!isset($_SESSION['loggedinCustomer'])) {
    header('Location: index.php?page=info');
    exit;
}

// --------------- Product Adding -----------------
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // We want to use valuable of post easily.
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    
    $stmt = $pdo->prepare('SELECT * FROM products WHERE Products_ID = ?');
    $stmt->execute([$_POST['product_id']]);
    
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product && $quantity > 0) {

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    header('location: index.php?page=cart');
    exit;
}

// -------------- Product Delete From Shoping Cart ------------------
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

// -------------- Product Update for Shopping Cart ------------------
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    header('location: index.php?page=cart');
    exit;
}

// ------------ Offer ------------------
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('location: index.php?page=placeorder');
    exit;
}

// -------------- Calculating ----------------------
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;


if ($products_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE Products_ID IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($products_in_cart));

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $subtotal += (float)$product['Price'] * (int)$products_in_cart[$product['Products_ID']];
    }
}

?>

<?php //Apostrophe usage for code. ?>
<?=template_header('let&#39;s finish it')?>

<div class="cart content-wrapper">

    <h1>Shopping Cart</h1>

    <form action="index.php?page=cart" method="post">

        <table>

            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($products)): ?>

                <tr>
                    <td colspan="5" style="text-align:center;">You haven't added any products to your cart.</td>
                </tr>

                <?php else: ?>
                <?php foreach ($products as $product): ?>

                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['Products_ID']?>">
                            <img src="imgs/<?=$product['Img']?>" width="50" height="50" alt="<?=$product['Name']?>">
                        </a>
                    </td>

                    <td>
                        <a href="index.php?page=product&id=<?=$product['Products_ID']?>"><?=$product['Name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['Products_ID']?>" class="remove">Kaldır</a>
                    </td>

                    <td class="price">&dollar;<?=$product['Price']?></td>

                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['Products_ID']?>" value="<?=$products_in_cart[$product['Products_ID']]?>" min="1" max="<?=$product['Quantity']?>" placeholder="Quantity" required>
                    </td>

                    <td class="price">&dollar;<?=$product['Price'] * $products_in_cart[$product['Products_ID']]?></td>
                </tr>

                <?php endforeach; ?>
                <?php endif; ?>

            </tbody>

        </table>

        <div class="subtotal">
            <span class="text">Cart Amount</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>

        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Order" name="placeorder">
        </div>

        <div class="paypal">
            <form action="index.php?page=paypal" method="post">

                <button type="submit" name="paypal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" alt="PayPal Logo"></button>
            </form>
        </div>

    </form>

</div>

<?=template_footer()?>