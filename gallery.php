<?php
$GLOBALS['title'] = "HGE - Gallery";
include 'components/header.php';
include 'db/connect.php';
$query = "SELECT * FROM `product`,`category` WHERE `product`.`categoryId` = `category`.`id` ORDER BY `category`.`categoryName`;";
$result = mysqli_query($connection, $query);
if ($result) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
$query = "SELECT * FROM `category`";
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
	<div class="app-content">
		<!--====== Section 1 ======-->
		<div class="u-s-p-y-60">

			<!--====== Section Content ======-->
			<div class="section__content">
				<div class="container">
					<div class="breadcrumb">
						<div class="breadcrumb__wrap">
							<ul class="breadcrumb__list">
								<li class="has-separator">

									<a href="index.php">Home</a></li>
								<li class="is-marked">

									<a href="gallery.php">Gallery</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--====== End - Section 1 ======-->

		<!--====== Section 2 ======-->
		<div class="u-s-p-y-90">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="shop-p">
							<div class="shop-p__toolbar u-s-m-b-30">
								<div class="shop-p__tool-style">
									<div class="tool-style__group u-s-m-b-8">

										<span class="js-shop-filter-target" data-side="#side-filter">Filters</span>

										<span class="js-shop-grid-target is-active">Grid</span>

										<span class="js-shop-list-target">List</span></div>
								</div>
							</div>
							<div class="shop-p__collection filter__grid-wrapper">
								<div class="row is-grid-active">
                                    <?php
                                    foreach ($products as $key => $product) {
                                        $image = explode(",", $product['productImage']);
                                        $imagePath = "/dw-assignment-HKZ/images/product/" . $image[0];
                                        ?>
										<div class="<?php echo "col-lg-3 col-md-4 col-sm-6 filter__item " . strtok($product['categoryName'], " "); ?>">
											<div class="product-m">
												<div class="product-m__thumb">

													<a class="aspect aspect--bg-grey aspect--square u-d-block"
													   href="product-detail.html">

														<img class="aspect__img" src="<?php echo $imagePath; ?>"
														     alt="<?php echo $product['productName']; ?>"></a>

												</div>
												<div class="product-m__content">
													<div class="product-m__category">

														<a href="shop-side-version-2.html"> <a
																	href="shop-side-version-2.html">
                                                                <?php
                                                                if (strpos($product['categoryName'], '-') > 0)
                                                                    echo explode('-', $product['categoryName'])[1];
                                                                else
                                                                    echo $product['categoryName']; ?>
															</a>
													</div>
													<div class="product-m__name">

														<a href="product-detail.html"><?php echo $product['productName']; ?></a>
													</div>
													<br/>
													<div class="product-m__price"><?php echo number_format($product['productPrice']) . " MMK"; ?></div>
													<div class="product-m__hover">
														<div class="product-m__preview-description">
															<span><?php echo substr_replace($product['productDescription'], "...", 200); ?></span>
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
				</div>
			</div>
		</div>
		<!--====== End - Section 2 ======-->

		<!--====== Side Filters ======-->
		<div class="shop-a" id="side-filter">
			<div class="shop-a__wrap">
				<div class="shop-a__inner gl-scroll">
					<div class="shop-w-master">
						<h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

							<span>FILTERS</span></h1>
						<div class="shop-w-master__sidebar">
							<div class="u-s-m-b-30">
								<div class="shop-w">
									<h1 class="shop-w__h">CATEGORY</h1>
									<div class="shop-w__wrap">
										<ul class="shop-w__category-list-1 gl-scroll filter__category-wrapper">
											<li>
												<button class="btn filter__btn filter__btn--style-1" type="button"
												        data-filter="*">ALL
												</button>
											</li>
                                            <?php
                                            foreach ($categoryList as $key => $category) {
                                                ?>
												<li>
													<button class="btn filter__btn filter__btn--style-1" type="button"
													        data-filter="<?php echo "." . strtok($category['categoryName'], " "); ?>">
                                                        <?php
                                                        if (strpos($category['categoryName'], '-') > 0)
                                                            echo explode('-', $category['categoryName'])[1];
                                                        else
                                                            echo $category['categoryName']; ?>
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
		<!--====== End - Side Filters ======-->

	</div>

	<!--====== Main Footer ======-->
    <?php include 'components/footer.php'; ?>
	<!--====== Modal Section ======-->
<?php include 'components/scripts.php'; ?>