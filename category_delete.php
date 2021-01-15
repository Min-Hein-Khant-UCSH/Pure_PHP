<?php
require 'dbconnect.php';

$id = $_POST['id'];

// var_dump($id);

$sql  = "delete from categories where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header('Location:category_list.php?delete=success');

?>