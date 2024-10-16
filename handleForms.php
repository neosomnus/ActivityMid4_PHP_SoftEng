<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertAccountantBtn'])) {

	$query = insertAccountant($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['fieldSpecialty']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['editAccountantBtn'])) {
	$query = updateAccountant($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['fieldSpecialty'], $_GET['accountant_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

if (isset($_POST['deleteAccountantBtn'])) {
	$query = deleteAccountant($pdo, $_GET['accountant_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




?>