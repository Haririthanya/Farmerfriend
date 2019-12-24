<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'farmerfriend';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['userid'], $_POST['password']) ) {
	die ('Please fill both the username and password field!');
}

if ($stmt = $con->prepare('SELECT customeruserid, customerpassword FROM customerdetails WHERE customeruserid = ?')) {
	$stmt->bind_param('s', $_POST['userid']);
	$stmt->execute();
	$stmt->store_result();
}
$stmt->store_result();
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	if ($_POST['password'] === $password) {		
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['userid'];
		$_SESSION['id'] = $id;
		header('Location: index.php');
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}
$stmt->close();

?>