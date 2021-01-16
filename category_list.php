<?php
require 'backendheader.php';
require 'dbconnect.php';

?>
<div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Category </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="category_new.php" class="btn btn-outline-primary">
                        <i class="icofont-plus"></i>
                    </a>
                </ul>
            </div>
<?php

if (isset($_GET['create'])) {

	?>
	<div class="alert alert-success alert-dismissible fade show text-center">
																					                                                <strong>Successfully Created</strong>
																					                                                    <button class="close" data-dismiss="alert">&times;</button>
																					                                                </div>


	<?php

}

?>
<?php

if (isset($_GET['update'])) {

	?>
	<div class="alert alert-warning alert-dismissible fade show text-center">
																		                                                            <strong>Successfully Updated</strong>
																		                                                                <button class="close" data-dismiss="alert">&times;</button>
																		                                                            </div>


	<?php

}

?>
<?php

if (isset($_GET['delete'])) {

	?>
	<div class="alert alert-danger alert-dismissible fade show text-center">
										                                                                                            <strong>Successfully Deleted</strong>
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
                                          <th>Photo</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php

$sql  = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
//var_dump($row);
$i = 1;
foreach ($row as $r) {
	?>


																										<tr>
																										                                            <td> <?php echo $i++;?></td>
																										                                            <td> <?=$r['name']?></td>
																						                                                            <td><img src="<?=$r['logo']?>" alt="" width="100px"></td>
																										                                            <td>
																										                                                <a href="category_edit.php?id=<?=$r['id']?>" class="btn btn-warning">
																										                                                    <i class="icofont-ui-settings"></i>
																										                                                </a>

																										                                                <form action="category_delete.php" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete (<?=$r['name']?>) ?')">

											                                                                                                                <input type="hidden" value="<?=$r['id']?>" name="id">
																	                                                                                          <button class="btn btn-outline-danger"><i class="icofont-close"></i></button>


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

require 'backendfooter.php';
?>