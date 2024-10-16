<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getAccountantByID = getAccountantByID($pdo, $_GET['accountant_id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?accountant_id=<?php echo $_GET['accountant_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getAccountantByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getAccountantByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getAccountantByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="firstName">Field Specialty</label> 
			<input type="text" name="fieldSpecialty" value="<?php echo $getAccountantByID['field_specialty']; ?>">
			<input type="submit" name="editAccountantBtn">
		</p>
	</form>
</body>
</html>