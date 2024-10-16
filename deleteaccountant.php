<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getAccountantByID = getAccountantByID($pdo, $_GET['accountant_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Username: <?php echo $getAccountantByID['username']; ?></h2>
		<h2>FirstName: <?php echo $getAccountantByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getAccountantByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getAccountantByID['date_of_birth']; ?></h2>
		<h2>Field Specialty: <?php echo $getAccountantByID['field_specialty']; ?></h2>
		<h2>Date Added: <?php echo $getAccountantByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?accountant_id=<?php echo $_GET['accountant_id']; ?>" method="POST">
				<input type="submit" name="deleteAccountantBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>