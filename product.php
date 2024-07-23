<?php 
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE Products_ID = ?');
    $stmt->execute([$_GET['id']]);
 
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        exit('Product does not exist!');
    } 
    
} else {
    exit('Product does not exist!!');
}
?>

<?=template_header('Product')?>

<div class="product content-wrapper">

    <img src="imgs/<?=$product['Img']?>" width="500" height="500" alt="<?=$product['Name']?>">
    
    <div>
        <h1 class="name"><?=$product['Name']?></h1>

        <span class="price">
            &dollar;<?=$product['Price']?>
            <?php if ($product['Discount'] > 0): ?>
            <span class="discount">&dollar;<?=$product['Discount']?></span>
            <?php endif; ?>
        </span>

        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['Quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['Products_ID']?>">
            <input type="submit" value="Sepete Ekle">
        </form>

        <div class="description">
            <?=$product['Desc']?>
        </div>

    </div>
    
</div>

<?=template_footer()?>