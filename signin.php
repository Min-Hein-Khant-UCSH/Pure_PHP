<?php
require 'dbconnect.php';
session_start();

$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT users.*,roles.name as rname FROM users INNER JOIN model_has_roles ON users.id=model_has_roles.user_id INNER JOIN roles ON model_has_roles.role_id=roles.id
 where email=? and password=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email, $password]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
//var_dump($row);

if ($stmt->rowCount() <= 0) {
	#invalid
	$loginCount = 1;
	if (!isset($_COOKIE['logincount'])) {
		$loginCount = 1;
	} else {
		$loginCount = $_COOKIE['logincount'];
		$loginCount++;
	}

	setcookie("logincount", $loginCount, time()+10);

	if ($loginCount >= 3) {
		# code...

		echo "<img src='frontend/image/008_final.gif' style='width:100%, height:100vh; object-fit:cover'>";

		setcookie('logincount', '', time()-10);

		echo "<script type=\"text/javascript\">
				(function(){
					setTimeout(function(){
						location.href='login.php';
					},10000);
				})();
				</script>";

	} else {
		$_SESSION['login_fail'] = 'Your current email and password is invalid';

		header('location:login.php');
	}

} else {
	#succsss
	//echo 'successfully';
	$_SESSION['login_user'] = $row;
	$role                   = $row['rname'];

	if ($role == "customer") {
		header('location:index.php');
	} else {
		header('location:item_list.php');
	}

}

?>