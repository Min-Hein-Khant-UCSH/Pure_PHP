<?php
require 'dbconnect.php';

$id = $_POST['id'];
//print_r($id);

$sql  = "delete from subcategories where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header('Location:subcategory_list.php?delete=success');

?>