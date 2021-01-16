<?php
require 'dbconnect.php';
$name  = $_POST['name'];
$photo = $_FILES['photo'];

// print_r($name);
// print_r($photo);
$source_dir     = "image/brand/";
$file_name      = mt_rand(100000, 999999);
$file_exe_array = explode('.', $photo['name']);
$file_exe       = $file_exe_array[1];
$fullpath       = $source_dir.$file_name.'.'.$file_exe;

move_uploaded_file($photo['tmp_name'], $fullpath);

$sql  = "INSERT into brands (name,photo) values (?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $fullpath]);

header('Location:brand_list.php?create=success');

?>