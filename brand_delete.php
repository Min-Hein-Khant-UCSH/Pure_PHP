<?php

require 'dbconnect.php';

$id = $_POST['id'];

//print_r($id);

$sql  = "delete from brands where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header('Location:brand_list.php?delete=success');

?>