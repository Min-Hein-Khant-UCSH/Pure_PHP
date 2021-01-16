<?php

require 'dbconnect.php';
$id             = $_POST['id'];
$oldphoto       = $_POST['oldphoto'];
$newphoto       = $_FILES['newphoto'];
$name           = $_POST['name'];
$codeno         = $_POST['codeno'];
$uniqueprice    = $_POST['unitprice'];
$discount       = $_POST['discount'];
$description    = $_POST['description'];
$brand_id       = $_POST['brand_id'];
$subcategory_id = $_POST['subcategory_id'];
// var_dump($oldphoto);
// var_dump($newphoto);
// var_dump($name);
// var_dump($codeno);
// var_dump($uniqueprice);
// var_dump($discount);
// var_dump($description);
// var_dump($brand_id);
// var_dump($subcategory_id);

if ($newphoto['size'] > 0) {
	$source_dir     = "image/item/";
	$file_name      = mt_rand(100000, 999999);
	$file_exe_array = explode('.', $newphoto['name']);
	$file_exe       = $file_exe_array[1];
	$fullpath       = $source_dir.$file_name.'.'.$file_exe;

	move_uploaded_file($newphoto['tmp_name'], $fullpath);
} else {
	$fullpath = $oldphoto;
}

$sql  = "update items set codeno=?,name=?,photo=?,price=?,discount=?,description=?,brand_id=?,subcategory_id=? where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$codeno, $name, $fullpath, $uniqueprice, $discount, $description, $brand_id, $subcategory_id, $id]);

header('Location:item_list.php?update=success');

?>