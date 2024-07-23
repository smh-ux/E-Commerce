<?php
$num_products_on_each_page = 4;

$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

$stmt = $pdo->prepare('SELECT * FROM products ORDER BY DateAdded DESC LIMIT ?,?');

$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?=template_header('You Can Choose Whatever You Want')?>
 
<div class="products content-wrapper" style="width:100%;">

    <h1 style="background-image: url('imgs/background2.jpeg');padding:170px;color:#000;opacity:0.6;font-size:40px;background-size:100%">Products</h1>
    <p style="margin-top:25px;width:90%;margin-left:10%;font-size:25px;"><?=$total_products?> Product</p>

    <div class="products-wrapper" style="margin-top:10px;width:90%;margin-left:10%;">

        <?php foreach ($products as $product): ?> 
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
    
    <div class="buttons" style="margin-right:10%;">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Back</a>
        <?php endif; ?>

        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>

</div>

<?=template_footer()?>