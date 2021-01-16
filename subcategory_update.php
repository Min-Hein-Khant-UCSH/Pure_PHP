<?php 

require 'dbconnect.php';


	$id=$_POST['id'];
	$name=$_POST['name'];
	$category_id=$_POST['categoryid'];

	//var_dump($name);
	//var_dump($category_id);

$sql  = "update subcategories set name=?,category_id=? where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $category_id, $id]);

header('Location:subcategory_list.php?update=success');



 ?>