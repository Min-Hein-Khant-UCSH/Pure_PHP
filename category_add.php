<?php
require 'dbconnect.php';

$name  = $_POST['name'];
$photo = $_FILES['photo'];

$source_dir     = "image/category/";
$file_name      = mt_rand(100000, 999999);
$file_exe_array = explode('.', $photo['name']);
$file_exe       = $file_exe_array[1];
$fullpath       = $source_dir.$file_name.'.'.$file_exe;

move_uploaded_file($photo['tmp_name'], $fullpath);

// var_dump($name);
//var_dump($file_exe_array);

$sql  = "INSERT into categories (name,logo) values (?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $fullpath]);

header('Location:category_list.php?create=success');

?>