<?php
require 'dbconnect.php';

$id       = $_POST['id'];
$name     = $_POST['name'];
$oldphoto = $_POST['oldphoto'];
$newphoto = $_FILES['newphoto'];

if ($newphoto['size'] > 0) {
	$source_dir     = "image/category/";
	$file_name      = mt_rand(100000, 999999);
	$file_exe_array = explode('.', $newphoto['name']);
	$file_exe       = $file_exe_array[1];
	$fullpath       = $source_dir.$file_name.'.'.$file_exe;

	move_uploaded_file($newphoto['tmp_name'], $fullpath);
} else {
	$fullpath = $oldphoto;
}

$sql  = "update categories set name=?,logo=? where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $fullpath, $id]);

header('Location:category_list.php?update=success');

?>