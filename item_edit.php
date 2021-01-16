<?php

require ('backendheader.php');
require 'dbconnect.php';

$id = $_GET['id'];

$sql  = "select * from items where id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$row = $stmt->fetch();

// var_dump($row['brand_id']);
$brand_id       = $row['brand_id'];
$subcategory_id = $row['subcategory_id'];

?>
<div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Item Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="item_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="item_update.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?=$row['id']?>">
                      <input type="hidden" name="oldphoto" value="<?=$row['photo']?>">







                        <div class="form-group row">
                            <label for="profile" class="col-sm-2 col-form-label"> Profile </label>
                            <div class="col-sm-10">
                              <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                    <a class="nav-link" id="newPhotoTab-tab" data-toggle="tab" href="#newPhotoTab" role="tab" aria-controls="newPhotoTab" aria-selected="false">New Photo </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <img src="<?=$row['photo']?>" class="img-fluid" width="150px">
                                </div>
                                <div class="tab-pane fade" id="newPhotoTab" role="tabpanel" aria-labelledby="newPhotoTab-tab">

                                    <input type="file" id="photo_id" name="newphoto">

                                </div>
                            </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codeno" class="col-sm-2 col-form-label"> Code No. </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="codeno" name="codeno" value="<?=$row['codeno']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-2">
                            <label for="uniqueprice" class="col-form-label"> Price </label>
                        </div>
                        <div class="col-md-10">

                            <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-price-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-price" aria-selected="true"> Unit Price </a>

                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Discount </a>
                              </div>
                          </nav>

                          <div class="tab-content mt-3" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab">
                                <input type="number" class="form-control" id="categoryName" placeholder="Enter Unit Price" name="unitprice" value="<?=$row['price']?>">
                              </div>

                              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <input type="text" class="form-control" id="categoryName" placeholder="Enter Discount Price" name="discount" value="<?=$row['discount']?>">
                              </div>
                          </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"> Description </label>
                        <div class="col-sm-10">
                          <!-- <input type="text" class="form-control" id="description" name="description"> -->
                          <textarea rows="4" class="form-control" id="description" name="description"><?=$row['description']?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="brand" class="col-sm-2 col-form-label"> Brand </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="brand" name="brand_id">
                            <option value="">Choose Brand</option>

<?php

$sql  = "select * from brands";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $r) {
	?>

																					                    <option value="<?=$r['id']?>" <?php if ($r['id'] == $brand_id) {echo "selected";}?>>
	<?=$r['name'];?></option>


	<?php

}

?>
</select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subcategory" class="col-sm-2 col-form-label"> Subcategory </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="subcategory" name="subcategory_id">
                              <option>Choose Subcategory</option>


<?php

$sql  = "select * from subcategories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $r) {
	?>

								                                              <option value="<?=$r['id']?>" <?php if ($r['id'] == $subcategory_id) {echo "selected";}?>>
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