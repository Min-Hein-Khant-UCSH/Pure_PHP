<?php
require ('backendheader.php');
require 'dbconnect.php';

$sql="SELECT items.*,brands.name cname,subcategories.name as sname FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id = subcategories.id
";
$stmt=$conn->prepare($sql);
$stmt->execute();
$row=$stmt->fetchAll();
//var_dump($row);



?>
<div class="app-title">
	    <div>
	        <h1> <i class="icofont-list"></i> Item </h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb side">
	        <a href="item_new.php" class="btn btn-outline-primary">
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

	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="table-responsive">
	                    <table class="table table-hover table-bordered" id="sampleTable">
	                        <thead>
	                            <tr>
									<th> No </th>
									<th> Name </th>
									<th> Brand </th>
									<th> Subcategory </th>
									<th> Price </th>
									<th> Action </th>
								</tr>
	                        </thead>
	                        <tbody>
	                        	<?php 
	                        	$i=1;

	                        	foreach ($row as $r) {
	                        		?>

	                        		<tr>
	                        			<td><?=$i++?></td>
	                        			<td><?=$r['name']?></td>
	                        			<td><?=$r['cname']?></td>
	                        			<td><?=$r['sname']?></td> 
						            	<td>
						            		 <?php if($r['discount'] > 0):?>
						            		 	<?= $r['discount'] ?> MMK
						                		<del class="d-block"> <?= $r['price'] ?> MMK </del>
						                	<?php else: ?>
						                    <?= $r['price'] ?> MMK

						            		 <?php endif ?>
						            		
						            		
						            	</td>
						            	<td>
                                    <a href="item_edit.php?cid=<?= $id ?>" class="btn btn-warning">
                                        <i class="icofont-ui-settings"></i>
                                    </a>

                                    <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" method="POST" action="item_delete.php">

                                    	<input type="hidden" name="id" value="<?= $id ?>">

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