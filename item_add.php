<?php 

	require 'dbconnect.php';

	$photo=$_FILES['photo'];
	$name=$_POST['name'];
	$codeno=$_POST['codeno'];
	$uniqueprice=$_POST['uniqueprice'];
	$discount=$_POST['discount'];
	$description=$_POST['description'];
	$brand_id=$_POST['brand_id'];
	$subcategory_id=$_POST['subcategory_id'];


	// var_dump($photo);
	// var_dump($name);
	// var_dump($codeno);
	// var_dump($uniqueprice);
	// var_dump($discount);
	// var_dump($description);
	// var_dump($brand_id);
	// var_dump($subcategory_id);

	$source_dir     = "image/item/";
	$file_name      = mt_rand(100000, 999999);
	$file_exe_array = explode('.', $photo['name']);
	$file_exe       = $file_exe_array[1];
	$fullpath       = $source_dir.$file_name.'.'.$file_exe;

	move_uploaded_file($photo['tmp_name'], $fullpath);

	$sql  = "INSERT into items (codeno,name,photo,price,discount,description,brand_id,subcategory_id) values (?,?,?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$codeno,$name,$fullpath,$uniqueprice,$discount,$description,$brand_id,$subcategory_id]);

	header('Location:item_list.php?create=success');




 ?>