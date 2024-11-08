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
	<a href="viewclient.php?accountant_id=<?php echo $_GET['accountant_id']; ?>">
	View The Client</a>
	<h1>Edit the client!</h1>
    
	<?php $getClientByID = getClientByID($pdo, $_GET['client_id']); ?>

	<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>
	&accountant_id=<?php echo $_GET['accountant_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" 
			value="<?php echo $getClientByID['first_name']; ?>">
		</p>
        <p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" 
			value="<?php echo $getClientByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Service Requested</label> 
			<input type="text" name="serviceRequested" 
			value="<?php echo $getClientByID['service_requested']; ?>">
			<input type="submit" name="editClientBtn">
		</p>
	</form>
</body>
</html>