<?php

require('backendheader.php');
require 'dbconnect.php';

$sql="select * from brands order by name ASC";
$stmt=$conn->prepare($sql);
$stmt->execute();
$row=$stmt->fetchAll();



$sql="select * from subcategories order by name ASC";
$stmt=$conn->prepare($sql);
$stmt->execute();
$rows=$stmt->fetchAll();
// print_r($rows);


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
                    <form action="item_add.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="profile" class="col-sm-2 col-form-label"> Profile </label>
                            <div class="col-sm-10">
                              <input type="file" id="profile" name="photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codeno" class="col-sm-2 col-form-label"> Code No. </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="codeno" name="codeno">
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-2">
                            <label for="uniqueprice" class="col-form-label"> Price </label>
                        </div>
                        <div class="col-md-10">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="uniqueprice-tab" data-toggle="tab" href="#uniqueprice" role="tab" aria-controls="uniqueprice"> Unique Price </a>
                                </li>
      
                                <li class="nav-item">
                                    <a class="nav-link" id="discount-tab" data-toggle="tab" href="#discount" role="tab"> Discount </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="uniqueprice" role="tabpanel" aria-labelledby="uniqueprice-tab">
                                    <input type="text" class="form-control my-3" name="uniqueprice">
                                </div>
                            
                                <div class="tab-pane fade" id="discount" role="tabpanel">
                                    <input type="text"  id="discount" name="discount" class="form-control my-4">
                                </div>
                            </div>  
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"> Description </label>
                        <div class="col-sm-10">
                          <!-- <input type="text" class="form-control" id="description" name="description"> -->
                          <textarea rows="4" class="form-control" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="brand" class="col-sm-2 col-form-label"> Brand </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="brand" name="brand_id">

                              <option>Choose Brand</option>
                              <?php 

                              foreach ($row as $r) {
                              	?>

                              	<option value="<?=$r['id']?>"><?=$r['name']?></option>

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

                              foreach ($rows as $r) {
                              	?>

                              	<option value="<?=$r['id']?>"><?=$r['name']?></option>


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

require('backendfooter.php');

?>