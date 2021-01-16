<?php
require ('backendheader.php');
require 'dbconnect.php';

// $sql  = "select * from subcategories";
$sql  = "SELECT subcategories.*,categories.name as cname,categories.id as cid FROM subcategories INNER JOIN categories ON subcategories.category_id=categories.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();

?>
<div class="app-title">
	    <div>
	        <h1> <i class="icofont-list"></i> Subcategory </h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb side">
	        <a href="subcategory_new.php" class="btn btn-outline-primary">
	            <i class="icofont-plus"></i>
	        </a>
	    </ul>
	</div>

<?php

if (isset($_GET['create'])) {

	?>
	<div class="alert alert-success alert-dismissible fade show text-center">
																														                                                <strong>Successful Created</strong>
																														                                                    <button class="close" data-dismiss="alert">&times;</button>
																														                                                </div>


	<?php

}

?>
<?php

if (isset($_GET['update'])) {

	?>
	<div class="alert alert-warning alert-dismissible fade show text-center">
																														                                                <strong>Successful Created</strong>
																														                                                    <button class="close" data-dismiss="alert">&times;</button>
																														                                                </div>


	<?php

}

?>
<?php

if (isset($_GET['delete'])) {

	?>
	<div class="alert alert-danger alert-dismissible fade show text-center">
																														                                                <strong>Successful Deleted</strong>
																														                                                    <button class="close" data-dismiss="alert">&times;</button>
																														                                                </div>


	<?php

}

?>
<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="table-responsive">
	                    <table class="table table-hover table-bordered text-center" id="sampleTable">
	                        <thead>
	                            <tr>
	                              <th>No</th>
	                              <th>Name</th>
	                              <th>Category</th>
	                              <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>

<?php
$i = 1;
foreach ($row as $r) {

	?>

																	                        		<tr>
																		                                <td><?=$i++?></td>
																		                                <td><?=$r['name']?></td>
																		                                <td><?=$r['cname']?></td>
																		                                <td>
																		                                    <a href="subcategory_edit.php?id=<?=$r['id']?>" class="btn btn-warning">
																		                                        <i class="icofont-ui-settings"></i>
																		                                    </a>

																		                                    <form class="d-inline-block" " method="POST" action="subcategory_delete.php" onsubmit="return confirm('Are you sure you want to delete (<?=$r['name']?>) ?')">
																		                                    	<input type="hidden" name="id" value="<?=$r['id']?>">
																		                                    	<button class="btn btn-outline-danger">
																		                                    		<i class="icofont-close"></i>
																		                                    	</button>

																		                                    </form>
																		                                </td>

																		                        	</tr>




	<?php

}

?>
</tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

<?php
require ('backendfooter.php');
?>
