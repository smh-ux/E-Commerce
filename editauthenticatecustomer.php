<?php
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM customers WHERE Customers_ID = ?');
    $stmt->execute([$_GET['id']]);
 
    $customers = $stmt->fetch(PDO::FETCH_ASSOC); 

    if (!$customers) {
        exit('Mevcut kişi bulunamadı!');
    } 
} else {
    exit('Kişi bulunamadı!');
}
?>

<?=template_header('Edit')?>

<div class="cart content-wrapper">
    <h1>Account Edit</h1>
    <div class="login">
			<h1>Edit</h1> 
			<form action="index.php?page=updatecustomer&id=<?=$customers["Customers_ID"]?>" method="post">
				<label for="name"> 
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="name" value="<?=$customers["Name"]?>" placeholder="İsim" id="name" required>

				<label for="lastname">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="lastname" value="<?=$customers["Surname"]?>" placeholder="Soyisim" id="lastname" required>
				
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" value="<?=$customers["Username"]?>" placeholder="Kullanıcı Adı" id="username" required>
				
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Yeni Şifre" id="password" required>
				
				<input type="submit" value="Kaydet"> 
			</form>
		</div>
</div>

<?=template_footer()?>