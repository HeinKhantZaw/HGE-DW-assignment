<?php
$GLOBALS['title'] = "HGE - Featured";
include 'components/header.php';
include 'db/connect.php';
$query = "SELECT * FROM `product`,`category` WHERE `product`.`productStatus`='New' AND `product`.`categoryId` = `category`.`id` AND `category`.`categoryName` LIKE 'Wearable%' ORDER BY RAND()
LIMIT 4;";
$result = mysqli_query($connection, $query);
if ($result) {
    $wearableProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);

} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
$imagePath = [];
$categoryName = [];
foreach ($wearableProduct as $key => $product) {
    $image = explode(",", $product['productImage']);
    $imagePath[] = '/dw-assignment-HKZ/images/product/' . $image[0];
    $categoryName[] = explode('-', $product['categoryName'])[1];
}
$query = "SELECT * FROM `product`, `category` WHERE`product`.`categoryId` = `category`.`id` AND `category`.`categoryName` LIKE 'Wearable%' ORDER BY RAND();";
$result = mysqli_query($connection, $query);
if ($result) {
    $productList = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
$query = "SELECT * FROM `category` WHERE `categoryName` LIKE 'Wearable%'";
$result = mysqli_query($connection, $query);
if ($result) {
    $categoryList = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
?>
<div id="app">
	<!--====== Main Header ======-->
    <?php include 'components/navbar.php'; ?>
	<!--====== End - Main Header ======-->

	<!--====== Section 1 ======-->
	<div class="u-s-p-y-60">

		<!--====== Section Intro ======-->
		<div class="section__intro u-s-m-b-46">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__text-wrap">
							<h1 class="section__heading u-c-secondary u-s-m-b-12">MOST FEATURED WEARABLE
								TECHNOLOGY </h1>
							<span class="section__span u-c-silver">FOR FITNESS AND HEALTH </span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section Intro ======-->


		<!--====== Section Content ======-->
		<div class="section__content">
			<div class="container">
				<div class="row">
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[0]; ?></h1>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">
								<img class="aspect__img collection__img" src="<?php echo $imagePath[0]; ?>"
								     alt="<?php echo $wearableProduct[0]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[1]; ?></h1>
						</div>
					</div>
					<div class="col-lg-5 col-md-7 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">

								<img class="aspect__img collection__img" src="<?php echo $imagePath[1]; ?>"
								     alt="<?php echo $wearableProduct[1]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-5 col-md-7 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">

								<img class="aspect__img collection__img" src="<?php echo $imagePath[2]; ?>"
								     alt="<?php echo $wearableProduct[2]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[2]; ?></h1>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 u-s-m-b-30">

						<a class="collection" href="shop-side-version-2.html">
							<div class="aspect aspect--bg-grey aspect--square">

								<img class="aspect__img collection__img" src="<?php echo $imagePath[3]; ?>"
								     alt="<?php echo $wearableProduct[3]['productName']; ?>">
							</div>
						</a>
					</div>
					<div class="col-lg-1 col-md-7 u-s-m-b-30">
						<div class="vertical-center">
							<h1 class="content-span-2 u-c-black vertical-text"><?php echo $categoryName[3]; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--====== Section Content ======-->
	</div>
	<!--====== End - Section 1 ======-->
	<div class="u-s-p-y-90">
		<!--====== Section Intro ======-->
		<div class="section__intro u-s-m-b-16">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__text-wrap">
							<h1 class="section__heading u-c-secondary u-s-m-b-12">WEARABLE PRODUCTS</h1>
							<span class="section__span u-c-silver">Fitness wearables with latest technology</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section Intro ======-->
		<div class="section__content">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-12">
						<div class="shop-p">
							<div class="shop-p__collection filter__grid-wrapper">
								<div class="row is-grid-active">
                                    <?php
                                    foreach ($productList as $key => $product) {
                                        $image = explode(",", $product['productImage']);
                                        $imagePath = '/dw-assignment-HKZ/images/product/' . $image[0];
                                        ?>
										<div class="<?php echo "col-lg-4 col-md-6 col-sm-6 filter__item " . strtok($product['categoryName'], " "); ?>">
											<div class="product-m">
												<div class="product-m__thumb">

													<a class="aspect aspect--bg-grey aspect--square u-d-block"
													   href="product-detail.html">

														<img class="aspect__img" src="<?php echo $imagePath; ?>"
														     alt="<?php echo $product['productName']; ?>"></a>
												</div>
												<div class="product-m__content">
													<div class="product-m__category">

														<a href="shop-side-version-2.html"><?php echo explode('-', $product['categoryName'])[1]; ?></a>
													</div>
													<div class="product-m__name">

														<a href="product-detail.html"><?php echo $product['productName']; ?></a>
													</div>
													<div class="product-m__rating gl-rating-style"><?php
														$rating = rand(2, 5);
														for ($i = 0; $i < 5; $i++) {
															if($i < $rating) {
																echo '<i class="fas fa-star"></i>';
															} else {
																echo '<i class="far fa-star"></i>';
															}
														}
														?>
														<div class="product-m__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></div>
														<div class="product-m__hover">
															<div class="product-m__preview-description">

																<span><?php echo $product['productDescription']; ?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
                                    <?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<div class="shop-w-master">
							<h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

								<span>FILTERS</span></h1>
							<div class="shop-w-master__sidebar sidebar--bg-snow">
								<div class="u-s-m-b-30">
									<div class="shop-w">
										<div class="shop-w__intro-wrap">
											<h1 class="shop-w__h">CATEGORY</h1>

											<span class="fas fa-minus shop-w__toggle" data-target="#s-category"
											      data-toggle="collapse"></span>
										</div>
										<div class="shop-w__wrap collapse show" id="s-category">
											<ul class="shop-w__category-list gl-scroll filter__category-wrapper">
												<li>
													<button class="btn filter__btn filter__btn--style-2" type="button"
													        data-filter="*">ALL
													</button>
												</li>
                                                <?php
                                                foreach ($categoryList as $key => $category) {
                                                    ?>
													<li>
														<button class="btn filter__btn filter__btn--style-2"
														        type="button"
														        data-filter="<?php echo "." . strtok($category['categoryName'], " "); ?>"><?php echo explode('-', $category['categoryName'])[1]; ?>
														</button>
													</li>
                                                    <?php
                                                }
                                                ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
</div>

<?php include 'components/scripts.php'; ?>
