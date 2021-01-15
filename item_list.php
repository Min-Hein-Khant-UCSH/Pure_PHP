<?php
require ('backendheader.php');
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