<?php  

function insertAccountant($pdo, $username, $first_name, $last_name, 
	$date_of_birth, $field_specialty) {

	$sql = "INSERT INTO accountant (username, first_name, last_name, 
		date_of_birth, field_specialty) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name, 
		$date_of_birth, $field_specialty]);

	if ($executeQuery) {
		return true;
	}
}

function updateAccountant($pdo, $first_name, $last_name, 
	$date_of_birth, $field_specialty, $accountant_id) {

	$sql = "UPDATE accountant
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					field_specialty = ?
				WHERE accountant_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $field_specialty, $accountant_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteAccountant($pdo, $accountant_id) {
	$deleteAccountantProj = "DELETE FROM client WHERE accountant_id = ?";
	$deleteStmt = $pdo->prepare($deleteAccountantProj);
	$executeDeleteQuery = $deleteStmt->execute([$accountant_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM accountant WHERE accountant_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$accountant_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}


function getAllAccountant($pdo) {
	$sql = "SELECT * FROM accountant";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAccountantByID($pdo, $accountant_id) {
	$sql = "SELECT * FROM accountant WHERE accountant_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$accountant_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getClientByAccountant($pdo, $accountant_id) {
	
	$sql = "SELECT 
				client.project_id AS client_id,
				client.first_name AS first_name,
                client.last_name AS last_name,
				client.service_requested AS service_requested,
				client.date_added AS date_added,
				CONCAT(accountant.first_name,' ',accountant.last_name) AS client_owner
			FROM client
			JOIN accountant ON client.accountant_id = accountant.accountant_id
			WHERE client.accountant_id = ? 
			GROUP BY client.last_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$accountant_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertClient($pdo, $first_name, $last_name, $service_requested, $accountant_id) {
	$sql = "INSERT INTO client (first_name, last_name, service_requested, accountant_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $service_requested, $accountant_id]);
	if ($executeQuery) {
		return true;
	}

}


?>