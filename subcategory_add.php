<?php
require 'dbconnect.php';

$name       = $_POST['name'];
$categoryid = $_POST['categoryid'];

$sql  = "insert into subcategories (name, category_id) values (?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $categoryid]);

header('location:subcategory_list.php?create=success');

?>