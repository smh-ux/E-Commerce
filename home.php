<?php
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY DateAdded DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Welcome to Your Virtual Store')?>
 
<div class="recentlyadded content-wrapper" style="width:100%;">  

    <h2 style="background-image: url('imgs/background2.jpeg');padding:170px;color:#000;opacity:0.6;font-size:40px;background-size:100%">Recently Added Products</h2>

    <div class="products" style="margin-top:82px;width:90%;margin-left:10%;">

        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['Products_ID']?>" class="product">
            <img src="imgs/<?=$product['Img']?>" width="200" height="200" alt="<?=$product['Name']?>">
            <span class="name"><?=$product['Name']?></span>
            <span class="price">
                &dollar;<?=$product['Price']?>
                <?php if ($product['Discount'] > 0): ?>
                <span class="discount">&dollar;<?=$product['Discount']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>

    </div>
    
</div>

<?=template_footer()?> 