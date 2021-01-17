<?php
require 'dbconnect.php';

$name     = $_POST['name'];
$phone    = $_POST['phone'];
$email    = $_POST['email'];
$password = $_POST['password'];
$address  = $_POST['address'];

$profile = 'image/user.png';
$status  = 0;

$rowid = 2;

if ($name && $phone && $email && $password && $address) {
	$sql  = "insert into users (name,profile,email,password,phone,address,status) values (?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$name, $profile, $email, $password, $phone, $address, $status]);
} else {
	header('location:register.php');
}

//userid
$last_id = $conn->lastInsertId();

if ($name && $phone && $email && $password && $address) {
	$sql  = "insert into model_has_roles (user_id,role_id) values(?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$last_id, $rowid]);
	session_start();
	$_SESSION['reg_success'] = 'Yes, it is not easy, but you did it! Please Sigin Again.';

	header('location:login.php');

} else {
	header('location:register.php');
}

?>