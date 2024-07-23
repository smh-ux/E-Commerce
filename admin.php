<?php
if (!$_SESSION['loggedinAdmin']) {
	header('Location: index.php?page=login');
	exit;
}

$stmt = $pdo->query("SELECT * FROM customers");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt1 = $pdo->query("SELECT * FROM vendors");
$vendors = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header("Admin")?>

<div class="cart content-wrapper">
	<h1>Customers</h1>
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Surname</td>
				<td>Username</td>
				<td>Password</td>
				<td>Transactions</td>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($customers as $customer): ?>
			<tr>
				<td><?php echo $customer["Customers_ID"]; ?></td>
				<td><?php echo $customer["Name"]; ?></td>
				<td><?php echo $customer["Surname"]; ?></td>
				<td><?php echo $customer["Username"]; ?></td>
				<td><?php echo $customer["Password"]; ?></td>
				<td>
					<a href="index.php?page=editauthenticatecustomer&id=<?=$customer["Customers_ID"]?>">Update</a>
					<a href="index.php?page=deletecustomer&id=<?=$customer["Customers_ID"]?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<br>
	
	<h1>Vendors</h1>
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Surname</td>
				<td>Username</td>
				<td>Password</td>
				<td>Transactions</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($vendors as $vendor): ?>
				<tr>
					<td><?php echo $vendor["Vendors_ID"]; ?></td>
					<td><?php echo $vendor["Name"]; ?></td>
					<td><?php echo $vendor["Surname"]; ?></td>
					<td><?php echo $vendor["Username"]; ?></td>
					<td><?php echo $vendor["Password"]; ?></td>
					<td>
						<a href="index.php?page=editauthenticatevendor&id=<?=$vendor["Vendors_ID"]?>">Update</a>
						<a href="index.php?page=deletevendor&id=<?=$vendor["Vendors_ID"]?>">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<?=template_footer()?>