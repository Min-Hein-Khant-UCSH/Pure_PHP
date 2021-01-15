<?php
require ('backendheader.php');
?>
<div class="app-title">
	    <div>
	        <h1> <i class="icofont-list"></i> Brand </h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb side">
	        <a href="brand_new.php" class="btn btn-outline-primary">
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
	                              <th>#</th>
	                              <th>Name</th>
	                              <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>

	                            <tr>
	                                <td></td>
	                                <td>  </td>
	                                <td>
	                                    <a href="" class="btn btn-warning">
	                                        <i class="icofont-ui-settings"></i>
	                                    </a>

	                                    <form class="d-inline-block" method="POST" action="brand_delete.php">


	                                    	<button class="btn btn-outline-danger">
	                                    		<i class="icofont-close"></i>
	                                    	</button>

	                                    </form>

	                                </td>

	                            </tr>


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