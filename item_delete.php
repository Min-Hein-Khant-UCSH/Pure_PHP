<?php

require 'dbconnect.php';

$id = $_POST['id'];
//var_dump($id);

$sql  = "delete from items where id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header('Location:item_list.php?delete=success');

?>