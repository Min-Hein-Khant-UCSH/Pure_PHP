<?php

require 'frontendheader.php';
?>
<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>

  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>


	<!-- Content -->
	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">


<?php

$sql  = "select * from categories order by rand() LIMIT 8";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $r) {
	?>



																																																						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
																																																										<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
																																																										  	<img src="<?=$r['logo']?>" class="img-fluid card-img-top" alt="...">
																																																										  	<div class="card-body">
																																																										    	<p class="card-text font-weight-bold text-truncate"> <?=$r['name']?></p>
																																																										  	</div>
																																																										</div>
																																																									</div>



	<?php

}

?>
</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

<?php

$sql  = "SELECT * FROM `items` WHERE discount !=''";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $r) {
	?>
																																									<div class="item">
																																											                    <div class="pad15">
																																											                    	<a href="item_detail.php?id=<?=$r['id']?>"><img src="<?=$r['photo']?>" class="img-fluid"></a>
																																											                        <p class="text-truncate"><?=$r['name']?></p>
																																											                        <p class="item-price">
																																											                        	<strike><?=$r['price']?>&nbsp;Kyats</strike>
																																											                        	<span class="d-block"><?=$r['discount']?>&nbsp;Kyats</span>
																																											                        </p>

																																											                        <div class="star-rating">
																																																		<ul class="list-inline">
																																																			<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																																			<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																																			<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																																			<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																																			<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
																																																		</ul>
																																																	</div>

																																																																																				<a href="javascript:void(0)" class="addtocartBtn text-decoration-none" data-id ="<?=$r['id']?>" data-name="<?=$r['name']?>"
																																																							data-codeno="<?=$r['codeno']?>"
																																																							data-photo="<?=$r['photo']?>"
																																																							data-price="<?=$r['price']?>"
																																																							data-discount="<?=$r['discount']?>">Add to Cart</a>

																																											                    </div>
																																											                </div>


	<?php

}

?>
</div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">



<?php

$sql  = "SELECT * FROM `items` ORDER by created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();

foreach ($row as $r) {
	?>
																								<div class="item">
																								<div class="pad15">
																										                    	<a href="item_detail.php?id=<?=$r['id']?>"><img src="<?=$r['photo']?>" class="img-fluid"></a>
																										                        <p class="text-truncate"><?=$r['name']?></p>
																										                        <p class="item-price">



	<?php if ($r['discount']) {?>

																																											                        	<strike><?=$r['price']?>&nbsp;Kyats</strike>
																																											                        	<span class="d-block"><?=$r['discount']?>&nbsp;Kyats</span>
		<?php } else {?>
																														<span class="d-block"><?=$r['price']?>&nbsp;Kyats</span>
		<?php }?>
								</p>

																										                        <div class="star-rating">
																																	<ul class="list-inline">
																																		<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																		<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																		<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																		<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																																		<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
																																	</ul>
																																</div>

																																<a href="javascript:void(0)" class="addtocartBtn text-decoration-none" data-id ="<?=$r['id']?>" data-name="<?=$r['name']?>"
																																																							data-codeno="<?=$r['codeno']?>"
																																																							data-photo="<?=$r['photo']?>"
																																																							data-price="<?=$r['price']?>"
																																																							data-discount="<?=$r['discount']?>">Add to Cart</a>

																										                    </div>
																										                </div>



	<?php

}

?>
</div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Fresh Picks </h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">


<?php

$sql  = "select * from items order by rand()";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();

foreach ($row as $r) {
	?>



																	<div class="item">
																			                    <div class="pad15">
																			                    	<a href="item_detail.php?id=<?=$r['id']?>"><img src="<?=$r['photo']?>" class="img-fluid"></a>
																			                        <p class="text-truncate"><?=$r['name']?></p>
																			                        <p class="item-price">
	<?php if ($r['discount']) {?>

																																											                        	<strike><?=$r['price']?>&nbsp;Kyats</strike>
																																											                        	<span class="d-block"><?=$r['discount']?>&nbsp;Kyats</span>
		<?php } else {?>
																																											                        	<span class="d-block"><?=$r['price']?>&nbsp;Kyats</span>
		<?php }?>
							</p>

																			                        <div class="star-rating">
																										<ul class="list-inline">
																											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
																											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
																										</ul>
																									</div>

																									<a href="javascript:void(0)" class="addtocartBtn text-decoration-none" data-id ="<?=$r['id']?>" data-name="<?=$r['name']?>"
																																																						data-codeno="<?=$r['codeno']?>"
																																																						data-photo="<?=$r['photo']?>"
																																																						data-price="<?=$r['price']?>"
																																																						data-discount="<?=$r['discount']?>">Add to Cart</a>

																			                    </div>
																			                </div>


	<?php

}

?>
</div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>


		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	    <section class="customer-logos slider mt-5">

<?php

$sql  = "select * from brands order by rand()";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
foreach ($row as $r) {
	?>


																	<div class="slide">
																		      		<a href="">
																			      		<img src="<?=$r['photo']?>">
																			      	</a>
																		  </div>


	<?php

}

?>
</section>

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>







<?php

require 'frontendfooter.php';

?>