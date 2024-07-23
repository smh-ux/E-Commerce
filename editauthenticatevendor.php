<?php 
if (isset($_GET['id'])) {
    $stmt1 = $pdo->prepare('SELECT * FROM vendors WHERE Vendors_ID = ?');
    $stmt1->execute([$_GET['id']]);
 
    $vendors = $stmt1->fetch(PDO::FETCH_ASSOC); 

    if (!$vendors) {
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
			<form action="index.php?page=updatevendor&id=<?=$vendors["Vendors_ID"]?>" method="post">
				<label for="name"> 
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="name" value="<?=$vendors["Name"]?>" placeholder="İsim" id="name" required>

				<label for="lastname">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="lastname" value="<?=$vendors["Surname"]?>" placeholder="Soyisim" id="lastname" required>
				
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" value="<?=$vendors["Username"]?>" placeholder="Kullanıcı Adı" id="username" required>
				
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Yeni Şifre" id="password" required>
				
				<input type="submit" value="Kaydet"> 
			</form>
		</div>
</div>

<?=template_footer()?>