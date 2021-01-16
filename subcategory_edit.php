<?php
require ('backendheader.php');
require 'dbconnect.php';

$id = $_GET['id'];

$sql  = "select * from subcategories where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($row);
?>
<div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i>Edit Subategory Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategory_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <form action="subcategory_update.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?=$rows['id']?>">

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name" required="" value="<?=$rows['name']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Choose Category </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="categoryid">
<?php

$sql  = "select * from categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $r) {
	?>

										<option value="<?=$r['id']?>" <?php if ($r['id'] == $rows['category_id']) {echo "selected";}?>>
	<?=$r['name'];?></option>


	<?php

}

?>
</select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
require ('backendfooter.php');
?>